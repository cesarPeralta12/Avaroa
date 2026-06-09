<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConversationSession;
use App\Models\Message;
use App\Models\User;
use App\Services\MetaWhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class WhatsAppBotController extends Controller
{
    protected MetaWhatsAppService $metaWhatsApp;

    public function __construct(MetaWhatsAppService $metaWhatsApp)
    {
        $this->metaWhatsApp = $metaWhatsApp;
    }

    /** Verifica que el panel esté habilitado */
    private function checkPanelEnabled(): bool
    {
        return config('services.whatsapp_panel.enabled', true);
    }

    /**
     * Lista de conversaciones
     */
    public function index(Request $request)
    {
        if (!$this->checkPanelEnabled()) abort(404);
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }
        $user_session = User::findOrFail(Session::get('LoggedIn'));

        // ── Stats ────────────────────────────────────────────────────────
        $stats = [
            'total'     => ConversationSession::count(),
            'active'    => ConversationSession::whereNotIn('state', ['COMPLETED', 'CANCELLED'])->count(),
            'today'     => ConversationSession::whereDate('created_at', today())->count(),
            'escalated' => ConversationSession::where('escalated_to_human', true)->count(),
        ];

        // ── Query con filtros ─────────────────────────────────────────────
        $query = ConversationSession::with(['customer', 'trip'])
            ->orderByDesc('last_message_at')
            ->orderByDesc('created_at');

        if ($request->filled('state')) {
            $query->where('state', $request->state);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('customer', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('whatsapp_number', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $conversations = $query->paginate(30)->withQueryString();

        return view('admin.whatsapp.index', compact('conversations', 'stats', 'user_session'));
    }

    /**
     * Detalle de una conversación (vista de chat)
     */
    public function show(int $id)
    {
        if (!$this->checkPanelEnabled()) abort(404);
        if (!Session::has('LoggedIn')) {
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }
        $user_session = User::findOrFail(Session::get('LoggedIn'));

        $conversation = ConversationSession::with([
            'customer',
            'trip',
            'messages' => fn($q) => $q->orderBy('created_at', 'asc'),
        ])->findOrFail($id);

        return view('admin.whatsapp.show', compact('conversation', 'user_session'));
    }

    /**
     * Enviar mensaje manual desde el admin al cliente
     */
    public function sendMessage(Request $request, int $id)
    {
        if (!$this->checkPanelEnabled()) abort(404);
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false, 'message' => 'No autorizado'], 401);
        }

        $request->validate(['message' => 'required|string|max:2000']);

        $conversation = ConversationSession::with('customer')->findOrFail($id);

        if (!$conversation->customer?->whatsapp_number) {
            return back()->with('error', 'El cliente no tiene número de WhatsApp registrado.');
        }

        $sent = $this->metaWhatsApp->sendMessage(
            $conversation->customer->whatsapp_number,
            $request->message
        );

        if ($sent) {
            Message::create([
                'conversation_id' => $conversation->id,
                'trip_id'         => $conversation->trip_id,
                'sender_type'     => 'admin',
                'sender_id'       => Session::get('LoggedIn'),
                'content'         => $request->message,
                'type'            => 'text',
                'status'          => 'sent',
            ]);

            return back()->with('success', '✅ Mensaje enviado por WhatsApp.');
        }

        return back()->with('error', '❌ No se pudo enviar el mensaje. Verifica la configuración de la API.');
    }

    /**
     * Marcar/desmarcar conversación como escalada a humano
     */
    public function toggleEscalate(int $id)
    {
        if (!$this->checkPanelEnabled()) abort(404);
        if (!Session::has('LoggedIn')) {
            return response()->json(['success' => false], 401);
        }

        $conversation = ConversationSession::findOrFail($id);
        $conversation->update([
            'escalated_to_human' => !$conversation->escalated_to_human,
        ]);

        return response()->json([
            'success'   => true,
            'escalated' => $conversation->escalated_to_human,
        ]);
    }

    /**
     * Eliminar conversación
     */
    public function destroy(Request $request, int $id)
    {
        if (!$this->checkPanelEnabled()) abort(404);
        if (!Session::has('LoggedIn')) {
            if ($request->expectsJson()) {
                return response()->json(['success' => false], 401);
            }
            return redirect('Userlogin')->with('fail', 'Please login first.');
        }

        $conversation = ConversationSession::findOrFail($id);
        $conversation->messages()->delete();
        $conversation->delete();

        if ($request->expectsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('whatsapp.index')->with('success', 'Conversación eliminada correctamente.');
    }
}

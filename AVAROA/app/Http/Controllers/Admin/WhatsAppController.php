<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WhatsAppController extends Controller
{
    protected $whatsappService;

    public function __construct(WhatsAppService $whatsappService)
    {
        $this->whatsappService = $whatsappService;
    }

    /**
     * Handle the WhatsApp Webhook (Verification & Incoming Messages)
     */
    public function webhook(Request $request)
    {
        // 1. Meta / WhatChimp Verification (GET Request)
        if ($request->isMethod('get')) {
            $verifyToken = config('whatsapp.verify_token');
            if ($request->hub_verify_token === $verifyToken) {
                return response($request->hub_challenge, 200);
            }
            return response()->json(['error' => 'Invalid verify token'], 403);
        }

        // 2. Handle Incoming Messages (Match the ACTUAL WhatChimp flat structure)
        $payload = $request->all();
        Log::channel('whatsapp')->info('Incoming Webhook Payload:', $payload);

        // This flat payload is what your WhatsAppService->handleWebhook expects
        $this->whatsappService->handleWebhook($payload);

        return response()->json(['status' => 'ok'], 200);
    }

    /**
     * Handle delivery/read status updates from WhatChimp
     */
    public function webhookStatus(Request $request)
    {
        Log::channel('whatsapp')->info('Status update received', $request->all());
        return response()->json(['status' => 'ok']);
    }

    /**
     * Manually test the outbound API connection
     */
    public function testWebhook(Request $request)
    {
        // Using session check as per your existing logic
        if (!session()->has('LoggedIn')) {
            return redirect('login')->with('fail', 'Please login first.');
        }

        $phone = $request->phone ?? '918817016704'; // Your testing number

        $sent = $this->whatsappService->sendMessage(
            $phone,
            "🧪 *Outbound Test*\n\nCargoFlow System is connected to WhatChimp API successfully!"
        );

        return back()->with('success', $sent ? 'Test message sent to ' . $phone : 'Failed to send message.');
    }

    /**
     * Simulate an incoming WhatsApp message (Fixing the structure for Service compatibility)
     */
    public function simulateIncoming(Request $request)
    {
        $phone = trim($request->phone);
        $message = trim($request->message);

        // CREATE FLAT PAYLOAD to match WhatChimp logs
        $payload = [
            'chat_id'      => '91' . preg_replace('/[^0-9]/', '', $phone),
            'user_message' => $message,
            'wa_message_id' => 'sim_' . time()
        ];

        try {
            $this->whatsappService->handleWebhook($payload);
            return back()->with('success', 'Simulation Successful');
        } catch (\Exception $e) {
            return back()->with('error', 'Simulation failed: ' . $e->getMessage());
        }
    }
}

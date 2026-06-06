<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\MetaWhatsAppService;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WhatsAppWebhookController extends Controller
{
    protected MetaWhatsAppService $metaService;
    protected WhatsAppService $whatsappService;

    public function __construct(
        MetaWhatsAppService $metaService,
        WhatsAppService $whatsappService
    ) {
        $this->metaService = $metaService;
        $this->whatsappService = $whatsappService;
    }

    /**
     * Webhook verification for Meta
     * GET /api/whatsapp/webhook
     */
    public function verify(Request $request)
    {
        $mode = $request->get('hub_mode');
        $token = $request->get('hub_verify_token');
        $challenge = $request->get('hub_challenge');

        Log::info('Webhook verification attempt', [
            'mode' => $mode,
            'token' => $token,
            'challenge' => $challenge,
            'ip' => $request->ip()
        ]);

        if (!$mode && !$token) {
            return response('OK', 200);
        }

        $result = $this->metaService->verifyWebhook(
            $mode ?? '',
            $token ?? '',
            $challenge ?? ''
        );

        if ($result !== null) {
            return response($result, 200)
                ->header('Content-Type', 'text/plain');
        }

        Log::error('Webhook verification failed');
        return response('Verification failed', 403);
    }

    /**
     * Receive messages from Meta
     * POST /api/whatsapp/webhook
     */
    public function receive(Request $request)
    {
        $payload = $request->all();

        Log::info('Webhook received', [
            'payload_size' => strlen(json_encode($payload)),
            'keys' => array_keys($payload)
        ]);

        // Process webhook (Meta service)
        $messageData = $this->metaService->processWebhook($payload);

        if (!$messageData) {
            Log::info('No processable message in payload');
            return response()->json(['status' => 'ignored']);
        }

        /**
         * ✅ FIX: Handle STATUS updates (sent, delivered, read)
         * DO NOT send to business logic
         */
        if (($messageData['type'] ?? null) === 'status') {

            Log::info('Status event received', $messageData);

            // OPTIONAL: Save status in DB (recommended)
            /*
            Message::where('wamid', $messageData['message_id'])
                ->update(['status' => $messageData['status']]);
            */

            return response()->json([
                'status' => 'status_received',
                'event' => $messageData['status'] ?? null
            ]);
        }

        /**
         * ✅ NORMAL USER MESSAGE FLOW (UNCHANGED)
         */
        try {
            $result = $this->whatsappService->processMessage($messageData);

            return response()->json($result);
        } catch (\Throwable $e) {
            Log::error('Error processing message', [
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'status' => 'error'
            ], 500);
        }
    }

    /**
     * Test send message
     */
    public function testSend(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'message' => 'required|string'
        ]);

        $phone = $request->get('phone');
        $message = $request->get('message');

        $result = $this->metaService->sendMessage($phone, $message);

        return response()->json([
            'success' => $result,
            'phone' => $phone,
            'message' => $message,
            'timestamp' => now()->toIso8601String()
        ]);
    }

    /**
     * Get templates
     */
    public function getTemplates()
    {
        $templates = $this->metaService->getTemplates();

        return response()->json([
            'templates' => $templates,
            'count' => count($templates)
        ]);
    }

    /**
     * Check configuration status
     */
    public function status()
    {
        $phoneStatus = $this->metaService->getPhoneNumberStatus();

        return response()->json([
            'configured' => $this->metaService->isConfigured(),
            'phone_number' => $phoneStatus['display_phone_number'] ?? null,
            'quality_rating' => $phoneStatus['quality_rating'] ?? null,
            'verified_name' => $phoneStatus['verified_name'] ?? null,
        ]);
    }
}

<?php

namespace App\Jobs;

use App\Models\Driver;
use App\Models\Trip;
use App\Services\MetaWhatsAppService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendTripStatusNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 2;
    public int $timeout = 30;

    public function __construct(
        public readonly int    $tripId,
        public readonly int    $driverId,
        public readonly string $status,
    ) {}

    public function handle(MetaWhatsAppService $whatsApp): void
    {
        $trip   = Trip::with('customer')->find($this->tripId);
        $driver = Driver::with('user')->find($this->driverId);

        if (!$trip || !$driver) {
            Log::warning('SendTripStatusNotification: trip or driver not found', [
                'trip_id'   => $this->tripId,
                'driver_id' => $this->driverId,
            ]);
            return;
        }

        $phone = $trip->customer?->whatsapp_number ?? null;
        if (!$phone) return;

        $voc         = $trip->messageVocabulary();
        $driverName  = $driver->user->name ?? $voc['role_cap'];
        $orderId     = $trip->id;
        $isPassenger = $trip->isPassengerService();
        $emoji       = $voc['emoji'];
        $roleCap     = $voc['role_cap'];
        $role        = $voc['role'];
        $subjectCap  = $voc['subject_cap'];

        $message = match ($this->status) {
            'driver_arrived' =>
                "📍 *Actualización de {$voc['subject']}*\n\n" .
                "Pedido: #{$orderId}\n\n" .
                "✅ El {$role} ha llegado al punto de recogida.\n" .
                ($isPassenger ? 'Puedes subir 🚕' : 'Tu paquete está por ser retirado 📦') . "\n\n" .
                "👤 *{$roleCap}:* {$driverName}",

            'picked_up' =>
                ($isPassenger ? '🚕' : '📦') . " *Actualización de {$voc['subject']}*\n\n" .
                "Pedido: #{$orderId}\n\n" .
                ($isPassenger
                    ? "✅ El conductor te recogió.\nVamos en camino a tu destino."
                    : "✅ El mensajero confirmó el recojo de tu paquete.\nAhora se dirige al punto de entrega.") . "\n\n" .
                "👤 *{$roleCap}:* {$driverName}",

            'in_progress' =>
                "{$emoji} *{$subjectCap} en progreso*\n\n" .
                "Pedido: #{$orderId}\n\n" .
                ($isPassenger
                    ? "✅ Vamos en camino a tu destino."
                    : "✅ Tu paquete está en camino al destino.") . "\n\n" .
                "👤 *{$roleCap}:* {$driverName}",

            'cancelled' =>
                "❌ *{$subjectCap} cancelado*\n\n" .
                "Pedido: #{$orderId}\n\n" .
                "Lo sentimos, el {$role} canceló.\n" .
                "Estamos buscando otro {$role} para ti.\n\n" .
                "Motivo: " . ($trip->cancellation_reason ?? 'No especificado'),

            default => null,
        };

        if (!$message) return;

        try {
            $whatsApp->sendMessage($phone, $message);
            Log::info('Trip status WhatsApp sent', ['trip_id' => $trip->id, 'status' => $this->status]);
        } catch (\Exception $e) {
            Log::error('Trip status WhatsApp failed', [
                'trip_id' => $trip->id,
                'status'  => $this->status,
                'error'   => $e->getMessage(),
            ]);
            throw $e;
        }
    }
}

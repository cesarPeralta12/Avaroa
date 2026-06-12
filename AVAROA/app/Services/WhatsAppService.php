<?php

namespace App\Services;

use App\Models\User;
use App\Models\Trip;
use App\Models\Driver;
use App\Models\ConversationSession;
use App\Models\Message;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    protected TripFlowService $tripFlow;
    protected DriverAssignmentService $driverService;
    protected MetaWhatsAppService $metaWhatsApp;
    protected OpenAIService $openAI;

    protected array $resetCommands = [
        'reiniciar', 'reset', 'empezar', 'inicio', 'iniciar', 'nuevo', 'nueva',
        'cancelar', 'cancel', 'terminar', 'menu', 'hola', 'holaa', 'holaaa',
        'buenas', 'buenos', 'que tal', 'qué tal', 'como estas', 'cómo estás',
        'saludos', 'hey', 'hi', 'hello'
    ];

    /**
     * CRITICAL FIX: 4 base vehicle categories matching driver registration exactly.
     * All legacy subtypes (moto_veloz, movil_vagoneta, etc.) are handled
     * in DriverAssignmentService via baseVehicleTypeMap.
     */
    protected array $vehicleOptions = [
        'moto' => [
            'label' => '🛵 Moto',
            'description' => 'Rápida y económica',
            'backend_type' => 'moto',
            'keywords' => ['1', '1️⃣', 'moto', 'motorcycle', 'motocicleta', 'moto taxi', 'moto veloz', 'moto restaurant', 'moto socorro']
        ],
        'automovil' => [
            'label' => '🚗 Auto',
            'description' => 'Paquetes medianos',
            'backend_type' => 'automovil',
            'keywords' => ['2', '2️⃣', 'auto', 'automovil', 'automóvil', 'carro', 'movil', 'móvil', 'sedan', 'sedán']
        ],
        'minivan' => [
            'label' => '🚐 Minivan',
            'description' => 'Varios paquetes',
            'backend_type' => 'minivan',
            'keywords' => ['3', '3️⃣', 'minivan', 'van', 'vagoneta', 'furgon', 'furgón', 'camioneta', 'suv']
        ],
        'camioneta' => [
            'label' => '🚛 Camión',
            'description' => 'Mudanzas o cargas grandes',
            'backend_type' => 'camioneta',
            'keywords' => ['4', '4️⃣', 'camion', 'camión', 'camioneta', 'truck', 'pickup', 'pick up', 'parrilla', 'carga', 'mudanza', 'flete']
        ]
    ];

    protected array $lastErrors = [];

    public function __construct(
        TripFlowService $tripFlow,
        DriverAssignmentService $driverService,
        MetaWhatsAppService $metaWhatsApp,
        OpenAIService $openAI
    ) {
        $this->tripFlow = $tripFlow;
        $this->driverService = $driverService;
        $this->metaWhatsApp = $metaWhatsApp;
        $this->openAI = $openAI;
    }

    public function processMessage(array $payload): string
    {
        $chatId = $payload['chat_id'] ?? null;
        $firstName = $payload['first_name'] ?? 'Invitado';
        $incomingText = $payload['user_message'] ?? '';

        if (!$chatId) {
            throw new \InvalidArgumentException('Missing chat_id');
        }

        Log::info('Processing message', [
            'phone' => $chatId,
            'message' => $incomingText,
            'has_latitude' => !empty($payload['latitude']),
            'has_longitude' => !empty($payload['longitude']),
            'latitude' => $payload['latitude'] ?? null,
            'longitude' => $payload['longitude'] ?? null
        ]);

        $driver = $this->getDriverByPhone($chatId);
        if ($driver) {
            return $this->handleDriverMessage($driver, $payload);
        }

        $user = $this->getOrCreateUser($chatId, $firstName);
        $session = $this->getActiveSession($user->id);

        $language = 'es';
        if (empty($session->language)) {
            $session->update(['language' => 'es']);
        }

        $lowerText = strtolower(trim($incomingText));

        if ($this->isResetCommand($lowerText)) {
            if (in_array($lowerText, ['cancelar', 'cancel']) && $session->trip_id) {
                $trip = Trip::find($session->trip_id);
                if ($trip && !in_array($trip->status, ['completed', 'cancelled', 'no_drivers'])) {
                    $this->handleCancel($session, $user, $language);
                    return json_encode(['status' => 'cancelled']);
                }
            }
            $this->handleReset($session, $user, $language);
            return json_encode(['status' => 'reset']);
        }

        $this->logMessage($session->id, $session->trip_id, 'customer', $user->id, $incomingText);

        $locationData = null;
        $isNativeLocation = $this->isNativeLocationPayload($payload);

        if ($isNativeLocation) {
            $locationData = $this->parseLocationFromPayload($payload);
        }

        $this->handleStateMachine($session, $user, [
            'text' => $incomingText,
            'location' => $locationData,
            'is_native_location' => $isNativeLocation,
            'has_valid_coords' => $locationData !== null &&
                                  !empty($locationData['latitude']) &&
                                  !empty($locationData['longitude'])
        ], $language);

        return json_encode(['status' => 'processed']);
    }

    protected function isResetCommand(string $text): bool
    {
        $text = strtolower(trim($text));
        foreach ($this->resetCommands as $command) {
            if ($text === $command || str_starts_with($text, $command . ' ')) {
                return true;
            }
        }
        if (preg_match('/^(hola|buenas|hey|saludos|qué tal|que tal|como|cmo|cómo)/i', $text)) {
            return true;
        }
        return false;
    }

    protected function isNativeLocationPayload(array $payload): bool
    {
        $hasLat = isset($payload['latitude']) &&
                  is_numeric($payload['latitude']) &&
                  $payload['latitude'] !== '' &&
                  $payload['latitude'] !== null &&
                  $payload['latitude'] != 0;

        $hasLng = isset($payload['longitude']) &&
                  is_numeric($payload['longitude']) &&
                  $payload['longitude'] !== '' &&
                  $payload['longitude'] !== null &&
                  $payload['longitude'] != 0;

        return $hasLat && $hasLng;
    }

    protected function handleStateMachine($session, $user, array $messageData, string $language = 'es'): void
    {
        $state = $session->state;
        $message = $messageData['text'];
        $locationData = $messageData['location'] ?? null;
        $hasValidCoords = $messageData['has_valid_coords'] ?? false;

        Log::info('State machine transition', [
            'session_id' => $session->id,
            'current_state' => $state,
            'has_valid_coords' => $hasValidCoords
        ]);

        match ($state) {
            'START' => $this->handleStart($session, $user, $language),
            'ASK_VEHICLE_TYPE' => $this->handleAskVehicleType($session, $user, $message, $language),
            'ASK_PICKUP' => $this->handleAskPickup($session, $user, $message, $locationData, $hasValidCoords, $language),
            'ASK_DESTINATION' => $this->handleAskDestination($session, $user, $message, $locationData, $hasValidCoords, $language),
            'CALCULATING_PRICE' => $this->handleCalculatingPrice($session, $user, $language),
            'SHOW_PRICE' => $this->handleShowPrice($session, $user, $message, $language),
            'ASK_INSTRUCTIONS' => $this->handleAskInstructions($session, $user, $message, $language),
            'SEARCHING_DRIVER' => $this->handleSearchingDriver($session, $user, $message, $language),
            'DRIVER_ASSIGNED' => $this->handleDriverAssigned($session, $user, $message, $language),
            'DRIVER_EN_ROUTE' => $this->handleDriverEnRoute($session, $user, $message, $language),
            'ARRIVED' => $this->handleArrived($session, $user, $message, $language),
            'IN_PROGRESS' => $this->handleInProgress($session, $user, $message, $language),
            'COMPLETED' => $this->handleCompleted($session, $user, $language),
            default => $this->handleUnknownState($session, $user, $language),
        };
    }

    protected function handleStart($session, $user, string $language = 'es'): void
    {
        $session->update(['state' => 'ASK_VEHICLE_TYPE']);

        $responseMessage =
            "¡Hola! Bienvenido a *Delivery Avaroa* 🚚\n\n" .
            "¿Para qué tipo de envío necesitás mensajero hoy?\n\n" .
            "1️⃣ *Moto* — Rápida y económica\n" .
            "2️⃣ *Auto* — Paquetes medianos\n" .
            "3️⃣ *Minivan* — Varios paquetes\n" .
            "4️⃣ *Camión* — Mudanzas o cargas grandes\n\n" .
            "Responde con el *número* 😊";

        $this->sendToUser($user, $responseMessage, $session->id, null, $language);
    }

    protected function handleAskVehicleType($session, $user, string $message, string $language = 'es'): void
    {
        $lowerMessage = strtolower(trim($message));
        $selectedType = $this->detectVehicleType($lowerMessage);

        if (!$selectedType) {
            $errorMsg = $this->pickRandomMessage('vehicle', $session->id);
            $this->sendToUser($user, $errorMsg, $session->id, null, $language);
            return;
        }

        $option = $this->vehicleOptions[$selectedType];
        $backendType = $option['backend_type'];

        $trip = Trip::create([
            'customer_id' => $user->id,
            'conversation_id' => $session->id,
            'service_type' => 'delivery',
            'vehicle_type' => $backendType,
            'status' => 'NEW',
            'payment_method' => 'cash',
            'num_passengers' => 1,
            'trunk_required' => false
        ]);

        $session->update([
            'trip_id' => $trip->id,
            'flow_type' => 'delivery',
            'state' => 'ASK_PICKUP'
        ]);

        Log::info('Vehicle type selected', [
            'trip_id' => $trip->id,
            'user_type' => $selectedType,
            'backend_type' => $backendType
        ]);

        $vehicleLabel = $option['label'];

        $responseMessage =
            "✅ {$vehicleLabel} seleccionada\n\n" .
            "📍 *Paso 2 de 4* — ¿Dónde recogemos el paquete?\n\n" .
            "Envía tu ubicación real usando WhatsApp:\n" .
            "1. Tocá el ícono 📎\n" .
            "2. Seleccioná *Ubicación*\n" .
            "3. Elegí el punto en el mapa y presioná Enviar\n\n" .
            "⚠️ No escribas direcciones. Solo ubicaciones GPS reales.";

        $this->sendToUser($user, $responseMessage, $session->id, $trip->id, $language);
    }

    protected function detectVehicleType(string $message): ?string
    {
        $message = strtolower(trim($message));

        foreach ($this->vehicleOptions as $type => $config) {
            foreach ($config['keywords'] as $keyword) {
                if ($message === $keyword || str_contains($message, $keyword)) {
                    return $type;
                }
            }
        }

        return null;
    }

    protected function getVehicleLabel(string $backendType): string
    {
        foreach ($this->vehicleOptions as $option) {
            if ($option['backend_type'] === $backendType) {
                return $option['label'];
            }
        }
        return $backendType;
    }

    protected function handleAskPickup($session, $user, string $message, ?array $locationData, bool $hasValidCoords, string $language = 'es'): void
    {
        if (!$hasValidCoords || !$locationData) {
            Log::warning('REJECTED invalid pickup location', [
                'session_id' => $session->id,
                'message' => $message
            ]);

            $errorMsg = $this->pickRandomMessage('pickup', $session->id);
            $this->sendToUser($user, $errorMsg, $session->id, $session->trip_id, $language);
            return;
        }

        $lat = $locationData['latitude'];
        $lng = $locationData['longitude'];

        $trip = Trip::find($session->trip_id);
        if (!$trip) {
            $errorMsg = "❌ Se perdió tu pedido 😕\n\nEscribí *HOLA* para empezar de nuevo";
            $this->sendToUser($user, $errorMsg, $session->id, null, $language);
            return;
        }

        $trip->update([
            'origin_url' => $locationData['raw'] ?? "https://maps.google.com/?q={$lat},{$lng}",
            'origin_lat' => $lat,
            'origin_lng' => $lng,
            'status' => 'pickup_set'
        ]);

        $session->update(['state' => 'ASK_DESTINATION']);

        Log::info('Pickup saved', ['trip_id' => $trip->id, 'lat' => $lat, 'lng' => $lng]);

        $responseMessage =
            "✅ Recogida registrada\n\n" .
            "📍 *Paso 3 de 4* — ¿A dónde lo llevamos?\n\n" .
            "Envía la ubicación de entrega usando el mismo método (📎 → Ubicación).";

        $this->sendToUser($user, $responseMessage, $session->id, $trip->id, $language);
    }

    protected function handleAskDestination($session, $user, string $message, ?array $locationData, bool $hasValidCoords, string $language = 'es'): void
    {
        $trip = Trip::find($session->trip_id);
        if (!$trip) {
            $errorMsg = "❌ Se perdió tu pedido 😕\n\nEscribí *HOLA* para empezar de nuevo";
            $this->sendToUser($user, $errorMsg, $session->id, null, $language);
            return;
        }

        if (!$hasValidCoords || !$locationData) {
            $errorMsg = $this->pickRandomMessage('destination', $session->id);
            $this->sendToUser($user, $errorMsg, $session->id, $session->trip_id, $language);
            return;
        }

        $lat = $locationData['latitude'];
        $lng = $locationData['longitude'];

        if ($this->isSameLocation($trip, $locationData)) {
            $responseMessage = "❌ El destino es igual a la recogida 😅\n\nMandame una ubicación *diferente*";
            $this->sendToUser($user, $responseMessage, $session->id, $session->trip_id, $language);
            return;
        }

        $trip->update([
            'destination_url' => $locationData['raw'] ?? "https://maps.google.com/?q={$lat},{$lng}",
            'destination_lat' => $lat,
            'destination_lng' => $lng,
            'status' => 'destination_set'
        ]);

        $session->update(['state' => 'CALCULATING_PRICE']);

        Log::info('Destination saved', ['trip_id' => $trip->id, 'lat' => $lat, 'lng' => $lng]);

        $this->handleCalculatingPrice($session, $user, $language);
    }

    protected function isSameLocation(Trip $trip, array $locationData): bool
    {
        if ($trip->origin_lat !== null && $trip->origin_lng !== null) {
            $distance = $this->calculateDistanceBetweenPoints(
                $trip->origin_lat,
                $trip->origin_lng,
                $locationData['latitude'],
                $locationData['longitude']
            );
            if ($distance < 0.1) {
                return true;
            }
        }
        return false;
    }

    protected function calculateDistanceBetweenPoints(float $lat1, float $lng1, float $lat2, float $lng2): float
    {
        $R = 6371;
        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);
        $a = sin($dLat/2)**2 + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLng/2)**2;
        return $R * 2 * atan2(sqrt($a), sqrt(1-$a));
    }

    protected function handleCalculatingPrice($session, $user, string $language = 'es'): void
    {
        $trip = Trip::find($session->trip_id);
        if (!$trip) {
            $errorMsg = "❌ Error del sistema 😕\n\nEscribí *HOLA* para reiniciar";
            $this->sendToUser($user, $errorMsg, $session->id, null, $language);
            return;
        }

        $calculatingMsg = "⏳ Calculando... un segundito";
        $this->sendToUser($user, $calculatingMsg, $session->id, $trip->id, $language);

        try {
            $price = $this->tripFlow->calculateCost($trip);
            $trip->refresh();

            if ($price === null || $price <= 0) {
                throw new \Exception('Invalid price calculation');
            }

            $session->update(['state' => 'SHOW_PRICE']);

            $priceFormatted = number_format($price, 2);
            $distanceFormatted = $trip->distance ? number_format($trip->distance, 1) : '0';
            $vehicleLabel = $this->getVehicleLabel($trip->vehicle_type);

            $msg =
                "📊 *Resumen de tu envío*\n\n" .
                "🚗 Vehículo: {$vehicleLabel}\n" .
                "📍 Distancia: {$distanceFormatted} km\n" .
                "💰 Precio: *Bs {$priceFormatted}*\n\n" .
                "¿Confirmás el envío?\n" .
                "(Responde *SÍ* o *NO*)";

            $this->sendToUser($user, $msg, $session->id, $trip->id, $language);

        } catch (\Exception $e) {
            Log::error('Price calculation failed', ['error' => $e->getMessage()]);

            $errorMsg = "❌ No pude calcular la ruta 😕\n\nEscribí *HOLA* para intentar de nuevo";
            $this->sendToUser($user, $errorMsg, $session->id, $trip->id, $language);

            $trip->update(['status' => 'cancelled']);
            $session->update(['state' => 'START', 'trip_id' => null]);
        }
    }

    protected function handleShowPrice($session, $user, string $message, string $language = 'es'): void
    {
        $response = strtolower(trim($message));
        $yesKeywords = ['sí', 'si', 'ok', 'claro', 'vale', 'ya', 's', 'yes', 'reservar',
                        'confirmar', 'tomar', 'dale', 'bueno', 'esta bien', 'está bien',
                        'confirmo', 'dale nomás', 'va', 'listo', 'perfecto', 'dale pues'];
        $noKeywords = ['no', 'nope', 'cancelar', 'no gracias', 'nah', 'rechazar',
                       'n', 'nop', 'paso', 'pasar', 'otra vez', 'más tarde', 'mas tarde'];

        $confirmed = false;
        foreach ($yesKeywords as $keyword) {
            if ($response === $keyword || str_contains($response, $keyword)) {
                $confirmed = true;
                break;
            }
        }

        if ($confirmed) {
            $session->update(['state' => 'ASK_INSTRUCTIONS']);
            $responseMessage =
                "¿Querés dejar alguna instrucción para el mensajero?\n\n" .
                "Ejemplos: *Llamar al llegar*, *Puerta roja*, *Entregar a recepción*\n\n" .
                "Escribí las instrucciones o respondé *No*.";
            $this->sendToUser($user, $responseMessage, $session->id, $session->trip_id, $language);
            return;
        }

        $rejected = false;
        foreach ($noKeywords as $keyword) {
            if ($response === $keyword || str_contains($response, $keyword)) {
                $rejected = true;
                break;
            }
        }

        if ($rejected) {
            $this->handleCancel($session, $user, $language);
            return;
        }

        $responseMessage =
            "¿Confirmás el envío?\n\n" .
            "✅ *SÍ* — para buscar mensajero\n" .
            "❌ *NO* — para cancelar";

        $this->sendToUser($user, $responseMessage, $session->id, $session->trip_id, $language);
    }

    protected function handleAskInstructions($session, $user, string $message, string $language = 'es'): void
    {
        $trip = Trip::find($session->trip_id);
        if (!$trip) {
            $errorMsg = "❌ Error del pedido 😕\n\nEscribí *HOLA* para empezar de nuevo";
            $this->sendToUser($user, $errorMsg, $session->id, null, $language);
            return;
        }

        $text = strtolower(trim($message));
        $declineKeywords = ['no', 'nada', 'ninguna', 'no hay', 'sin instrucciones',
                           'nop', 'ninguno', '0', '-', 'ningunas', 'pasar', 'nope'];

        if (!in_array($text, $declineKeywords)) {
            $trip->update(['notes' => $message]);
            Log::info('Instructions saved', ['trip_id' => $trip->id, 'notes' => $message]);
        }

        $session->update(['state' => 'SEARCHING_DRIVER']);
        $trip->update(['status' => 'searching']);

        if (!$trip->price || $trip->price <= 0) {
            $this->tripFlow->calculateCost($trip);
            $trip->refresh();
        }

        $driversFound = $this->driverService->broadcastToDrivers($trip, $language);
        $vehicleLabel = $this->getVehicleLabel($trip->vehicle_type);

        if ($driversFound) {
            $responseMessage =
                "🔍 Buscando mensajero disponible...\n\n" .
                "Tiempo estimado: *1-4 minutos*\n\n" .
                "Escribí *ESTADO* para ver progreso o *CANCELAR* para detener.";

            $this->sendToUser($user, $responseMessage, $session->id, $trip->id, $language);
        } else {
            $msg = "❌ No hay mensajeros con {$vehicleLabel} disponibles ahora 😕\n\nEscribí *HOLA* para intentar con otro vehículo";
            $this->sendToUser($user, $msg, $session->id, null, $language);
            $trip->update(['status' => 'no_drivers']);
            $session->update(['state' => 'COMPLETED', 'trip_id' => null]);
        }
    }

    protected function handleSearchingDriver($session, $user, string $message, string $language = 'es'): void
    {
        $text = strtolower(trim($message));
        $trip = Trip::find($session->trip_id);

        if (!$trip) {
            $errorMsg = "❌ No encontré tu envío activo 😕\n\nEscribí *HOLA* para empezar";
            $this->sendToUser($user, $errorMsg, $session->id, null, $language);
            return;
        }

        if ($trip->status === 'assigned' && $trip->driver_id) {
            $session->update(['state' => 'DRIVER_ASSIGNED']);
            $this->handleDriverAssigned($session, $user, $message, $language);
            return;
        }

        if ($trip->status === 'en_route') {
            $session->update(['state' => 'DRIVER_EN_ROUTE']);
            $this->handleDriverEnRoute($session, $user, $message, $language);
            return;
        }

        if ($trip->status === 'arrived') {
            $session->update(['state' => 'ARRIVED']);
            $this->handleArrived($session, $user, $message, $language);
            return;
        }

        if ($trip->status === 'in_progress') {
            $session->update(['state' => 'IN_PROGRESS']);
            $this->handleInProgress($session, $user, $message, $language);
            return;
        }

        if ($trip->status === 'no_drivers') {
            $vehicleLabel = $this->getVehicleLabel($trip->vehicle_type);
            $msg = "❌ No hay mensajeros con {$vehicleLabel} disponibles 😕\n\nEscribí *HOLA* para intentar de nuevo";
            $this->sendToUser($user, $msg, $session->id, null, $language);
            $session->update(['state' => 'COMPLETED', 'trip_id' => null]);
            return;
        }

        if ($trip->status === 'completed') {
            $this->handleCompleted($session, $user, $language);
            return;
        }

        if (in_array($text, ['cancelar', 'detener', 'abortar'])) {
            $this->handleCancel($session, $user, $language);
            return;
        }

        if (in_array($text, ['estado', 'status', 'situación', 'situacion', 'donde', 'dónde'])) {
            $msg = "⏳ Todavía buscando...\n\nEscribí *CANCELAR* para detener";
            $this->sendToUser($user, $msg, $session->id, $trip->id, $language);
            return;
        }

        $responseMessage =
            "⏳ Seguimos buscando...\n\n" .
            "Un poco más de paciencia 😊\n" .
            "O escribí *CANCELAR*";

        $this->sendToUser($user, $responseMessage, $session->id, $trip->id, $language);
    }

    protected function handleDriverAssigned($session, $user, string $message, string $language = 'es'): void
    {
        $text = strtolower(trim($message));
        $trip = Trip::find($session->trip_id);

        if (!$trip || !$trip->driver_id) {
            $this->sendToUser($user, "❌ Error al cargar datos del mensajero 😕", $session->id, null, $language);
            return;
        }

        if (in_array($text, ['estado', 'status', 'situación', 'situacion', 'donde', 'dónde'])) {
            $status = $this->getTripStatus($session->trip_id, 'delivery', $language);
            $this->sendToUser($user, $status, $session->id, $session->trip_id, $language);
            return;
        }

        if ($trip->status === 'en_route') {
            $session->update(['state' => 'DRIVER_EN_ROUTE']);
            $this->handleDriverEnRoute($session, $user, $message, $language);
            return;
        }

        if ($trip->status === 'arrived') {
            $session->update(['state' => 'ARRIVED']);
            $this->handleArrived($session, $user, $message, $language);
            return;
        }

        if ($trip->status === 'in_progress') {
            $session->update(['state' => 'IN_PROGRESS']);
            $this->handleInProgress($session, $user, $message, $language);
            return;
        }

        if ($trip->status === 'completed') {
            $session->update(['state' => 'COMPLETED']);
            $this->handleCompleted($session, $user, $language);
            return;
        }

        $driver = Driver::with('user')->find($trip->driver_id);
        $vehicle = Vehicle::find($trip->vehicle_id);

        $priceFormatted = $trip->price ? 'Bs ' . number_format($trip->price, 2) : 'Bs 0';
        $driverName = $driver?->user?->name ?? 'Mensajero';
        $driverPhone = $driver?->user?->whatsapp_number ?? 'N/A';
        $vehicleDisplay = $this->formatVehicleForDisplay($vehicle);

        $msg =
            "✅ *¡Mensajero asignado!*\n\n" .
            "👤 *Nombre:* {$driverName}\n" .
            "{$vehicleDisplay}\n" .
            "📱 *Teléfono:* {$driverPhone}\n\n" .
            "💰 *Precio:* {$priceFormatted}\n\n" .
            "🚚 El mensajero ya va hacia tu ubicación.";

        $this->sendToUser($user, $msg, $session->id, $trip->id, $language);
    }

    protected function handleDriverEnRoute($session, $user, string $message, string $language = 'es'): void
    {
        $text = strtolower(trim($message));
        $trip = Trip::find($session->trip_id);

        if (in_array($text, ['estado', 'status'])) {
            $status = $this->getTripStatus($session->trip_id, 'delivery', $language);
            $this->sendToUser($user, $status, $session->id, $trip->id, $language);
            return;
        }

        if ($trip && $trip->status === 'arrived') {
            $session->update(['state' => 'ARRIVED']);
            $this->handleArrived($session, $user, $message, $language);
            return;
        }

        if ($trip && $trip->status === 'in_progress') {
            $session->update(['state' => 'IN_PROGRESS']);
            $this->handleInProgress($session, $user, $message, $language);
            return;
        }

        if ($trip && $trip->status === 'completed') {
            $session->update(['state' => 'COMPLETED']);
            $this->handleCompleted($session, $user, $language);
            return;
        }

        $driver = Driver::with('user')->find($trip?->driver_id);
        $vehicle = Vehicle::find($trip?->vehicle_id);
        $driverName = $driver?->user?->name ?? 'Mensajero';
        $vehicleDisplay = $this->formatVehicleForDisplay($vehicle);

        $responseMessage =
            "🚚 *Tu mensajero está en camino*\n\n" .
            "👤 *Mensajero:* {$driverName}\n" .
            "{$vehicleDisplay}\n\n" .
            "Se dirige a tu ubicación de recogida.";

        $this->sendToUser($user, $responseMessage, $session->id, $trip->id, $language);
    }

    protected function handleArrived($session, $user, string $message, string $language = 'es'): void
    {
        $trip = Trip::find($session->trip_id);

        if ($trip && $trip->status === 'in_progress') {
            $session->update(['state' => 'IN_PROGRESS']);
            $this->handleInProgress($session, $user, $message, $language);
            return;
        }

        if ($trip && $trip->status === 'completed') {
            $session->update(['state' => 'COMPLETED']);
            $this->handleCompleted($session, $user, $language);
            return;
        }

        $driver = Driver::with('user')->find($trip?->driver_id);
        $vehicle = Vehicle::find($trip?->vehicle_id);
        $driverName = $driver?->user?->name ?? 'Mensajero';
        $vehicleDisplay = $this->formatVehicleForDisplay($vehicle);

        $responseMessage =
            "📍 *¡Tu mensajero llegó!*\n\n" .
            "👤 *Mensajero:* {$driverName}\n" .
            "{$vehicleDisplay}\n\n" .
            "Ya está en el punto de recogida 👍";

        $this->sendToUser($user, $responseMessage, $session->id, $trip->id, $language);
    }

    /**
     * CRITICAL FIX: New IN_PROGRESS state handler.
     * Prevents state machine from falling into default/reset when driver starts delivery.
     */
    protected function handleInProgress($session, $user, string $message, string $language = 'es'): void
    {
        $text = strtolower(trim($message));
        $trip = Trip::find($session->trip_id);

        if (in_array($text, ['estado', 'status'])) {
            $status = $this->getTripStatus($session->trip_id, 'delivery', $language);
            $this->sendToUser($user, $status, $session->id, $session->trip_id, $language);
            return;
        }

        if ($trip && $trip->status === 'completed') {
            $session->update(['state' => 'COMPLETED']);
            $this->handleCompleted($session, $user, $language);
            return;
        }

        $driver = Driver::with('user')->find($trip?->driver_id);
        $vehicle = Vehicle::find($trip?->vehicle_id);
        $driverName = $driver?->user?->name ?? 'Mensajero';
        $vehicleDisplay = $this->formatVehicleForDisplay($vehicle);

        $responseMessage =
            "📦 *Envío en progreso*\n\n" .
            "👤 *Mensajero:* {$driverName}\n" .
            "{$vehicleDisplay}\n\n" .
            "Tu paquete está en camino al destino 📍\n\n" .
            "Escribí *ESTADO* para actualizaciones.";

        $this->sendToUser($user, $responseMessage, $session->id, $trip->id, $language);
    }

    protected function handleCompleted($session, $user, string $language = 'es'): void
    {
        $trip = Trip::find($session->trip_id);

        if (!$trip) {
            $msg = "¿Otro envío? 😊\n\nEscribí *HOLA* para empezar";
            $this->sendToUser($user, $msg, $session->id, null, $language);
            $session->update(['state' => 'COMPLETED', 'trip_id' => null, 'flow_type' => null]);
            return;
        }

        if ($trip->status === 'completed') {
            $msg = "✅ *¡Entrega completada!*\n\n" .
                "Gracias por usar nuestro servicio 🚚\n\n" .
                "Escribí *HOLA* para hacer otra entrega.";
            $this->sendToUser($user, $msg, $session->id, $trip->id, $language);

            $session->update([
                'state' => 'COMPLETED',
                'trip_id' => null,
                'flow_type' => null
            ]);
            return;
        }

        // If not yet completed but in this state, show current status with vehicle info
        $driver = Driver::with('user')->find($trip->driver_id);
        $vehicle = Vehicle::find($trip->vehicle_id);
        $driverName = $driver?->user?->name ?? 'No asignado';
        $vehicleDisplay = $this->formatVehicleForDisplay($vehicle);

        $message =
            "📦 *Envío en progreso*\n\n" .
            "👤 *Mensajero:* {$driverName}\n" .
            "{$vehicleDisplay}\n\n" .
            "Escribí *ESTADO* para actualizaciones.";

        $this->sendToUser($user, $message, $session->id, $trip->id, $language);
    }

    protected function handleUnknownState($session, $user, string $language = 'es'): void
    {
        Log::warning('Unknown state encountered', ['state' => $session->state]);
        $this->handleReset($session, $user, $language);
    }

    protected function handleDriverMessage(Driver $driver, array $payload): string
    {
        $result = $this->driverService->processDriverMessage($driver, $payload);
        return json_encode($result);
    }

    protected function handleCancel($session, $user, string $language = 'es'): void
    {
        if ($session->trip_id) {
            $trip = Trip::find($session->trip_id);
            if ($trip && !in_array($trip->status, ['completed', 'no_drivers'])) {
                $trip->update(['status' => 'cancelled']);

                if ($trip->driver_id) {
                    $driver = Driver::find($trip->driver_id);
                    if ($driver && $driver->user) {
                        $this->metaWhatsApp->sendMessage(
                            $driver->user->whatsapp_number,
                            "❌ *Envío cancelado*\n\nEl cliente canceló. No es necesario continuar."
                        );
                    }
                }
            }
        }

        $session->update([
            'state' => 'COMPLETED',
            'trip_id' => null,
            'flow_type' => null
        ]);

        $responseMessage =
            "❌ *Pedido cancelado*\n\n" .
            "Escribí *HOLA* cuando quieras hacer otra entrega";

        $this->sendToUser($user, $responseMessage, $session->id, null, $language);
    }

    protected function handleReset($session, $user, string $language = 'es'): void
    {
        if ($session->trip_id) {
            $trip = Trip::find($session->trip_id);
            if ($trip && !in_array($trip->status, ['completed', 'cancelled', 'no_drivers'])) {
                $trip->update(['status' => 'cancelled']);

                if ($trip->driver_id) {
                    $driver = Driver::find($trip->driver_id);
                    if ($driver && $driver->user) {
                        $this->metaWhatsApp->sendMessage(
                            $driver->user->whatsapp_number,
                            "❌ *Envío cancelado*\n\nEl cliente reinició el pedido. No es necesario continuar."
                        );
                    }
                }
            }
        }

        foreach ($this->lastErrors as $key => $val) {
            if (str_contains($key, '_' . $session->id)) {
                unset($this->lastErrors[$key]);
            }
        }

        $session->update([
            'state' => 'START',
            'trip_id' => null,
            'flow_type' => null,
            'language' => $language
        ]);

        $this->handleStart($session, $user, $language);
    }

    protected function pickRandomMessage(string $context, int $sessionId): string
    {
        $pools = [
            'pickup' => [
                "❌ Solo acepto ubicación real de WhatsApp.\n\nPor favor:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y enviá\n\nNo escribas direcciones ni texto.",
                "Necesito el botón de ubicación 📍\n\n📎 → Ubicación → elegí en el mapa\nSin direcciones escritas",
                "Solo coordenadas reales 📍\n\nTocá 📎, seleccioná Ubicación\ny elegí el punto",
                "Ahí me mandaste texto 😅\n\nNecesito la ubicación del mapa\nSin escribir direcciones",
                "Casi... pero necesito GPS 📍\n\n📎 → Ubicación → tocá en el mapa\nY mandá nomás",
                "No me sirve el texto ahí 😅\n\nMandame la ubicación real:\n📎 → Ubicación → mapa",
            ],
            'destination' => [
                "❌ Solo acepto ubicación real de WhatsApp.\n\nPor favor:\n1. Tocá el ícono 📎\n2. Seleccioná *Ubicación*\n3. Elegí el punto en el mapa y enviá\n\nNo escribas direcciones ni texto.",
                "Mandame la ubicación de destino 📍\n\nTocá 📎 → Ubicación\ny elegí el punto",
                "Solo acepto ubicación real 😅\n\n📎 → Ubicación → mapa\nAsí funciona mejor",
                "El destino tiene que ser GPS 📍\n\nUsá el botón de ubicación\ny tocá en el mapa 👍",
                "Sin texto para el destino 😅\n\n📎 → Ubicación → mapa\nSolo así funciona",
            ],
            'vehicle' => [
                "Esa opción no existe 😅\n\nElegí del 1 al 4\nO escribí el nombre",
                "No te entendí bien 🤔\n\n¿Moto, Auto, Minivan o Camión?\nTambién podés usar 1, 2, 3 o 4",
                "Elegí una de estas 4 👇\n\n1️⃣ Moto  2️⃣ Auto\n3️⃣ Minivan  4️⃣ Camión",
                "¿Qué vehículo querés? 😊\n\n1-4 o escribí el nombre\nMoto, Auto, Minivan o Camión",
            ]
        ];

        $pool = $pools[$context] ?? ['Algo salió mal 😅'];
        $lastKey = "{$context}_{$sessionId}";
        $lastIndex = $this->lastErrors[$lastKey] ?? null;

        $available = [];
        foreach ($pool as $index => $msg) {
            if ($index !== $lastIndex) {
                $available[$index] = $msg;
            }
        }

        if (empty($available)) {
            $available = $pool;
        }

        $selectedIndex = array_rand($available);
        $this->lastErrors[$lastKey] = $selectedIndex;

        return $available[$selectedIndex];
    }

    protected function parseLocationFromPayload(array $payload): ?array
    {
        if (!empty($payload['latitude']) && !empty($payload['longitude']) &&
            is_numeric($payload['latitude']) && is_numeric($payload['longitude'])) {

            $lat = (float) $payload['latitude'];
            $lng = (float) $payload['longitude'];

            if ($lat === 0.0 && $lng === 0.0) {
                return null;
            }

            return [
                'type' => 'coordinates',
                'coordinates' => "{$lat},{$lng}",
                'latitude' => $lat,
                'longitude' => $lng,
                'location_name' => $payload['location_name'] ?? 'Ubicación compartida',
                'address' => $payload['address'] ?? null,
                'raw' => "https://www.google.com/maps?q={$lat},{$lng}"
            ];
        }

        return null;
    }

    protected function getDriverByPhone(string $phone): ?Driver
    {
        return Driver::whereHas('user', function ($q) use ($phone) {
            $q->where('whatsapp_number', $phone);
        })->first();
    }

    protected function getOrCreateUser(string $phone, string $name): User
    {
        return User::firstOrCreate(
            ['whatsapp_number' => $phone],
            [
                'name' => $name,
                'role' => 'customer',
                'is_active' => true,
                'account_type' => 'customer'
            ]
        );
    }

    protected function getActiveSession(int $userId): ConversationSession
    {
        $session = ConversationSession::where('customer_id', $userId)
            ->latest()
            ->first();

        if (!$session) {
            $session = ConversationSession::create([
                'customer_id' => $userId,
                'state' => 'START',
                'flow_type' => null,
                'language' => 'es'
            ]);
        }

        if ($session->state === 'COMPLETED') {
            $session->update(['trip_id' => null, 'flow_type' => null]);
        }

        return $session;
    }

    protected function sendToUser(User $user, string $message, ?int $conversationId = null, ?int $tripId = null, string $language = 'es'): bool
    {
        if ($conversationId) {
            $this->logMessage($conversationId, $tripId, 'system', 0, $message);
        }

        $sent = $this->metaWhatsApp->sendMessage($user->whatsapp_number, $message);

        if (!$sent) {
            $sent = $this->metaWhatsApp->sendTemplateMessage(
                $user->whatsapp_number,
                'delivery_notification_sp',
                ['message' => $message]
            );
        }

        return $sent;
    }

    protected function logMessage(?int $conversationId, ?int $tripId, string $senderType, int $senderId, string $content): void
    {
        try {
            Message::create([
                'conversation_id' => $conversationId,
                'trip_id' => $tripId,
                'sender_type' => $senderType,
                'sender_id' => $senderId,
                'content' => $content
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to log message', ['error' => $e->getMessage()]);
        }
    }

    protected function getTripStatus(?int $tripId, string $serviceType, string $language = 'es'): string
    {
        if (!$tripId) {
            return "No tenés un envío activo ahora.";
        }

        $trip = Trip::with('driver.user')->find($tripId);

        if (!$trip) {
            return "No encontré info del envío.";
        }

        $statusMessages = [
            'NEW' => '🆕 Envío registrado, esperando confirmación.',
            'pickup_set' => '📍 Recogida guardada.',
            'destination_set' => '📦 Destino guardado, calculando precio...',
            'priced' => '💰 Precio listo, esperando tu confirmación.',
            'searching' => '🔍 Buscando mensajero...',
            'assigned' => '✅ Mensajero asignado, en camino a la recogida.',
            'en_route' => '🚚 Mensajero en camino al destino.',
            'arrived' => '📍 El mensajero llegó a la ubicación.',
            'in_progress' => '📦 Entrega en progreso.',
            'completed' => '✅ Envío completado.',
            'cancelled' => '❌ Envío cancelado.',
            'no_drivers' => '❌ No hay mensajeros disponibles.'
        ];

        $status = $statusMessages[$trip->status] ?? 'Estado desconocido';

        if ($trip->driver_id && $trip->driver) {
            $driverName = $trip->driver->user->name ?? 'Mensajero';
            $status .= "\n👤 {$driverName}";

            if ($trip->driver->user && $trip->driver->user->whatsapp_number) {
                $status .= "\n📱 {$trip->driver->user->whatsapp_number}";
            }

            $vehicle = Vehicle::find($trip->vehicle_id);
            if (!$vehicle) {
                $vehicle = Vehicle::where('driver_id', $trip->driver_id)
                    ->where('type', $trip->vehicle_type)
                    ->where('is_active', true)
                    ->first();
            }
            $vehicleDisplay = $this->formatVehicleForDisplay($vehicle);
            $status .= "\n{$vehicleDisplay}";
        }

        return $status;
    }

    protected function buildVehicleDescription(?Vehicle $vehicle): string
    {
        if (!$vehicle) {
            return 'Vehículo';
        }

        $parts = [];

        if (!empty($vehicle->brand)) {
            $parts[] = trim($vehicle->brand);
        } elseif (!empty($vehicle->make)) {
            $parts[] = trim($vehicle->make);
        }

        if (!empty($vehicle->model)) {
            $parts[] = trim($vehicle->model);
        }

        if (!empty($vehicle->color)) {
            $parts[] = trim($vehicle->color);
        } elseif (!empty($vehicle->year) && $vehicle->year > 0) {
            $parts[] = (string) $vehicle->year;
        }

        if (!empty($parts)) {
            return implode(' ', $parts);
        }

        return $vehicle->vehicle_type_label ?? $vehicle->type ?? 'Vehículo';
    }

    protected function formatVehicleForDisplay(?Vehicle $vehicle): string
    {
        if (!$vehicle) {
            return '🚗 Vehículo no especificado';
        }

        $description = $this->buildVehicleDescription($vehicle);
        $plate = $vehicle->plate_number ?? 'N/A';
        $typeLabel = $vehicle->vehicle_type_label ?? $this->getVehicleLabel($vehicle->type) ?? $vehicle->type ?? 'Vehículo';

        if ($description === $typeLabel || $description === 'Vehículo') {
            return "🚗 {$typeLabel} - Placa: {$plate}";
        }

        return "🚗 {$description} - Placa: {$plate}";
    }
}
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OpenAIService
{
    protected ?string $apiKey = null;
    protected string $model = 'gpt-4o-mini';
    protected string $baseUrl = 'https://api.openai.com/v1';

    public function __construct()
    {
        $this->apiKey = config('services.openai.api_key');
    }

    public function generateResponse(array $conversationHistory, array $context = []): array
    {
        if (empty($this->apiKey)) {
            Log::error('OpenAI API key not configured');
            return $this->fallbackResponse($context);
        }

        try {
            $systemPrompt = $this->buildSystemPrompt($context);

            $messages = [
                ['role' => 'system', 'content' => $systemPrompt]
            ];

            foreach ($conversationHistory as $msg) {
                $messages[] = [
                    'role' => $msg['role'],
                    'content' => $msg['content']
                ];
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])
                ->timeout(30)
                ->post($this->baseUrl . '/chat/completions', [
                    'model' => $this->model,
                    'messages' => $messages,
                    'temperature' => 0.7,
                    'max_tokens' => 500,
                    'response_format' => ['type' => 'json_object']
                ]);

            if ($response->successful()) {
                $data = $response->json();
                $content = $data['choices'][0]['message']['content'] ?? '{}';

                Log::info('OpenAI response generated', ['content' => $content]);

                return json_decode($content, true) ?? $this->fallbackResponse($context);
            }

            Log::error('OpenAI API error', ['response' => $response->body()]);
            return $this->fallbackResponse($context);
        } catch (\Exception $e) {
            Log::error('OpenAI service error', ['error' => $e->getMessage()]);
            return $this->fallbackResponse($context);
        }
    }

    protected function buildSystemPrompt(array $context): string
    {
        $currentState = $context['state'] ?? 'START';
        $pickup = $context['pickup'] ?? null;
        $destination = $context['destination'] ?? null;
        $price = $context['price'] ?? null;
        $driver = $context['driver'] ?? null;
        $vehicleType = $context['vehicle_type'] ?? null;

        return $this->buildSpanishPrompt($currentState, $pickup, $destination, $price, $driver, $vehicleType);
    }

    /**
     * CRITICAL FIX: Updated to v2.0 document — 4 vehicle types, GPS-only locations,
     * correct step numbering, and Bolivian personality.
     */
    protected function buildSpanishPrompt(string $currentState, ?string $pickup, ?string $destination, ?float $price, ?string $driver, ?string $vehicleType): string
    {
        $stateInfo = match ($currentState) {
            'START' => 'El usuario acaba de iniciar. Dale la bienvenida con onda boliviana y preguntá qué tipo de vehículo necesita (1-4).',
            'ASK_VEHICLE_TYPE' => 'El usuario debe elegir tipo de vehículo del 1 al 4. Solo acepta estas opciones. Si pone cualquier otra cosa, decile que elija del 1 al 4.',
            'ASK_PICKUP' => 'Esperando coordenadas GPS de recogida. Si el usuario envía texto, rechazalo con onda boliviana y pedile que mande ubicación real de WhatsApp. NUNCA aceptes direcciones escritas.',
            'ASK_DESTINATION' => 'Esperando coordenadas GPS de destino. Rechazá texto, solo aceptá ubicaciones reales de WhatsApp.',
            'CALCULATING_PRICE' => 'Calculando precio. Decile que espere un segundito.',
            'SHOW_PRICE' => "El precio es Bs " . ($price ? number_format($price, 2, '.', '') : 'calculando') . " para vehículo {$vehicleType}. Preguntá si confirma (SÍ o NO).",
            'ASK_INSTRUCTIONS' => 'Preguntá si hay instrucciones especiales para el mensajero. Ejemplos: Llamar al llegar, Puerta roja, Entregar a recepción.',
            'SEARCHING_DRIVER' => 'Buscando mensajero con el tipo de vehículo solicitado. Informá que tiene 1-4 minutos.',
            'DRIVER_ASSIGNED' => "Mensajero asignado: {$driver}. Informá que ya va hacia la ubicación.",
            'DRIVER_EN_ROUTE' => 'El mensajero está en camino al punto de recogida.',
            'ARRIVED' => 'El mensajero llegó al punto de recogida.',
            'COMPLETED' => 'Entrega completada. Mostrá resumen final y ofrecé hacer otro envío con HOLA.',
            default => 'Ayudá al usuario con su envío.'
        };

        return <<<PROMPT
Eres "Delivery Avaroa", el asistente oficial de mensajería rápida de Bolivia.

Tu personalidad: amable, directo, rápido, profesional y con un toque boliviano ligero. Nunca seas robótico ni repetitivo. Usá "vos" en lugar de "tú". Sé breve: máximo 2-3 líneas por mensaje (excepto el resumen de confirmación y la lista de vehículos).

REGLAS ESTRICTAS (Obligatorias):
1. SOLO aceptás ubicaciones reales de WhatsApp (mensaje con lat/lng). Rechazás cualquier texto, dirección escrita, plus code o link.
2. Si el usuario envía texto en lugar de ubicación → respuesta corta + instrucciones claras (máximo 3 líneas). Nunca repitas el mismo mensaje de error.
3. Siempre mostrá el paso actual: "Paso X de 4"
4. Si el usuario escribe CANCELAR, MENU, HOLA o REINICIAR → reiniciá el flujo desde el paso 1.
5. Nunca inventes datos. Usá los valores que te entrega el sistema (distancia, precio, nombre del mensajero, etc.).
6. Mantené el flujo en este orden exacto: Vehículo → Recogida → Destino → Confirmación → Instrucciones → Búsqueda.

TIPOS DE VEHÍCULO (solo estos 4):
1. Moto — Rápida y económica
2. Auto — Paquetes medianos
3. Minivan — Varios paquetes
4. Camión — Mudanzas o cargas grandes

ESTADO ACTUAL: {$currentState}
TIPO VEHÍCULO: {$vehicleType}
RECOGIDA: {$pickup}
DESTINO: {$destination}
PRECIO: {$price}
MENSAJERO: {$driver}

TAREA: {$stateInfo}

FORMATO JSON DE RESPUESTA:
{
    "message": "tu respuesta en español boliviano, breve y con onda",
    "action": "none|set_vehicle_type|set_pickup|set_destination|confirm_booking|cancel|reset|check_status",
    "detected_vehicle_type": "moto|automovil|minivan|camioneta|null",
    "detected_pickup": "coordenadas o null",
    "detected_destination": "coordenadas o null",
    "instructions": "instrucciones o null",
    "confirmed": false,
    "language": "es"
}
PROMPT;
    }

    /**
     * CRITICAL FIX: Fallbacks updated to v2.0 — 4 vehicles, GPS-only wording, step numbering.
     */
    protected function fallbackResponse(array $context): array
    {
        $state = $context['state'] ?? 'START';

        $fallbacks = [
            'START' => [
                'message' => "¡Hola! Bienvenido a Delivery Avaroa 🚚\n\n¿Para qué tipo de envío necesitás mensajero hoy?\n1️⃣ Moto\n2️⃣ Auto\n3️⃣ Minivan\n4️⃣ Camión\n\nRespondé con el número 😊",
                'action' => 'reset',
                'language' => 'es',
                'confirmed' => false
            ],
            'ASK_VEHICLE_TYPE' => [
                'message' => "Elegí del 1 al 4, o escribí el nombre del vehículo 😊",
                'action' => 'none',
                'language' => 'es',
                'confirmed' => false
            ],
            'ASK_PICKUP' => [
                'message' => "❌ Solo acepto ubicación real de WhatsApp.\n\nPor favor:\n1. Tocá el ícono 📎\n2. Seleccioná \"Ubicación\"\n3. Elegí el punto en el mapa y enviá\n\nNo escribas direcciones ni texto.",
                'action' => 'none',
                'language' => 'es',
                'confirmed' => false
            ],
            'ASK_DESTINATION' => [
                'message' => "❌ Solo acepto ubicación real de WhatsApp.\n\nPor favor:\n1. Tocá el ícono 📎\n2. Seleccioná \"Ubicación\"\n3. Elegí el punto en el mapa y enviá\n\nNo escribas direcciones ni texto.",
                'action' => 'none',
                'language' => 'es',
                'confirmed' => false
            ],
            'SHOW_PRICE' => [
                'message' => "¿Confirmás el envío? Responde SÍ o NO",
                'action' => 'none',
                'language' => 'es',
                'confirmed' => false
            ],
            'ASK_INSTRUCTIONS' => [
                'message' => "¿Alguna instrucción para el mensajero? Escribila o poné NO",
                'action' => 'none',
                'language' => 'es',
                'confirmed' => false
            ],
            'SEARCHING_DRIVER' => [
                'message' => "🔍 Buscando mensajero... un poco de paciencia 😊",
                'action' => 'none',
                'language' => 'es',
                'confirmed' => false
            ],
            'DRIVER_ASSIGNED' => [
                'message' => "¡Mensajero asignado! Ya va hacia tu ubicación 🚚",
                'action' => 'none',
                'language' => 'es',
                'confirmed' => false
            ],
            'COMPLETED' => [
                'message' => "¡Entrega completada! 🚚\n\nEscribí HOLA para otra entrega.",
                'action' => 'none',
                'language' => 'es',
                'confirmed' => false
            ],
        ];

        return $fallbacks[$state] ?? ['message' => '¿Cómo te ayudo?', 'action' => 'none', 'language' => 'es', 'confirmed' => false];
    }

    public function extractLocation(string $message, string $language = 'es'): ?array
    {
        if (!$this->containsUrlWithCoords($message)) {
            return null;
        }

        $coords = $this->extractCoordsFromUrl($message);

        if ($coords) {
            list($lat, $lng) = explode(',', $coords);
            if (is_numeric($lat) && is_numeric($lng) && $lat != 0 && $lng != 0) {
                return [
                    'has_location' => true,
                    'location_type' => 'google_maps',
                    'coordinates' => $coords,
                    'latitude' => (float)$lat,
                    'longitude' => (float)$lng,
                    'url' => $message
                ];
            }
        }

        return null;
    }

    protected function containsUrlWithCoords(string $message): bool
    {
        $hasMapsDomain = preg_match('/(maps\.google\.com|goo\.gl\/maps|google\.com\/maps|maps\.app\.goo\.gl)/i', $message);
        $hasCoordPattern = preg_match('/(q=|ll=|@)(-?\d+\.\d+),(-?\d+\.\d+)/', $message);
        return $hasMapsDomain && $hasCoordPattern;
    }

    protected function extractCoordsFromUrl(string $url): ?string
    {
        if (preg_match('/[?&]q=(-?\d+\.\d+),(-?\d+\.\d+)/', $url, $matches)) {
            return "{$matches[1]},{$matches[2]}";
        }
        if (preg_match('/[?&]ll=(-?\d+\.\d+),(-?\d+\.\d+)/', $url, $matches)) {
            return "{$matches[1]},{$matches[2]}";
        }
        if (preg_match('/@(-?\d+\.\d+),(-?\d+\.\d+)/', $url, $matches)) {
            return "{$matches[1]},{$matches[2]}";
        }
        return null;
    }

    public function detectLanguage(string $message): string
    {
        return 'es';
    }
}
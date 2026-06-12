<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Tarifa
    |--------------------------------------------------------------------------
    | El precio del viaje se calcula SIEMPRE en backend. La app del conductor y
    | el chat de WhatsApp solo muestran el valor calculado por el servidor.
    */
    'fare' => [
        'per_minute'      => (float) env('AVAROA_FARE_PER_MINUTE', 1.15),
        'minimum'         => (float) env('AVAROA_MIN_FARE', 7.00),
        'average_speed_kmh' => (float) env('AVAROA_AVG_SPEED_KMH', 25),
        'commission_rate' => (float) env('AVAROA_COMMISSION_RATE', 0.13),
        'currency'        => 'Bs',
    ],

    /*
    |--------------------------------------------------------------------------
    | Catálogo oficial de vehículos y servicios
    |--------------------------------------------------------------------------
    | Cada vehículo tiene una lista cerrada de servicios permitidos. Esta
    | estructura es la ÚNICA fuente de verdad en backend, admin, registro,
    | filtros, asignación de conductores, chat y app.
    */
    'vehicles' => [
        'motorcycle' => [
            'label'    => 'Motocicleta',
            'icon'     => '🛵',
            'services' => ['mototaxi', 'compras'],
            'carries_passengers' => true,
            'carries_cargo'      => true,
        ],
        'car' => [
            'label'    => 'Auto',
            'icon'     => '🚗',
            'services' => ['taxi', 'carga'],
            'carries_passengers' => true,
            'carries_cargo'      => true,
        ],
        'minivan' => [
            'label'    => 'Minivan',
            'icon'     => '🚐',
            'services' => ['taxi', 'carga'],
            'carries_passengers' => true,
            'carries_cargo'      => true,
        ],
        'truck' => [
            'label'    => 'Camión',
            'icon'     => '🚚',
            'services' => ['carga'],
            'carries_passengers' => false,
            'carries_cargo'      => true,
        ],
        'torito' => [
            'label'    => 'Torito',
            'icon'     => '🚜',
            'services' => ['taxi', 'carga_pequena'],
            'carries_passengers' => true,
            'carries_cargo'      => true,
        ],
        'bicycle' => [
            'label'    => 'Bicicleta',
            'icon'     => '🚲',
            'services' => ['delivery'],
            'carries_passengers' => false,
            'carries_cargo'      => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Catálogo de servicios
    |--------------------------------------------------------------------------
    | Cada servicio indica si requiere confirmación de entrega (foto, firma,
    | nombre del destinatario). Los servicios de pasajeros NO requieren prueba
    | de entrega — basta con "Finalizar Viaje".
    */
    'services' => [
        'taxi'           => ['label' => 'Taxi',           'requires_proof_of_delivery' => false, 'is_passenger' => true],
        'mototaxi'       => ['label' => 'Mototaxi',       'requires_proof_of_delivery' => false, 'is_passenger' => true],
        'carga'          => ['label' => 'Carga',          'requires_proof_of_delivery' => true,  'is_passenger' => false],
        'carga_pequena'  => ['label' => 'Carga pequeña',  'requires_proof_of_delivery' => true,  'is_passenger' => false],
        'delivery'       => ['label' => 'Delivery',       'requires_proof_of_delivery' => true,  'is_passenger' => false],
        'compras'        => ['label' => 'Compras',        'requires_proof_of_delivery' => true,  'is_passenger' => false],
    ],

    /*
    |--------------------------------------------------------------------------
    | Billetera del conductor
    |--------------------------------------------------------------------------
    | El saldo del conductor expira si pasan 30 días sin una nueva recarga.
    */
    'wallet' => [
        'expiration_days' => (int) env('AVAROA_WALLET_EXPIRATION_DAYS', 30),
    ],

    /*
    |--------------------------------------------------------------------------
    | Horario de atención del bot de WhatsApp
    |--------------------------------------------------------------------------
    */
    'bot' => [
        'timezone'        => env('AVAROA_BOT_TZ', 'America/La_Paz'),
        'start_hour'      => (int) env('AVAROA_BOT_START_HOUR', 8),   // 08:00
        'end_hour'        => (int) env('AVAROA_BOT_END_HOUR', 23),    // 23:00
        'human_agent_url' => env('AVAROA_HUMAN_AGENT_URL', 'https://wa.me/59178477130'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Identidad visual
    |--------------------------------------------------------------------------
    */
    'brand' => [
        'primary_blue' => '#0B1F4D', // azul oscuro corporativo del logo
    ],
];

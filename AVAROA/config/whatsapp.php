<?php

return [

    /*
    |--------------------------------------------------------------------------
    | WhatChimp API Configuration
    |--------------------------------------------------------------------------
    */
    'whatchimp' => [
        // ✅ FIXED: Match .env key name exactly
        'api_key'  => env('WHATSCHIMP_API_KEY'),

        // ✅ FIXED: Removed trailing space, proper default
        'base_url' => rtrim(env('WHATSCHIMP_BASE_URL', 'https://app.whatchimp.com/api/v1'), '/ '),
    ],

    /*
    |--------------------------------------------------------------------------
    | Webhook Verification Token
    |--------------------------------------------------------------------------
    */
    'verify_token' => env('WHATSAPP_VERIFY_TOKEN'),

    'trip_states' => [
        'NEW', 'COLLECTING_DATA', 'QUOTED', 'CONFIRMED', 'DISPATCHING',
        'ASSIGNED', 'PICKUP', 'IN_TRIP', 'COMPLETED', 'CANCELLED', 'FAILED',
    ],

    'conversation_states' => [
        'NEW', 'COLLECTING_PICKUP', 'COLLECTING_DELIVERY', 'COLLECTING_CARGO',
        'COLLECTING_WHEN', 'COLLECTING_PAYMENT', 'CONFIRM_SUMMARY', 'CONFIRMED', 'CANCELLED',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Bot Messages
    |--------------------------------------------------------------------------
    */
    'messages' => [
        'welcome' => "Namaste! 👋 Welcome to *CargoFlow* 🚚\n\n"
            . "We handle parcels, documents, furniture & goods.\n\n"
            . "📍 Please share *pickup location*\n"
            . "(Tap 📎 → Location → Share current location)\n"
            . "Or type full address (e.g. Azad Nagar, Indore)",

        'ask_pickup'   => "📍 Please share *pickup location*",
        'ask_delivery' => "📍 Now share *delivery / drop-off location*",
        'ask_cargo'    => "📦 Tell me about the cargo:\n"
            . "• Type\n"
            . "• Approx weight (kg)\n"
            . "• Size (optional)\n"
            . "• Notes (fragile, urgent)",

        'ask_when' => "⏰ When do you need delivery?\n"
            . "• now\n"
            . "• today\n"
            . "• tomorrow\n"
            . "• schedule",

        'ask_payment' => "💳 How would you like to pay?\n"
            . "• cash\n"
            . "• upi/qr\n"
            . "• card/online",

        'confirm_prompt' => "✅ Reply *YES* to confirm booking",
        'confirmed'      => "🎉 Booking confirmed!\nTrip ID: #{{trip_id}}\nDriver assigning...",
        'cancelled'      => "❌ Booking cancelled. Type *hi* to start again.",
        'error'          => "⚠️ Something went wrong. Please try again or type *hi*.",
    ],

    'quick_replies' => [
        'yes_no' => [
            ['id' => 'yes', 'title' => 'Yes – Confirm'],
            ['id' => 'no',  'title' => 'No – Cancel'],
        ],
        'when' => [
            ['id' => 'now',      'title' => 'Now'],
            ['id' => 'today',    'title' => 'Today'],
            ['id' => 'tomorrow', 'title' => 'Tomorrow'],
            ['id' => 'schedule', 'title' => 'Schedule'],
        ],
        'payment' => [
            ['id' => 'cash', 'title' => 'Cash'],
            ['id' => 'upi',  'title' => 'UPI / QR'],
            ['id' => 'card', 'title' => 'Card'],
        ],
    ],
];

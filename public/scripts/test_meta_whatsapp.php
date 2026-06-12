<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Services\MetaWhatsAppService;

$metaService = app(MetaWhatsAppService::class);

// Test 1: Send simple text message
echo "Test 1: Sending text message...\n";
$result = $metaService->sendMessage('918817016704', 'Hello from Meta API test! 🚚');
echo "Result: " . ($result ? "SUCCESS" : "FAILED") . "\n\n";

// Test 2: Send template message
echo "Test 2: Sending template message...\n";
$result = $metaService->sendTemplateMessage('918817016704', 'driver_latest_request', [
    'Test Customer',
    'Taxi',
    'https://maps.google.com/?q=-17.7833,-63.1667',
    'https://maps.google.com/?q=-17.8000,-63.1800',
    'Bs 50',
    'Test instructions'
]);
echo "Result: " . ($result ? "SUCCESS" : "FAILED") . "\n\n";

// Test 3: Check configuration
echo "Test 3: Configuration check...\n";
echo "Configured: " . ($metaService->isConfigured() ? "YES" : "NO") . "\n";

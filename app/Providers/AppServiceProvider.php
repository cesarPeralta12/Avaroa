<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MetaWhatsAppService;
use App\Services\WhatsAppService;
use App\Services\DriverAssignmentService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bind MetaWhatsAppService as singleton
        $this->app->singleton(MetaWhatsAppService::class, function ($app) {
            return new MetaWhatsAppService();
        });

        // WhatsAppService with dependencies
        $this->app->singleton(WhatsAppService::class, function ($app) {
            return new WhatsAppService(
                $app->make(\App\Services\TripFlowService::class),
                $app->make(DriverAssignmentService::class),
                $app->make(MetaWhatsAppService::class),
                $app->make(\App\Services\OpenAIService::class) // ✅ FIXED
            );
        });

        // DriverAssignmentService with MetaWhatsAppService
        $this->app->singleton(DriverAssignmentService::class, function ($app) {
            return new DriverAssignmentService(
                $app->make(MetaWhatsAppService::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS when APP_URL is https (running behind Apache/Coolify SSL proxy)
        if (str_starts_with(config('app.url', ''), 'https')) {
            \URL::forceScheme('https');
        }
    }
}

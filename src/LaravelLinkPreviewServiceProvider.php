<?php

namespace Teners\LaravelLinkPreview;

use Illuminate\Support\ServiceProvider;

class LaravelLinkPreviewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerResources();
        $this->publishResources();
    }

    public function register()
    {
        if (app()->runningInConsole()) {
        }
    }

    private function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/link-preview.php');
    }

    private function publishResources()
    {
        $this->publishes([
            __DIR__ . '/../config/link-preview.php' => config_path('link-preview.php'),
        ], 'link-preview-config');
    }
}

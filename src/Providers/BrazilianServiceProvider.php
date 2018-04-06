<?php

namespace Brazilian\Providers;

use Brazilian\Console\BrazilianInstallCommand;
use Illuminate\Support\ServiceProvider;

class BrazilianServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
            $this->commands([
                BrazilianInstallCommand::class
            ]);
        }
    }
}

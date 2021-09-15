<?php

namespace Nidavellir\Webhooks;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Nidavellir\Webhooks\Middleware\RestrictIps;

class NidavellirWebhooksServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadTestRoutes();
        $this->loadRoutes();
    }

    protected function loadRoutes()
    {
        Route::middleware(['api', RestrictIps::class])
             ->group(function () {
                 include __DIR__.'/../routes/web.php';
             });
    }

    protected function loadTestRoutes()
    {
        /*
        if (app()->environment() != 'production') {
            if (file_exists(__DIR__.'/../routes/tests.php')) {
                $routesPath = __DIR__.'/../routes/tests.php';
                Route::middleware(['web'])
                 ->group(function () use ($routesPath) {
                     include $routesPath;
                 });
            }
        }
        */
    }

    public function register()
    {
        //
    }
}

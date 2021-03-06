<?php

namespace Ratno\NovaEcho;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class NovaEchoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-echo', __DIR__ . '/../dist/js/nova-echo.js');
        });

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'nova-echo');

        $this->publishes([
            __DIR__.'/../config/nova-echo.php' => config_path('nova-echo.php'),
        ], 'config');
    }
}

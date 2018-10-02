<?php

namespace Vinsofts\Translates;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;

class TranslatesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->publishes([__DIR__.'/vendors' => public_path('vendors'),], 'public');
        $this->publishes([__DIR__.'/build' => public_path('build'),], 'public');
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Vinsofts\Translates\TranslatesController');
        $this->loadViewsFrom(__DIR__.'/views', 'translates');
    }
}

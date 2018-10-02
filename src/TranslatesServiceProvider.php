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
        $vendors = Storage::allDirectories('vendors');
        Storage::move($vendors, 'public/vendors/$directories');
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

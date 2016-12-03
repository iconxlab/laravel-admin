<?php

namespace Iconxlab\LaravelAdmin;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class ServiceProvider
 * @package Iconxlab\LaravelAdmin
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'ixl-laravel-admin');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}

<?php

namespace App\Providers;

/**
 * Importing the Blade class to rename components when using
 */
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Panel Card
        Blade::component('admin.components.panel-card', 'PanelCard');
        // Forms Modal
        Blade::component('admin.components.form-create', 'FormCreate');
        // Button Create Question
        Blade::component('admin.components.btn-create-question', 'ButtonCreateQuestion');
        // Alert
        Blade::component('admin.components.alert', 'Alert');
        // Errors
        Blade::component('admin.components.errors', 'Errors');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

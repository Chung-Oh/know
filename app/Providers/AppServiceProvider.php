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
        // Panel Card - Page Generic
        Blade::component('admin.components.panel-card', 'PanelCard');
        // Alert
        Blade::component('admin.components.alert', 'Alert');
        // Errors
        Blade::component('admin.components.errors', 'Errors');
        // Forms Modal Question
        Blade::component('admin.components.form-question', 'FormQuestion');
        // Button Create Question
        Blade::component('admin.components.btn-create-question', 'ButtonCreateQuestion');
        // Navegation Tab - Page Question
        Blade::component('admin.components.question-navegation-tab', 'QuestionNavegationTab');
        Blade::component('admin.components.question-tab-panel', 'QuestionTabPanel');
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

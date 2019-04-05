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
        Blade::component('admin.components.question.form-create', 'FormCreateQuestion');
        Blade::component('admin.components.question.form-detail', 'FormDetailQuestion');
        // Button Create Question
        Blade::component('admin.components.question.btn-create', 'ButtonCreateQuestion');
        // Navegation Tab - Page Question
        Blade::component('admin.components.question.navegation-tab', 'QuestionNavegationTab');
        Blade::component('admin.components.question.accordion-tab', 'QuestionAccordionTab');
        Blade::component('admin.components.question.accordion', 'QuestionAccordion');
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

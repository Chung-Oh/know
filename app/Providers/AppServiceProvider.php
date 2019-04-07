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
        /*------------------------------------------------------------------------------------
        | GENERIC                                                                            |
        ------------------------------------------------------------------------------------*/
        Blade::component('admin.components.panel-card', 'PanelCard');

        /*------------------------------------------------------------------------------------
        | PAGE QUESTION                                                                      |
        ------------------------------------------------------------------------------------*/
        Blade::component('admin.components.alert', 'Alert');
        Blade::component('admin.components.errors', 'Errors');
        Blade::component('admin.components.question.panel-card', 'QuestionPanelCard');
        Blade::component('admin.components.question.form-create', 'FormCreateQuestion');
        Blade::component('admin.components.question.form-detail', 'FormDetailQuestion');
        Blade::component('admin.components.question.form-delete', 'FormDeleteQuestion');
        Blade::component('admin.components.question.btn-create', 'ButtonCreateQuestion');
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

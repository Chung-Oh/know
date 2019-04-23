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
        /*====================================================================================
        |                               APPLICATION SECTION                                  |
        |===================================================================================*/
        /*------------------------------------------------------------------------------------
        | Generic App                                                                        |
        |-----------------------------------------------------------------------------------*/
        Blade::component('app.components.panel-card', 'PanelCard');

        /*====================================================================================
        |                               ADMINISTRATOR SECTION                                |
        |===================================================================================*/
        /*------------------------------------------------------------------------------------
        | Generic Admin                                                                      |
        |-----------------------------------------------------------------------------------*/
        Blade::component('admin.components.alert', 'Alert');
        Blade::component('admin.components.errors', 'Errors');
        Blade::component('admin.components.btn-create', 'ButtonCreate');
        Blade::component('admin.components.loading', 'Loading');
        Blade::component('admin.components.fill', 'Fill');

        /*------------------------------------------------------------------------------------
        | Page Question                                                                      |
        |-----------------------------------------------------------------------------------*/
        Blade::component('admin.components.question.panel-card', 'PanelCardQuestion');
        Blade::component('admin.components.question.card-ready', 'CardReadyQuestion');
        Blade::component('admin.components.question.form-create', 'FormCreateQuestion');
        Blade::component('admin.components.question.form-detail', 'FormDetailQuestion');
        Blade::component('admin.components.question.form-delete', 'FormDeleteQuestion');
        Blade::component('admin.components.question.navegation-tab', 'NavegationTabQuestion');
        Blade::component('admin.components.question.accordion-tab', 'AccordionTabQuestion');
        Blade::component('admin.components.question.accordion', 'AccordionQuestion');

        /*------------------------------------------------------------------------------------
        | Page Challenge                                                                     |
        |-----------------------------------------------------------------------------------*/
        Blade::component('admin.components.challenge.panel-card', 'PanelCardChallenge');
        Blade::component('admin.components.challenge.form-create', 'FormCreateChallenge');
        Blade::component('admin.components.challenge.form-detail', 'FormDetailChallenge');
        Blade::component('admin.components.challenge.accordion-tab', 'AccordionTabChallenge');
        Blade::component('admin.components.challenge.accordion', 'AccordionChallenge');
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

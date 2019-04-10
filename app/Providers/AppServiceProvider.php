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
        Blade::component('admin.components.btn-create', 'ButtonCreateQuestion');
        Blade::component('admin.components.fill', 'Fill');

        /*------------------------------------------------------------------------------------
        | Page Question                                                                      |
        |-----------------------------------------------------------------------------------*/
        Blade::component('admin.components.question.panel-card', 'QuestionPanelCard');
        Blade::component('admin.components.question.card-ready', 'CardReady');
        Blade::component('admin.components.question.form-create', 'FormCreateQuestion');
        Blade::component('admin.components.question.form-detail', 'FormDetailQuestion');
        Blade::component('admin.components.question.form-delete', 'FormDeleteQuestion');
        Blade::component('admin.components.question.navegation-tab', 'QuestionNavegationTab');
        Blade::component('admin.components.question.accordion-tab', 'QuestionAccordionTab');
        Blade::component('admin.components.question.accordion', 'QuestionAccordion');

        /*------------------------------------------------------------------------------------
        | Page Challenge                                                                     |
        |-----------------------------------------------------------------------------------*/
        Blade::component('admin.components.challenge.panel-card', 'ChallengePanelCard');
        Blade::component('admin.components.challenge.form-create', 'ChallengeCreateChallenge');
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

<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->isAdmin();
    }

    /**
     * Verify if are an administrator, if yes will have access to the pages below.
     *
     * @return void
     */
    public function isAdmin()
    {
        Gate::define('/admin/dashboard', function($user) {
            return $user->profile_id == 2;
        });

        Gate::define('/admin/questions', function($user) {
            return $user->profile_id == 2;
        });

        Gate::define('/admin/challenges', function($user) {
            return $user->profile_id == 2;
        });

        Gate::define('/admin/history', function($user) {
            return $user->profile_id == 2;
        });

        Gate::define('/admin/feedback', function($user) {
            return $user->profile_id == 2;
        });
    }
}

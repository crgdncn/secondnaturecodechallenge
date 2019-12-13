<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin_customers', function ($user) {
            return $user->admin;
        });

        Gate::define('manage-widgets', function ($user) {
            return $user->admin;
        });

        Gate::define('edit-user', function ($user, $customer) {
            return $user->id == $customer->id;
        });
    }
}

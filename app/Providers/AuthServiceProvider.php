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
        Gate::define('list-category', function ($user) {
            //return $user->checkPermissionAccess(config('permission.access.list-category'));
            dd($user);
        });
        Gate::define('add-category', function ($user) {
            return $user->checkPermissionAccess('add_category');
        });
        Gate::define('list-menu', function ($user) {
            return $user->checkPermissionAccess('list_menu');
        });
    }
}

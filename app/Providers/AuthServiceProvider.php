<?php

namespace App\Providers;

use App\Product;
use App\Services\PermissionGateAndPolicyAccess;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Providers\Config;

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
        $setGateAndPolicy = new PermissionGateAndPolicyAccess();
        $setGateAndPolicy->setGateAndPolicyAccess();

        Gate::define('list-menu', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-menu'));
        });
    }


}

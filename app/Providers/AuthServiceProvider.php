<?php

namespace App\Providers;

use App\Product;
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
        $this->gateDefineCategory();

        Gate::define('list-product', function ($user) {
            return $user->checkPermissionAccess('list_product');
        });
        Gate::define('edit-product', function ($user, $id) {
            $product = Product::find($id);
            if($user->checkPermissionAccess('edit_product') && $user->id === $product->user_id){
                return true;
            }
            return false;
        });
        Gate::define('list-menu', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-menu'));
        });
    }
    public function gateDefineCategory()
    {
        Gate::define('list-category', 'App\Policies\CategoryPolicy@view');
        Gate::define('add-category', 'App\Policies\CategoryPolicy@create');
        Gate::define('edit-category', 'App\Policies\CategoryPolicy@update');
        Gate::define('delete-category', 'App\Policies\CategoryPolicy@delete');
    }
}

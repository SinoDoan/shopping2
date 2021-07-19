<?php
 namespace App\Services;

 use Illuminate\Support\Facades\Gate;

 class PermissionGateAndPolicyAccess
 {
     public function setGateAndPolicyAccess()
     {
         $this->gateDefineCategory();
         $this->gateDefineProduct();
     }

     public function gateDefineCategory()
    {
        Gate::define('list-category', 'App\Policies\CategoryPolicy@view');
        Gate::define('add-category', 'App\Policies\CategoryPolicy@create');
        Gate::define('edit-category', 'App\Policies\CategoryPolicy@update');
        Gate::define('delete-category', 'App\Policies\CategoryPolicy@delete');
    }
     public function gateDefineProduct()
     {
         Gate::define('list-product', 'App\Policies\ProductPolicy@view');
         Gate::define('add-product', 'App\Policies\ProductPolicy@create');
         Gate::define('edit-product', 'App\Policies\ProductPolicy@update');
         Gate::define('delete-product', 'App\Policies\ProductPolicy@delete');
     }
 }

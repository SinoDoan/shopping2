<?php

namespace App\Providers;

use App\Category;
use App\Components\Recusive;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $recusive = new Recusive(Category::all());
        $htmlOptionSearchHeader = $recusive->CategoryRecursive($parentId = '');
        View::share('htmlOptionSearchHeader', $htmlOptionSearchHeader);
        Schema::defaultStringLength(191);
    }
}

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create some/sliderthing great!
|
*/

Route::get('/home', function () {
    return view('home');
});
//Route::get('/admin', 'AdminController@LoginAdmin');
//Route::post('/admin', 'AdminController@PostLoginAdmin');

Route::prefix('admin')->group(function () {
    Route::get('/', [
       'as' => 'admin.login',
       'uses' => 'AdminController@LoginAdmin'
    ]);
    Route::post('/', [
        'as' => 'admin.post-login',
        'uses' => 'AdminController@PostLoginAdmin'
    ]);
    Route::get('/logout', [
        'as' => 'admin.logout',
        'uses' => 'AdminController@logout'
    ]);
    Route::middleware([checklogin::class])->group(function () {
        //category
        Route::prefix('categories')->group(function (){
            Route::get('/', [
                'as' => 'categories.index',
                'uses' => 'CategoryController@index',
                'middleware'=> 'can:list-category',
            ]);
            Route::get('/create', [
                'as' => 'categories.create',
                'uses' => 'CategoryController@create',
                'middleware'=> 'can:add-category'
            ]);
            Route::post('/store', [
                'as' => 'categories.store',
                'uses' => 'CategoryController@store'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'categories.edit',
                'uses' => 'CategoryController@edit',
                'middleware'=> 'can:edit-category'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'categories.delete',
                'uses' => 'CategoryController@delete',
                'middleware'=> 'can:add-category'
            ]);
            Route::post('/update/{id}', [
                'as' => 'categories.update',
                'uses' => 'CategoryController@update'
            ]);
        });
        //menus
        Route::prefix('menus')->group(function () {
            Route::get('/', [
                'as' => 'menus.index',
                'uses' => 'MenuController@index',
                'middleware'=> 'can:list-menu'
            ]);
            Route::get('/create', [
                'as' => 'menus.create',
                'uses' => 'MenuController@create'
            ]);
            Route::post('/store', [
                'as' => 'menus.store',
                'uses' => 'MenuController@store'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'menus.edit',
                'uses' => 'MenuController@edit'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'menus.delete',
                'uses' => 'MenuController@delete'
            ]);
            Route::post('/update/{id}', [
                'as' => 'menus.update',
                'uses' => 'MenuController@update'
            ]);

        });
        //products
        Route::prefix('product')->group(function () {
            Route::get('/', [
                'as' => 'product.index',
                'uses' => 'AdminProductController@index',
                'middleware'=> 'can:list-product'
            ]);
            Route::get('/create', [
                'as' => 'product.create',
                'uses' => 'AdminProductController@create',
                'middleware'=> 'can:add-product'
            ]);
            Route::get('/search', [
                'as' => 'product.search',
                'uses' => 'AdminProductController@search'
            ]);
            Route::post('/store', [
                'as' => 'product.store',
                'uses' => 'AdminProductController@store'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'product.edit',
                'uses' => 'AdminProductController@edit',
                'middleware'=> 'can:edit-product,id'
            ]);
            Route::post('/update/{id}', [
                'as' => 'product.update',
                'uses' => 'AdminProductController@update'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'product.delete',
                'uses' => 'AdminProductController@delete',
                'middleware'=> 'can:delete-product'
            ]);
        });
        //slider
        Route::prefix('slider')->group(function () {
            Route::get('/', [
                'as' => 'slider.index',
                'uses' => 'SliderAdminController@index'
            ]);
            Route::get('/create', [
                'as' => 'slider.create',
                'uses' => 'SliderAdminController@create'
            ]);
            Route::post('/store', [
                'as' => 'slider.store',
                'uses' => 'SliderAdminController@store'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'slider.edit',
                'uses' => 'SliderAdminController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'slider.update',
                'uses' => 'SliderAdminController@update'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'slider.delete',
                'uses' => 'SliderAdminController@delete'
            ]);
        });
        //setting
        Route::prefix('setting')->group(function () {
            Route::get('/', [
                'as' => 'setting.index',
                'uses' => 'AdminSettingController@index'
            ]);
            Route::get('/create', [
                'as' => 'setting.create',
                'uses' => 'AdminSettingController@create'
            ]);
            Route::post('/store', [
                'as' => 'setting.store',
                'uses' => 'AdminSettingController@store'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'setting.edit',
                'uses' => 'AdminSettingController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'setting.update',
                'uses' => 'AdminSettingController@update'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'setting.delete',
                'uses' => 'AdminSettingController@delete'
            ]);
        });
        //user controller
        Route::prefix('user')->group(function () {
            Route::get('/', [
                'as' => 'user.index',
                'uses' => 'AdminUserController@index'
            ]);
            Route::get('/create', [
                'as' => 'user.create',
                'uses' => 'AdminUserController@create'
            ]);
            Route::post('/store', [
                'as' => 'user.store',
                'uses' => 'AdminUserController@store'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'user.edit',
                'uses' => 'AdminUserController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'user.update',
                'uses' => 'AdminUserController@update'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'user.delete',
                'uses' => 'AdminUserController@delete'
            ]);
        });
        //role controller
        Route::prefix('role')->group(function () {
            Route::get('/', [
                'as' => 'role.index',
                'uses' => 'AdminRoleController@index'
            ]);
            Route::get('/create', [
                'as' => 'role.create',
                'uses' => 'AdminRoleController@create'
            ]);
            Route::post('/store', [
                'as' => 'role.store',
                'uses' => 'AdminRoleController@store'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'role.edit',
                'uses' => 'AdminRoleController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'role.update',
                'uses' => 'AdminRoleController@update'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'role.delete',
                'uses' => 'AdminRoleController@delete'
            ]);

        });
    });

    Route::prefix('permissions')->group(function () {
        Route::get('/create', [
            'as' => 'permission.create',
            'uses' => 'AdminPermissionController@create'
        ]);
        Route::post('/store', [
            'as' => 'permission.store',
            'uses' => 'AdminPermissionController@store'
        ]);
    });
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

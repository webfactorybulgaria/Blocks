<?php

namespace TypiCMS\Modules\Blocks\Providers;

use Illuminate\Support\Facades\Route;
use TypiCMS\Modules\Core\Shells\Providers\BaseRouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'TypiCMS\Modules\Blocks\Shells\Http\Controllers';

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        Route::group(['namespace' => $this->namespace], function () {
            /*
             * Admin routes
             */
            Route::get('admin/blocks', 'AdminController@index')->name('admin::index-blocks');
            Route::get('admin/blocks/create', 'AdminController@create')->name('admin::create-block');
            Route::get('admin/blocks/{block}/edit', 'AdminController@edit')->name('admin::edit-block');
            Route::post('admin/blocks', 'AdminController@store')->name('admin::store-block');
            Route::put('admin/blocks/{block}', 'AdminController@update')->name('admin::update-block');

            /*
             * API routes
             */
            Route::get('api/blocks', 'ApiController@index')->name('api::index-blocks');
            Route::put('api/blocks/{block}', 'ApiController@update')->name('api::update-block');
            Route::delete('api/blocks/{block}', 'ApiController@destroy')->name('api::destroy-block');
        });
    }
}

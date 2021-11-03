<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::group([ 'middleware' => 'auth:admin', 'prefix' => 'admin'], function () {

        Route::get('/', function () {
            return view('dashboard.index');
        })->name('admin.dashboard');
    });


    Route::get('admin/login', 'App\Http\Controllers\Dashboard\LoginController@login')
    ->name('admin.login');

    Route::post('admin/login', 'App\Http\Controllers\Dashboard\LoginController@postLogin')
    ->name('admin.post.login');
    //     ->name('admin.post.login');
    // Route::group(['prefix' => 'admin'], function () {
    //     Route::get('admin/login', 'App\Http\Controllers\Dashboard\LoginController@login')
    //     ->name('admin.login');

    //     Route::get('/login', 'App\Http\Controllers\Dashboard\LoginController@postLogin')
    //     ->name('admin.post.login');

    // });

});

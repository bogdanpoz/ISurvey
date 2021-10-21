<?php

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

Route::middleware(['auth', 'role:administrator'])
    ->prefix('admin/extensions/sharethis')
    ->as('admin.sharethis.')
    ->group(function () {
        Route::get('/', 'ShareThisController@index')->name('index');
        Route::post('/', 'ShareThisController@store')->name('store');
    });

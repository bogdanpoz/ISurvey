<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware, group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// Company
Route::middleware(['auth', 'role:company', 'setlocale'])
    ->prefix('app')
    ->namespace('Company')
    ->name('company.')
    ->group(function () {
        Route::middleware(['subscription.check'])->group((function () {
            Route::resource('surveys', 'SurveyController')->except('show', 'create');
            Route::get('surveys/{survey}/design', 'DesignController@edit')->name('surveys.design.edit');
            Route::put('surveys/{survey}/design', 'DesignController@update')->name('surveys.design.update');
            Route::get('surveys/{survey}/share', 'ShareController@show')->name('surveys.share.show');
            Route::Post('surveys/{survey}/share', 'ShareController@store')->name('surveys.share.store');
            
            Route::get('surveys/{survey}/result', 'ResultController@index')->name('surveys.result.index');
            Route::get('surveys/{survey}/export', 'ExportController@export')->name('surveys.export');

            Route::resource('surveys.questions', 'QuestionController')->shallow();

            
            Route::get('surveys/templates', 'TemplateController@index')->name('surveys.templates.index');
            Route::post('surveys/{survey}/duplicate', 'SurveyController@duplicate')->name('surveys.duplicate');
            
            Route::get('surveys/{survey}/settings', 'SettingsController@index')->name('surveys.settings.index');
        }));

        Route::get('profile', 'AccountController@index')->name('account.edit');
        Route::put('profile', 'AccountController@update')->name('account.update');

        Route::get('billing/plans', 'BillingController@plans')->name('billing.plans');
        Route::get('billing', 'BillingController@index')->name('billing.index');
        Route::put('billing/cancel', 'BillingController@cancel')->name('billing.cancel');

        Route::get('payment', 'PaymentController@show')->name('payment.show');
        Route::post('payment', 'PaymentController@store')->name('payment.store');

        Route::get('notifications', 'NotificationController@index')->name('notifications.index');
        Route::get('notifications/mark-as-read', 'NotificationController@markAsRead')->name('notifications.read');
        Route::get('notifications/mark-all-read', 'NotificationController@markAllAsRead')->name('notifications.all.read');
        Route::get('notifications/view', 'NotificationController@show')->name('notifications.show');
    });

// Public
Route::middleware(['samesitenull'])
    ->namespace('Front')
    ->name('front.')
    ->group(function () {
        Route::get('s/{survey}', 'SurveyController@show')->name('survey.show');
        Route::get('s/{survey}/start', 'SurveyController@start')->name('survey.start');
        Route::post('s/{survey}', 'SurveyController@submit')->name('survey.submit');
        Route::get('s/{survey}/finish', 'SurveyController@finish')->name('survey.finish');
        Route::get('s/{survey}/password', 'SurveyController@password')->name('survey.password');
        Route::post('s/{survey}/password', 'SurveyController@submitPassword')->name('survey.password.submit');
    });

//Admin
Route::middleware(['auth', 'role:administrator', 'setlocale', 'demo.prevent.update'])
    ->prefix('admin')
    ->namespace('Admin')
    ->as('admin.')
    ->group(function () {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource('users', 'UserController')->except('create', 'store', 'show');
        Route::resource('language', 'LanguageController');
        Route::resource('surveys', 'SurveyController')->except('create', 'store', 'show');
        Route::resource('plans', 'PlanController')->except('show');
        Route::resource('extensions', 'ExtensionController')->only('index', 'create', 'store');
        Route::post('extensions/updateLicense', 'ExtensionController@updateLicense')->name('extensions.updateLicense');
        Route::post('extensions/download', 'ExtensionController@download')->name('extensions.download');
        Route::get('settings', 'SettingsController@index')->name('settings.index');
        Route::get('settings/{section}', 'SettingsController@edit')->name('settings.edit');
        Route::post('settings/{section}', 'SettingsController@update')->name('settings.update');
        Route::get('commands', 'ArtisanCommandsController@index')->name('commands.index');
        Route::post('commands', 'ArtisanCommandsController@execute')->name('commands.execute');
        Route::get('profile', 'ProfileController@edit')->name('profile.edit');
        Route::put('profile', 'ProfileController@update')->name('profile.update');
        Route::resource('subscriptions', 'SubscriptionController')->except('show', 'destroy');
        Route::resource('transactions', 'TransactionController')->except('create', 'store', 'show', 'destroy');
        Route::get('notifications', 'NotificationController@create')->name('notification.create');
        Route::post('notifications', 'NotificationController@store')->name('notification.store');
    });

// Application Installer
Route::group([
    'middleware' => ['can.install'],
], function () {
    Route::get('install', 'InstallApplicationController@welcome')->name('install.welcome');
    Route::get('install/permissions', 'InstallApplicationController@permissions')->name('install.permissions');
    Route::get('install/requirements', 'InstallApplicationController@requirements')->name('install.requirements');
    Route::get('install/environment', 'InstallApplicationController@environment')->name('install.environment.create');
    Route::post('install/environment', 'InstallApplicationController@storeEnvironment')->name('install.environment.store');
    Route::get('install/configure', 'InstallApplicationController@configure')->name('install.configure');
});

Route::get('install/finished', 'InstallApplicationController@finished')->name('install.finished');

Route::get('scheduler', 'CronScheduleController');

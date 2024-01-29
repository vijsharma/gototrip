<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
Route::get('/intro','LandingpageController@index');
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/install/check-db', 'HomeController@checkConnectDatabase');

// Social Login
Route::get('social-login/{provider}', 'Auth\LoginController@socialLogin');
Route::get('social-callback/{provider}', 'Auth\LoginController@socialCallBack');

// Logs
Route::get(config('admin.admin_route_prefix').'/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware(['auth', 'dashboard','system_log_view'])->name('admin.logs');

Route::get('/install','InstallerController@redirectToRequirement')->name('LaravelInstaller::welcome');
Route::get('/install/environment','InstallerController@redirectToWizard')->name('LaravelInstaller::environment');
Route::get('/migrate', function() {
    Artisan::call('migrate', [
        '--force' => true,
    ]);
    return "migrate.............!";
});

Route::get('/info', function() {
    phpinfo();
    exit;
});

//Cache
Route::get('/clear-cache', function() {
    Artisan::call('optimize:clear');
    return "Cleared!";
});

// Route::get('testxx',function(){
//     $user = \App\User::whereEmail('rameshdeveloper21@gmail.com')->first();
//     auth()->login($user);
//     return redirect('/');
// });

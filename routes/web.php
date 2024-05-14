<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/about', function () {
    return view('about');
});

/**
 * Auth Routes
 */
Route::get('/fogetPassword', [ForgotPasswordController::class, 'ResetPassword'])->middleware('guest')->name('password.request');
Route::get('/login', [LoginController::class, 'getloginpage'])->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/chef_departement/dashboard', [LoginController::class, 'logout'])->name('logout');

// Auth::routes(['verify' => false]);

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::middleware('auth')->group(function () {
        /**
         * Home Routes
         */
        Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
        /**
         * Role Routes
         */
        Route::resource('roles', App\Http\Controllers\RolesController::class);
        /**
         * Permission Routes
         */
        Route::resource('permissions', App\Http\Controllers\PermissionsController::class);
        /**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });
    });
});


Route::group(['prefix' => 'chef_departement/modules'], function () {
    Route::get('/', [App\Http\Controllers\chef_departemeneController::class, 'index'])->name('chef_departemenet.mudules.index');
    // Route::get('/create', 'UsersController@create')->name('users.create');
    // Route::post('/create', 'UsersController@store')->name('users.store');
    // Route::get('/{user}/show', 'UsersController@show')->name('users.show');
    // Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
    // Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
    // Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
});

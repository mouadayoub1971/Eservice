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
Route::get('/', function () {
    return redirect('/login');
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
         * chef_departement
         */
        Route::group(['prefix' => 'chef_departement/filiers'], function () {
            Route::get('/', [App\Http\Controllers\chef_departemeneController::class, 'index_filier'])->name('chef_departement.filiers.index');
            Route::get('/modules/{id}', [App\Http\Controllers\chef_departemeneController::class, 'show_modules'])->name('chef_departement.filiers.modules');

            Route::group(['prefix' => 'module'], function () {
                Route::get('/create/{filier_id}', [App\Http\Controllers\chef_departemeneController::class, 'create_module'])->name('chef_departement.module.create');
                Route::post('/create/{filier_id}', [App\Http\Controllers\chef_departemeneController::class, 'store_module'])->name('chef_departement.module.store');
                Route::delete('/delete/{filier_id}{module_id}{prof_id?}', [App\Http\Controllers\chef_departemeneController::class, 'delete_module'])->name('chef_departement.filiers.module.delete');
            });
        });


        /**
         * khchi routes dyalek hna  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
         */









         /**
         * cordinateur_filier
         */

        Route::group(['prefix' => 'cordinateur_filier/modules'], function () {
            Route::get('/', [App\Http\Controllers\Cordinateur_filierController::class, 'index_module'])->name('cordinateur_filier.Module.index');
            Route::post('/', [App\Http\Controllers\Cordinateur_filierController::class, 'index_module'])->name('cordinateur_filier.Module.index');
            Route::post('/save', [App\Http\Controllers\Cordinateur_filierController::class, 'save_module'])->name('cordinateur_filier.Module.save');

           /*Route::get('/modules/{id}', [App\Http\Controllers\chef_departemeneController::class, 'show_modules'])->name('chef_departement.filiers.modules');

            Route::group(['prefix' => 'module'], function () {
                Route::get('/create/{filier_id}', [App\Http\Controllers\chef_departemeneController::class, 'create_module'])->name('chef_departement.module.create');
                Route::post('/create/{filier_id}', [App\Http\Controllers\chef_departemeneController::class, 'store_module'])->name('chef_departement.module.store');
                Route::delete('/delete/{filier_id}{module_id}{prof_id}', [App\Http\Controllers\chef_departemeneController::class, 'delete_module'])->name('chef_departement.filiers.module.delete');
            });*/
        });





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



// profs route
Route::group(['prefix' => 'chef_departement/profs'], function () {
    Route::get('/', [App\Http\Controllers\chef_departemeneController::class, 'ProfIndex'])->name('chef_departemenet.profs.index');
    Route::post('/', [App\Http\Controllers\chef_departemeneController::class, 'profStore'])->name('chef_departemenet.profs.store');
    Route::delete('/{prof}', [App\Http\Controllers\chef_departemeneController::class, 'profDestroy'])->name('chef_departemenet.profs.destroy');
    // Route::get('/create', 'UsersController@create')->name('users.create');
    // Route::post('/create', 'UsersController@store')->name('users.store');
    // Route::get('/{user}/show', 'UsersController@show')->name('users.show');
    // Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
    // Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
    // Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
});

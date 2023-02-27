<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuItemsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedController;
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

Route::get('/', function () {
    return view('login.login');
})->name('login')->middleware('guest');
Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::post('post-login', [App\Http\Controllers\AuthController::class, 'postLogin'])->name('login.post');

Route::middleware(['auth'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
        Route::post('dashboard', 'index')->name('dashboard');
    });
    Route::controller(MenuItemsController::class)->as('menu')->group(function () {
        Route::get('menu', 'index');
        Route::post('menu-store', 'store')->name('-store');
        Route::get('menu-delete/{id}', 'destroy')->name('-delete');
        Route::post('menu-update', 'update')->name('-update');
        Route::get('menu-status-change/{id}', 'update')->name('-status-change');
        // Route::get('menu-add-previledges/{id}', 'add_previledges')->name('-add-previledges');
    });

    Route::controller(RoleController::class)->as('role')->group(function () {
        Route::get('role', 'index');
        Route::post('role-store', 'store')->name('-store');
        Route::get('role-edit/{id}', 'edit')->name('-edit');
        Route::get('role-delete/{id}', 'destroy')->name('-delete');
        Route::post('role-update', 'update')->name('-update');
        // Route::get('menu-status-change/{id}', 'update')->name('-status-change');
        // Route::get('menu-add-previledges/{id}', 'add_previledges')->name('-add-previledges');
    });

    Route::controller(OrganizationController::class)->as('organization')->group(function () {
        Route::get('organization', 'index');
        Route::post('organization-store', 'store')->name('-store');
        Route::get('organization-edit/{id}', 'edit')->name('-edit');
        Route::get('organization-delete/{id}', 'destroy')->name('-delete');
        Route::post('organization-update', 'update')->name('-update');
        // Route::get('menu-status-change/{id}', 'update')->name('-status-change');
        // Route::get('menu-add-previledges/{id}', 'add_previledges')->name('-add-previledges');
    });

    Route::controller(UserController::class)->as('user')->group(function () {
        Route::get('user', 'index');
        Route::post('user-store', 'store')->name('-store');
        Route::get('user-edit/{id}', 'edit')->name('-edit');
        Route::get('user-delete/{id}', 'destroy')->name('-delete');
        Route::post('user-update', 'update')->name('-update');
        // Route::get('menu-status-change/{id}', 'update')->name('-status-change');
        // Route::get('menu-add-previledges/{id}', 'add_previledges')->name('-add-previledges');
    });

    Route::controller(FeedController::class)->as('feed')->group(function () {
        Route::get('feed', 'index');
        Route::post('feed-store', 'store')->name('-store');
        Route::get('feed-edit/{id}', 'edit')->name('-edit');
        Route::get('feed-delete/{id}', 'destroy')->name('-delete');
        Route::post('feed-update', 'update')->name('-update');
        // Route::get('menu-status-change/{id}', 'update')->name('-status-change');
        // Route::get('menu-add-previledges/{id}', 'add_previledges')->name('-add-previledges');
    });
});
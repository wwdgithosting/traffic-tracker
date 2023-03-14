<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuItemsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PartnerController;
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
Route::get('forgot-password', [App\Http\Controllers\AuthController::class, 'forgotpassword'])->name('forgot.password');
Route::post('forget-password', [App\Http\Controllers\AuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [App\Http\Controllers\AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset.password.post', [App\Http\Controllers\AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');
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
        Route::post('user-update', 'update_profile')->name('-update');
        Route::get('user-status-change/{id}', 'change_status')->name('-status-change');
        // Route::get('menu-add-previledges/{id}', 'add_previledges')->name('-add-previledges');
    });

    Route::controller(FeedController::class)->as('feed')->group(function () {
        Route::get('feed', 'index');
        Route::post('feed-store', 'store')->name('-store');
        Route::get('feed-edit/{id}', 'edit')->name('-edit');
        Route::get('feed-delete/{id}', 'destroy')->name('-delete');
        Route::post('feed-update', 'update')->name('-update');
        Route::post('feed-import', 'importFeedLog')->name('-import');
        Route::get('get-partners/{id}', 'get_partners')->name('-partners');
        // Route::get('menu-status-change/{id}', 'update')->name('-status-change');
        // Route::get('menu-add-previledges/{id}', 'add_previledges')->name('-add-previledges');
        Route::get('log', 'feedLogList');
        Route::post('log', 'feedLogList')->name('-log');
    });

    Route::controller(PartnerController::class)->as('partner')->group(function () {
        Route::get('partner', 'index');
        Route::post('partner-store', 'store')->name('-store');
        Route::get('partner-edit/{id}', 'edit')->name('-edit');
        Route::get('partner-delete/{id}', 'destroy')->name('-delete');
        Route::post('partner-update', 'update')->name('-update');
        Route::get('partner-status-change/{id}', 'change_status')->name('-status-change');
        // Route::get('menu-add-previledges/{id}', 'add_previledges')->name('-add-previledges');
    });
});

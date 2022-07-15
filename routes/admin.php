<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;

Route::group(['prefix' => 'admin'], function () {
    Config::set('auth.defines', 'admin');


    Route::get('login', [AdminAuth::class, 'login'])->name('admin.login');
    Route::post('login', [AdminAuth::class, 'loginCheck'])->name('admin.loginCheck');
    Route::get('forgot/password', [AdminAuth::class, 'forgotPassword']);
    Route::post('forgot/password', [AdminAuth::class, 'forgotPasswordMessage']);
    Route::get('reset/password/{token}', [AdminAuth::class, 'resetPassword']);
    Route::post('reset/password/{token}', [AdminAuth::class, 'resetPasswordUpdateData']);

    /*===============================================================================================================*/
    Route::middleware(['admin:admin'])->group(function () {

        Route::get('logout', [AdminAuth::class, 'logout'])->name('admin.logout');
        Route::post('edit-profile/{admin}', [AdminAuth::class, 'edit_profile'])->name('admins.edit-profile');

        Route::get('dashboard', function () {
            return view('admin.dashboard.dashboard');
        })->name('admin.dashboard');

        Route::resource('/admins', AdminController::class)->except(['create', 'update']);
        Route::post('/admins/{admin}/update', [AdminController::class, 'update'])->name('admins.update');
        Route::delete('/admins/destroy/all', [AdminController::class, 'destroyAll'])->name('admins.destroyAll');
    });

});


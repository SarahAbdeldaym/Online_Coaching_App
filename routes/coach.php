<?php

use App\Http\Controllers\API\CoachScheduleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Coach\CoachAuth;
use App\Http\Controllers\Coach\CoachController;


Route::prefix('coach')->group(function () {

    Config::set('auth.defines', 'coach');

    Route::get('register', [CoachAuth::class, 'register'])->name('coach.register');
    Route::post('register', [CoachAuth::class, 'registerCheck'])->name('coach.registerCheck');
    Route::get('login', [CoachAuth::class, 'login'])->name('coach.login');
    Route::post('login', [CoachAuth::class, 'loginCheck'])->name('coach.loginCheck');
    Route::get('forgot/password', [CoachAuth::class, 'forgotPassword']);
    Route::post('forgot/password', [CoachAuth::class, 'forgotPasswordMessage']);
    Route::get('reset/password/{token}', [CoachAuth::class, 'resetPassword']);
    Route::post('reset/password/{token}', [CoachAuth::class, 'resetPasswordUpdateData']);

    /*-----------------------------------------------------------------------------------------------------------------------*/
    Route::middleware(['coach:coach'])->group(function () {
        Route::get('profile', [CoachController::class, 'show'])->name('coach.profile');
        Route::get('profile/edit', [CoachController::class, 'edit'])->name('coach.editInfo');
        Route::put('profile/update/{coach}', [CoachController::class, 'update'])->name('coach.updateInfo');

    /*-----------------------------------------------------------------------------------------------------------------------*/
        Route::resource('/schedule', CoachScheduleController::class)->except(['create', 'update', 'show', 'edit', 'destroy']);
        Route::get('/schedule/{id}', [CoachScheduleController::class, 'show'])->name('schedule.show');
        Route::get('/schedule/{id}/edit', [CoachScheduleController::class, 'edit'])->name('schedule.edit');
        Route::delete('/schedule/delete/{id}', [CoachScheduleController::class, 'destroy'])->name('schedule.destroy');

    });
});

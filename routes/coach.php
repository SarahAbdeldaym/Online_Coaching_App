<?php

use App\Http\Controllers\Coach\CoachScheduleController;
use App\Http\Controllers\Coach\CoachAppointmentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Coach\CoachAuth;
use App\Http\Controllers\Coach\CoachController;
use App\Http\Controllers\Coach\SocialiteController;

Route::prefix('coach')->group(function () {

    Config::set('auth.defines', 'coach');

    //=======================================Coach Routes=====================================//
    Route::get('register', [CoachAuth::class, 'register'])->name('coach.register');
    Route::post('register', [CoachAuth::class, 'registerCheck'])->name('coach.registerCheck');
    Route::get('login', [CoachAuth::class, 'login'])->name('coach.login');
    Route::post('login', [CoachAuth::class, 'loginCheck'])->name('coach.loginCheck');
    Route::get('forgot/password', [CoachAuth::class, 'forgotPassword']);
    Route::post('forgot/password', [CoachAuth::class, 'forgotPasswordMessage']);
    Route::get('reset/password/{token}', [CoachAuth::class, 'resetPassword']);
    Route::post('reset/password/{token}', [CoachAuth::class, 'resetPasswordUpdateData']);
    //=========================================================================================//

    Route::middleware(['coach:coach'])->group(function () {

        //=======================================Coach Profile Routes=======================================//
        Route::get('profile', [CoachController::class, 'show'])->name('coach.profile');
        Route::get('profile/edit', [CoachController::class, 'edit'])->name('coach.editInfo');
        Route::put('profile/update/{coach}', [CoachController::class, 'update'])->name('coach.updateInfo');
        //===================================================================================================//

        //================================================coach-appointment crud routes=============================================//
        Route::get('/appointments', [CoachAppointmentController::class, 'index'])->name('coach.appointments');
        Route::get('/appointments/{book_id}', [CoachAppointmentController::class, 'show']);
        Route::post('/appointments/confirm/{book_id}', [CoachAppointmentController::class, 'confirm'])->name('coach.appointments.confirm');
        Route::delete('/appointments/destroy/all', [CoachAppointmentController::class, 'destroyAll'])->name('appointments.destroyAll');
        //==========================================================================================================================//

        //=================================================Coach Schedule Routes===============================================//
        Route::resource('/schedule', CoachScheduleController::class)->except(['create', 'update', 'show', 'edit', 'destroy']);
        Route::get('/schedule/{id}', [CoachScheduleController::class, 'show'])->name('schedule.show');
        Route::get('/schedule/{id}/edit', [CoachScheduleController::class, 'edit'])->name('schedule.edit');
        Route::post('/schedule/{id}/update', [CoachScheduleController::class, 'update'])->name('schedule.update');
        Route::delete('/schedule/delete/{id}', [CoachScheduleController::class, 'destroy'])->name('schedule.destroy');
        Route::delete('/schedule/destroy/all', [CoachScheduleController::class, 'destroyAll'])->name('schedule.destroyAll');
        //================================================================================================================//

        Route::get('/dashboard', function () {
            return view('coach.dashboard');
        })->name('coach.dashboard');
        Route::get('logout', [CoachAuth::class, 'logout'])->name('coach.logout');

        Route::get('/auth/google/redirect', [SocialiteController::class, 'redirect_to_google'])->name('coach.google_redirect');
        Route::get('/auth/google/callback', [SocialiteController::class, 'callback_from_google']);
    });
});

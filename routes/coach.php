<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Coach\CoachAuth;


Route::prefix('coach')->group(function () {

    Config::set('auth.defines', 'coach');

    Route::get('register', [CoachAuth::class, 'register'])->name('coach.register');
    Route::post('register', [CoachAuth::class, 'registerCheck'])->name('coach.registerCheck');
    Route::get('login', [CoachAuth::class, 'login'])->name('coach.login');
    Route::post('login', [CoachAuth::class, 'loginCheck'])->name('coach.loginCheck');

});

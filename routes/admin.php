<?php

use App\Http\Controllers\Admin\SpecialistController;
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


        Route::resource('/specialists', SpecialistController::class)->except(['create', 'update']);
        Route::post('/specialists/{specialist}/update', [SpecialistController::class, 'update'])->name('specialists.update');
        Route::delete('/specialists/destroy/all', [SpecialistController::class, 'destroyAll'])->name('specialists.destroyAll');

        Route::resource('/countries', CountryController::class)->except(['create', 'update']);
        Route::post('/countries/{country}/update', [CountryController::class, 'update'])->name('countries.update');
        Route::delete('/countries/destroy/all', [CountryController::class, 'destroyAll'])->name('countries.destroyAll');

        Route::resource('/cities', CityController::class)->except(['create', 'update']);
        Route::post('/cities/{city}/update', [CityController::class, 'update'])->name('cities.update');
        Route::delete('/cities/destroy/all', [CityController::class, 'destroyAll'])->name('cities.destroyAll');

        Route::resource('/districts', DistrictController::class)->except(['create', 'update']);
        Route::post('/districts/{district}/update', [DistrictController::class, 'update'])->name('districts.update');
        Route::delete('/districts/destroy/all', [DistrictController::class, 'destroyAll'])->name('districts.destroyAll');

        Route::resource('/coaches_schedule', CoachScheduleController::class)->except(['create', 'update']);
        Route::post('/coaches_schedule/{coach_schedule}/update', [CoachScheduleController::class, 'update'])->name('coaches_schedule.update');
        Route::delete('/coaches_schedule/destroy/all', [CoachScheduleController::class, 'destroyAll'])->name('coaches_schedule.destroyAll');

        Route::resource('/books', BookController::class)->except(['create', 'update']);
        Route::post('/books/{book}/update', [BookController::class, 'update'])->name('books.update');
        Route::delete('/books/destroy/all', [BookController::class, 'destroyAll'])->name('books.destroyAll');


    });

});


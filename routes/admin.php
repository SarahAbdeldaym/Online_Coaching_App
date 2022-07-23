<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminAuth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SpecialistController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\DegreeController;
use App\Http\Controllers\Admin\CoachController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\CoachScheduleController;
use App\Http\Controllers\Admin\StatisticsController;

Route::group(['prefix' => 'admin'], function () {
    Config::set('auth.defines', 'admin');

    //======================================Auth Routes=================================//
    Route::get('login', [AdminAuth::class, 'login'])->name('admin.login');
    Route::post('login', [AdminAuth::class, 'loginCheck'])->name('admin.loginCheck');
    Route::get('forgot/password', [AdminAuth::class, 'forgotPassword']);
    Route::post('forgot/password', [AdminAuth::class, 'forgotPasswordMessage']);
    Route::get('reset/password/{token}', [AdminAuth::class, 'resetPassword']);
    Route::post('reset/password/{token}', [AdminAuth::class, 'resetPasswordUpdateData']);
    //==================================================================================//

    Route::middleware(['admin:admin'])->group(function () {

        //============================================Admins crud routes=======================================//
        Route::resource('/admins', AdminController::class)->except(['create', 'update']);
        Route::post('/admins/{admin}/update', [AdminController::class, 'update'])->name('admins.update');
        Route::delete('/admins/destroy/all', [AdminController::class, 'destroyAll'])->name('admins.destroyAll');
        //=====================================================================================================//

        //===========================================Specialists Crud Routes==================================================//
        Route::resource('/specialists', SpecialistController::class)->except(['create', 'update']);
        Route::post('/specialists/{specialist}/update', [SpecialistController::class, 'update'])->name('specialists.update');
        Route::delete('/specialists/destroy/all', [SpecialistController::class, 'destroyAll'])->name('specialists.destroyAll');
        //====================================================================================================================//

        //================================================Countries Routes================================================//
        Route::resource('/countries', CountryController::class)->except(['create', 'update']);
        Route::post('/countries/{country}/update', [CountryController::class, 'update'])->name('countries.update');
        Route::delete('/countries/destroy/all', [CountryController::class, 'destroyAll'])->name('countries.destroyAll');

        //================================================================================================================//

        //====================================================Cities Routes===============================================//
        Route::resource('/cities', CityController::class)->except(['create', 'update']);
        Route::post('/cities/{city}/update', [CityController::class, 'update'])->name('cities.update');
        Route::delete('/cities/destroy/all', [CityController::class, 'destroyAll'])->name('cities.destroyAll');
        //================================================================================================================//


        //================================================================================================================//

        //=================================================Districts Routes===============================================//
        Route::resource('/districts', DistrictController::class)->except(['create', 'update']);
        Route::post('/districts/{district}/update', [DistrictController::class, 'update'])->name('districts.update');
        Route::delete('/districts/destroy/all', [DistrictController::class, 'destroyAll'])->name('districts.destroyAll');
        //================================================================================================================//

        //=================================================Coach Time Routes===============================================//
        Route::resource('/coaches_schedule', CoachScheduleController::class)->except(['create', 'update']);
        Route::post('/coaches_schedule/{coach_schedule}/update', [CoachScheduleController::class, 'update'])->name('coaches_schedule.update');
        Route::delete('/coaches_schedule/destroy/all', [CoachScheduleController::class, 'destroyAll'])->name('coaches_schedule.destroyAll');
        //================================================================================================================//

        //=================================================Book Routes===============================================//
        Route::resource('/books', BookController::class)->except(['create', 'update']);
        Route::post('/books/{book}/update', [BookController::class, 'update'])->name('books.update');
        Route::delete('/books/destroy/all', [BookController::class, 'destroyAll'])->name('books.destroyAll');
        //================================================================================================================//

        //=================================================Settings Routes===============================================//
        Route::get('settings', [SettingController::class, 'setting']);
        Route::post('settings', [SettingController::class, 'settingSave']);
        //================================================================================================================//

        //================================================Clients crud routes=================================================//
        Route::resource('clients', ClientController::class)->except(['create', 'update']);
        Route::post('/clients/{client}/update', [ClientController::class, 'update'])->name('clients.update');
        Route::delete('/clients/destroy/all', [ClientController::class, 'destroyAll'])->name('clients.destroyAll');
        //==========================================================================================================================//

        //================================================Coach Routes================================================//
        Route::resource('coaches', CoachController::class)->except(['update']);
        Route::put('coaches/{coach}/update', [CoachController::class, 'update'])->name('coaches.update');
        Route::delete('coaches/destroy/all', [CoachController::class, 'destroyAll'])->name('coaches.destroyAll');
        //=============================================================================================================//

        //================================================Coach Feedback==============================================//
        Route::resource('feedbacks', FeedbackController::class)->except(['create']);
        Route::delete('feedbacks/destroy/all', [FeedbackController::class, 'destroyAll'])->name('feedbacks.destroyAll');
        //=============================================================================================================//

        //================================================ Statistics Routes ====================================================================================//
        Route::get('statistics', [StatisticsController::class, 'index'])->name('statistics');

        Route::get('statistics/coach_specialist', [StatisticsController::class, 'coach_specialist'])->name('statistics.coach_specialist');

        Route::get('statistics/coach_revenue/{year}', [StatisticsController::class, 'coach_revenue'])->name('statistics.coach_revenue');
        //==========================================================================================================================//

        Route::get('dashboard', function () {
            return view('admin.dashboard.dashboard');
        })->name('admin.dashboard');

        Route::get('logout', [AdminAuth::class, 'logout'])->name('admin.logout');
        Route::post('edit-profile/{admin}', [AdminAuth::class, 'edit_profile'])->name('admins.edit-profile');
    });

    // Get cities related to country
    Route::get('country/{country}/city_name', [CountryController::class, 'getCity']);
    //==============================Get Districts related to country==================================================//
    Route::get('city/{city}/district_name', [CityController::class, 'getDistrict']);
});

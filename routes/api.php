<?php

use App\Http\Controllers\API\CoachScheduleController;
use App\Http\Controllers\API\CityController;
use App\Http\Controllers\API\DistrictController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\PasswordController;
use App\Http\Controllers\API\CoachController;
use App\Http\Controllers\API\SpecialistController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\ClientAuthController;
use App\Http\Controllers\API\ClientProfileController;
use App\Http\Controllers\API\FeedbackController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::controller(ClientAuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login')->name('login');
    Route::get('getLogin', 'getLogin')->name('getLogin');
    Route::get('cancelAppointment/{id}', 'cancelAppointment');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('clientUser', 'clientUser');
        Route::post('logout', 'logout');
    });
});

Route::controller(PasswordController::class)->group(function () {
    Route::post('forgot',  'forgot');
    Route::post('reset',  'reset');
});

Route::controller(CoachController::class)->group(function () {
    Route::get('coaches', 'index');
    Route::get('search', 'search');
    Route::get('filter', 'filter');
    Route::get('coaches/{id}', 'show');
});


Route::controller(FeedbackController::class)->group(function () {
    Route::post('feedbacks', 'store');
    Route::get('feedbacks/{id}',  'index');
    Route::put('feedbacks', 'update');
});

Route::controller(BookController::class)->group(function () {
    Route::post('book/store', 'store');
    Route::get('/books',  'index');
    Route::post('/books/test',  'store');
});

Route::get('available-time/{coach_id}', [CoachScheduleController::class, 'index']);
Route::put('update/{client}', [ClientProfileController::class, 'update']);
Route::get('/specialists', [SpecialistController::class, 'index']);
Route::get('/cities/{countryCode}', [CityController::class, 'index']);
Route::get('/districts/{cityID}', [DistrictController::class, 'index']);

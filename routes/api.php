<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ClientAuthController;
use App\Http\Controllers\API\PasswordController;

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
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('clientUser', 'clientUser');
        Route::post('logout', 'logout');
    });
});

<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['maintenance'])->group(function () {
    Route::get('/', function () {
        return redirect('admin/login');
    });
});

Route::get('maintenance', function () {

    if (setting()->status == 'open') {
        return redirect('/');
    } else {
        return view('maintenance');
    }
});

Route::get('lang/{lang}', function ($lang) {
    session()->has('lang') ? session()->forget('lang') : '';
    $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
    return back();
});

Route::get('/rate', function(){
    $coach = App\Models\Coach::find(1);
    return($coach->feedbacks->sum('rate'));
});

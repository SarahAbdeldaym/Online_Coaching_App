<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


class AdminAuth extends Controller {
    //login admin page function
    public function login() {
        return view('admin.auth.login');
    }

    //check admin login function
    public function loginCheck() {
        $rememberme = request('rememberme') == 1 ? true : false;
        if (admin()->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)) {
            return redirect(adminUrl("dashboard"));
        } else {
            session()->flash('error', trans('admin.incorrect_information_login'));
            return redirect(adminUrl('login'));
        }
    }
}

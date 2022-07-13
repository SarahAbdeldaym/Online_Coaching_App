<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Mail\AdminResetPassword;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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


    //forget password page
    public function forgotPassword() {
        return view('admin.auth.forgot_password');
    }

    //forget password message send
    public function forgotPasswordMessage() {
        $admin = Admin::where('email', request('email'))->first();
        if (!empty($admin)) {
            $token = app('auth.password.broker')->createToken($admin);
            $data  = DB::table('password_resets')->insert([
                'email'      => $admin->email,
                'token'      => $token,
                'created_at' => Carbon::now(),
            ]);

            Mail::to($admin->email, $admin->name_en)
                ->send(new AdminResetPassword(['data' => $admin, 'token' => $token]));

            session()->flash('success', 'An Email with reset password link has been sent to your email');
            return redirect(adminUrl('login'));
        }
        return back();
    }

}

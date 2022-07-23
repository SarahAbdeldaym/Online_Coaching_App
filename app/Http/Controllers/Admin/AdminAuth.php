<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Mail\AdminResetPassword;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;

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

    //logout function
    public function logout() {
        admin()->logout();
        return redirect(adminUrl('login'));
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

    //reset password page
    public function resetPassword($token) {
        $check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
        if (!empty($check_token)) {
            return view('admin.auth.reset_password', ['data' => $check_token]);
        } else {
            return redirect(adminUrl('forgot/password'));
        }
    }

    //reset password opearation and update data
    public function resetPasswordUpdateData($token) {
        request()->validate([
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required',
        ], [], [
            'password'              => 'Password',
            'password_confirmation' => 'Confirmation Password',
        ]);

        $check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
        if (!empty($check_token)) {
            $admin = Admin::where('email', $check_token->email)->update([
                'email'    => $check_token->email,
                'password' => bcrypt(request('password'))
            ]);
            DB::table('password_resets')->where('email', $check_token->email)->delete();
            //admin()->attempt(['email' => $check_token->email, 'password' => request('password')], true);
            session()->flash('success', 'password is reset you can login now');
            return redirect(adminUrl('login'));
        } else {
            return redirect(adminUrl('forgot/password'));
        }
    }

    public function edit_profile(UpdateAdminRequest $request, Admin $admin) {
        $data = $request->all();
        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data['password'] = $admin->password;
        }

        if ($request->hasFile('image')) {
            if ($request->image != "images/admins/default_admin.png") {
                File::delete("storage/" . $request->image);
            };
            $data['image'] = $request->file('image')->storePublicly('images/admins');
        }

        $admin->update($data);
        session()->flash('success', trans('admin.updated_record'));
        return back();
    }
}

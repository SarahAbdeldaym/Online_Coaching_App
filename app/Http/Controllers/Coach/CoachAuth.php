<?php


namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\CoachResetPassword;
use App\Models\Coach;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CoachAuth extends Controller {
    //Register Coach Page Function
    public function register() {
        return view('coach.auth.register');
    }

    //Check Coach Register Function
    public function registerCheck(Request $request) {
        $data = request()->validate([
            'name_en'               => 'required',
            'name_ar'               => 'required',
            'specialist_id'         => 'required',
            'email'                 => 'required|email|unique:coaches',
            'password'              => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        $data['password'] = bcrypt(request('password'));

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->storePublicly('images/coaches');
        } else {
            $data['image'] = "images/coaches/default_coach.png";
        }

        Coach::create($data);
        session()->flash('success', 'Account is created you can login now');
        return redirect(coachUrl('login'));
    }


     //Login Coach page function
     public function login() {
        return view('coach.auth.login');
    }

    //Check Coach Login function
    public function loginCheck() {
        $rememberme = request('rememberme') == 1 ? true : false;
        if (coach()->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)) {
            return redirect(coachUrl('dashboard'));
        } else {
            session()->flash('error', trans('admin.incorrect_information_login'));
            return redirect(coachUrl('login'));
        }
    }


    //Forget Password Page
    public function forgotPassword() {
        return view('coach.auth.forgot_password');
    }


    //forget password message send
    public function forgotPasswordMessage() {
        $coach = Coach::where('email', request('email'))->first();
        if (!empty($coach)) {
            $token = app('auth.password.broker')->createToken($coach);
            DB::table('password_resets')->insert([
                'email'      => $coach->email,
                'token'      => $token,
                'created_at' => Carbon::now(),
            ]);
            Mail::to($coach->email, $coach->name_en)
                ->send(new CoachResetPassword(['data' => $coach, 'token' => $token]));

            session()->flash('success', 'An Email with reset password link has been sent to your email');
            return redirect(coachUrl('login'));
        }
        return back();
    }


    //Reset Password Page
    public function resetPassword($token) {
        $check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
        if (!empty($check_token)) {
            return view('admin.auth.reset_password', ['data' => $check_token]);
        } else {
            return redirect(adminUrl('forgot/password'));
        }
    }


    //Reset Password Operation and Update Data
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
            $coach = Coach::where('email', $check_token->email)->update([
                'email'    => $check_token->email,
                'password' => bcrypt(request('password'))
            ]);
            DB::table('password_resets')->where('email', $check_token->email)->delete();
            session()->flash('success', 'password is reset you can login now');
            return redirect(coachUrl('login'));
        } else {
            return redirect(coachUrl('forgot/password'));
        }
    }
}

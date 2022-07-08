<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coach;


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

}

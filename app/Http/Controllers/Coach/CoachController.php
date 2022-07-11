<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateCoachRequest;
use App\Models\Coach;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class CoachController extends Controller
{
    public function show()
    {
        $coach = Coach::findOrFail(coach()->id());
        return view('coach.coach.show', compact('coach'));
    }


    public function edit()
    {
        $coach = Coach::findOrFail(coach()->id());
        return view('coach.coach.edit', compact('coach'));
    }

    public function update(UpdateCoachRequest $request, Coach $coach) {
        $data = $request->all();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data['password'] = $coach->password;
        }

        if ($request->hasFile('image')) {
            if ($coach->image != "images/coaches/default_coach.png") {
                File::delete("storage/" . $coach->image);
            };
            $data['image'] = $request->file('image')->storePublicly('images/coaches');
        }

        $coach->update($data);
        session()->flash('success', trans('admin.updated_record'));
        return redirect()->route('coach.profile');
    }

}

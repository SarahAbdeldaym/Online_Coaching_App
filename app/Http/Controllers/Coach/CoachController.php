<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use App\Models\Coach;



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
}

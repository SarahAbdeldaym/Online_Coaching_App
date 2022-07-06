<?php

namespace App\Http\Controllers\API;

use App\Models\CoachSchedule;
use App\Http\Controllers\Controller;


class CoachScheduleController extends Controller {
    public function index($coach_id) {
        $coach_schedule = CoachSchedule::where('coach_id', $coach_id)->get();
        return $coach_schedule;
    }
}

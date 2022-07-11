<?php

namespace App\Http\Controllers\Coach;

use App\Models\CoachSchedule;
use App\Http\Controllers\Controller;
use App\DataTables\CoachScheduleDatatable;
use App\Http\Requests\Admin\StoreCoachScheduleRequest;
use App\Http\Requests\Admin\UpdateCoachScheduleRequest;
use App\Models\Book;

class CoachScheduleController extends Controller {
    public function index(CoachScheduleDatatable $coach_schedule) {
        return $coach_schedule->with([
            'level'     => 'coach',
            'coach_id' => request('coach_id'),
        ])
            ->render(
                'coach.schedule.index',
                ['title' => 'Coach Schedule Control']
            );
    }

   
}

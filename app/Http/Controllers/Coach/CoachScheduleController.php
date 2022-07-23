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

    public function store(StoreCoachScheduleRequest $request) {
        $data = $request->all();
        CoachSchedule::create($data);
        return response()->json(['success' => trans('admin.record_added')]);
    }

    public function show($id) {
        $coach_schedule = CoachSchedule::find($id);
        return view('coach.schedule.modals.show', compact('coach_schedule'));
    }


    public function edit($id) {
        $coach_schedule = CoachSchedule::find($id);
        return view('coach.schedule.modals.edit', compact('coach_schedule'));
    }

    public function update(UpdateCoachScheduleRequest $request, CoachSchedule $coach_schedule) {
        $preBookedAppointments = Book::where("day", $coach_schedule->day);
        if ($preBookedAppointments->exists()) {
            return response()->json([
                'error' => "Can't Update this schedule as a client have already booked an appointment in it"
            ], 403);
        };
        $data = $request->all();
        $coach_schedule->update($data);
        return response()->json(['success' => trans('admin.updated_record')]);
    }

    public function destroy($id) {
        $coach_schedule = CoachSchedule::find($id);
        $preBookedAppointments = Book::where("day", $coach_schedule->day);
        if ($preBookedAppointments->exists()) {
            return response()->json([
                'error' => "Can't Delete this schedule as a client have already booked an appointment in it"
            ], 403);
        };
        $coach_schedule->delete();
        return response()->json(['success' => trans('admin.deleted_record')]);
    }

    public function destroyAll() {
        $itemsIndexes = request('item');
        $undeletableIndexes  = [];

        foreach ($itemsIndexes as $itemIndex) {
            $coach_schedule = CoachSchedule::find($itemIndex);
            $preBookedAppointments = Book::where("day", $coach_schedule->day);
            if ($preBookedAppointments->exists()) {
                array_push($undeletableIndexes, $itemIndex);
            };
        }
        if (count($undeletableIndexes) !== 0) {
            return response()->json([
                'error' => 'Schedules with ids (' . implode(", ", $undeletableIndexes) . ") Can't be deleted as they have a client already booked an appointment in them"
            ], 403);
        }

        CoachSchedule::destroy($itemsIndexes);
        return response()->json(['success' => trans('admin.deleted_record')]);
    }
}

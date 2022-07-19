<?php

namespace App\Http\Controllers\Admin;

use App\Models\CoachSchedule;
use App\Http\Controllers\Controller;
use App\DataTables\CoachScheduleDatatable;
use App\Http\Requests\Admin\StoreCoachScheduleRequest;
use App\Http\Requests\Admin\UpdateCoachScheduleRequest;

class CoachScheduleController extends Controller {
    public function index(CoachScheduleDatatable $coach_schedule) {
        return $coach_schedule->with([
            'coach_id' => request('coach_id'),
        ])
            ->render(
                'admin.coaches_schedule.index',
                ['title' => 'Coach Schedule Control']
            );
    }

    public function store(StoreCoachScheduleRequest $request) {
        $data = $request->all();
        CoachSchedule::create($data);
        return response()->json(['success' => trans('admin.record_added')]);
    }

    public function show(CoachSchedule $coach_schedule) {
        return view('admin.coaches_schedule.modals.show', compact('coach_schedule'));
    }

    public function edit(CoachSchedule $coach_schedule) {
        return view('admin.coaches_schedule.modals.edit', compact('coach_schedule'));
    }

    public function update(UpdateCoachScheduleRequest $request, CoachSchedule $coach_schedule) {
        $data = $request->all();
        $coach_schedule->update($data);
        return response()->json(['success' => trans('admin.updated_record')]);
    }

    public function destroy(CoachSchedule $coach_schedule) {
        $coach_schedule->delete();
        return response()->json(['success' => trans('admin.deleted_record')]);
    }

    public function destroyAll() {
        CoachSchedule::destroy(request('item'));
        return response()->json(['success' => trans('admin.deleted_record')]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use App\Models\CoachSchedule;
use App\Models\Specialist;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller {
    public function index() {
        return view('admin.statistics.statistics');
    }

    public function coach_specialist() {
        $specialists = array();
        $count  = array();

        $coaches = Coach::select(DB::raw("COUNT(*) as count,specialist_id"))
            ->groupBy('specialist_id')
            ->pluck('count', 'specialist_id');

        foreach ($coaches as $key => $coach) {
            $specialists[] = Specialist::select('name_' . session('lang'))
                ->where('id', $key)
                ->pluck('name_' . session('lang'));
            $count[] = $coach;
        }

        $colors_array = array();

        for ($i = 0; $i < count($specialists); $i++) {
            $colors_array[] = 'rgb(' . rand(0, 255) . ',' . rand(0, 255) . ','  . rand(0, 255) . ')';
        }

        $data = [
            'id'      => 'myChart_1',
            'colors'  => $colors_array,
            'labels'  => $specialists,
            'data'    => $count
        ];
        return $data;
    }

    public function coach_revenue($year) {
        $coachInfo = null;
        $fees = null;
        $max_no = 0;
        $coachFees = CoachSchedule::select(DB::raw("SUM(fees) as fees,coach_id as id"))
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw("coach_id"))
            ->pluck('fees', 'id');

        if (count($coachFees) != 0) {
            foreach ($coachFees as $key => $value) {
                $coachIds[] = $key;
                $fees[]      = $value;
            }
            $coaches = Coach::select('name_' . session('lang'), 'email')
                ->whereIn('id', $coachIds)
                ->pluck('email', 'name_' . session('lang'));

            foreach ($coaches as $key => $value) {
                $coachInfo[] = $key . ' | ' . $value;
            }
            $max_no = max($fees);
        }
        $data = [
            'id'      => 'myChart_2',
            'label'   => 'Profit',
            'labels'  => $coachInfo,
            'data'    => $fees,
            'max'     => $max_no
        ];
        return $data;
    }
}

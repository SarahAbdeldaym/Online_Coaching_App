<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index($cityID)
    {
        $district = District::select('id', 'name_en')->where('city_id', $cityID)->get();
        return $district;
    }
}

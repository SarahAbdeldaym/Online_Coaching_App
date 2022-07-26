<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index($countryCode)
    {
        $city = City::select('id', 'name_en')->where('country_id', $countryCode)->get();
        return $city;
    }
}

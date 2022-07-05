<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function index()
    {
        return Coach::with(['specialist', 'country'])->paginate(5);
    }

    public function show($id)
    {
        return Coach::where('id', $id)->with(['specialist', 'country', 'city', 'district'])->get();
    }


    public function search(Request $request)
    {
        return $this->handleSearch($request)->get();
    }

    public function filter(Request $request) {
        $result = $this->handleSearch($request);
        return $result->paginate(5);
    }

    private function handleSearch(Request $request)
    {
        $filteredCoaches = Coach::with(['specialist', 'country', 'city', 'district']);
        if ($request->name_en) {
            $filteredCoaches = $filteredCoaches->where('name_en', $request->name_en);
        }
        if ($request->specialist_id) {
            $filteredCoaches = $filteredCoaches->where('specialist_id', $request->specialist_id);
        }
        if ($request->gender) {
            $filteredCoaches = $filteredCoaches->where('gender', $request->gender);
        }
        if ($request->country_id) {
            $filteredCoaches = $filteredCoaches->where('country_id', $request->country_id);
        }
        if ($request->city_id) {
            $filteredCoaches = $filteredCoaches->where('city_id', $request->city_id);
        }
        if ($request->district_id) {
            $filteredCoaches = $filteredCoaches->where('district_id', $request->district_id);
        }
        if ($request->gender) {
            $filteredCoaches = $filteredCoaches->where('gender', $request->gender);
        }
        return $filteredCoaches;
    }
}

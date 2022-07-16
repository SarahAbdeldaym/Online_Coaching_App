<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Http\Controllers\Controller;
use App\DataTables\CityDatatable;
use App\Http\Requests\Admin\StoreCityRequest;
use App\Http\Requests\Admin\UpdateCityRequest;
use Form;


class CityController extends Controller {
    public function index(CityDatatable $city) {
        return $city->render('admin.cities.index', ['title' => 'City Control']);
    }

    public function store(StoreCityRequest $request) {
        $data = $request->all();
        City::create($data);
        return response()->json(['success' => trans('admin.record_added')]);
    }

    public function show(City $city) {
        return view('admin.cities.modals.show', compact('city'));
    }


    public function edit(City $city) {
        return view('admin.cities.modals.edit', compact('city'));
    }

    public function update(UpdateCityRequest $request, City $city) {
        $data = $request->all();
        $city->update($data);
        return response()->json(['success' => trans('admin.updated_record')]);
    }

    public function destroy(City $city) {
        if ($city->districts()->exists()) {
            return response()->json([
                'error' => 'City have a district related to it, please delete the related district first and try again.'
            ], 403);
        };
        $city->delete();
        return response()->json(['success' => trans('admin.deleted_record')]);
    }

    public function destroyAll() {
        $itemsIndexes = request('item');
        $undeletableIndexes  = [];

        foreach ($itemsIndexes as $itemIndex) {
            $city = City::where('id', $itemIndex)->first();
            if ($city->districts()->exists()) {
                array_push($undeletableIndexes, $itemIndex);
            };
        }
        if (count($undeletableIndexes) !== 0) {
            return response()->json([
                'error' => 'City number ' . implode(", ", $undeletableIndexes) . ' have a district related to it, please delete the related district first and try again.'
            ], 403);
        }
        City::destroy($itemsIndexes);
        return response()->json(['success' => trans('admin.deleted_record')]);
    }

    public function getDistrict(City $city) {
        return $city->districts()->select('id', 'name_' . session('lang'))->get();
    }
}

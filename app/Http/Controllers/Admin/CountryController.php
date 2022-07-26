<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Http\Controllers\Controller;
use App\DataTables\CountryDatatable;
use App\Http\Requests\Admin\StoreCountryRequest;
use App\Http\Requests\Admin\UpdateCountryRequest;

class CountryController extends Controller {
    public function index(CountryDatatable $country) {
        return $country->render('admin.countries.index', ['title' => 'Country Control']);
    }

    public function store(StoreCountryRequest $request) {
        $data = $request->all();
        Country::create($data);
        return response()->json(['success' => trans('admin.record_added')]);
    }

    public function show(Country $country) {
        return view('admin.countries.modals.show', compact('country'));
    }


    public function edit(Country $country) {
        return view('admin.countries.modals.edit', compact('country'));
    }

    public function update(UpdateCountryRequest $request, Country $country) {
        $data = $request->all();
        $country->update($data);
        return response()->json(['success' => trans('admin.updated_record')]);
    }

    public function destroy(Country $country) {
        if ($country->cities()->exists()) {
            return response()->json([
                'error' => 'Country have a city related to it, please delete the related city first and try again.'
            ], 403);
        };
        $country->delete();
        return response()->json(['success' => trans('admin.deleted_record')]);
    }

    public function destroyAll() {
        $itemsIndexes = request('item');
        $undeletableIndexes  = [];

        foreach ($itemsIndexes as $itemIndex) {
            $country = Country::where('id', $itemIndex)->first();
            if ($country->cities()->exists()) {
                array_push($undeletableIndexes, $itemIndex);
            };
        }
        if (count($undeletableIndexes) !== 0) {
            return response()->json([
                'error' => 'Country number ' . implode(", ", $undeletableIndexes) . ' have a city related to it, please delete the related city first and try again.'
            ], 403);
        }
        Country::destroy($itemsIndexes);
        return response()->json(['success' => trans('admin.deleted_record')]);
    }

    public function getCity(Country $country) {
        return $country->cities()->select('id', 'name_' . session('lang'))->get();
    }
}

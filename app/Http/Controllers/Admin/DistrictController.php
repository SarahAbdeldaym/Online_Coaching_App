<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DistrictDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDistrictRequest;
use App\Http\Requests\Admin\UpdateDistrictRequest;
use App\Models\District;

class DistrictController extends Controller {

    public function index(DistrictDatatable $district) {
        return $district->render('admin.districts.index', ['title' => 'District Control']);
    }

    public function store(StoreDistrictRequest $request) {
        $data = $request->all();
        District::create($data);
        return response()->json(['success' => trans('admin.record_added')]);
    }

    public function show(District $district) {
        return view('admin.districts.modals.show', compact('district'));
    }


    public function edit(District $district) {
        return view('admin.districts.modals.edit', compact('district'));
    }

    public function update(UpdateDistrictRequest $request, District $district) {
        $data = $request->all();
        $district->update($data);
        return response()->json(['success' => trans('admin.updated_record')]);
    }

    public function destroy(District $district) {
        if ($district->coaches()->exists()) {
            return response()->json([
                'error' => 'District have a coach related to it, please delete the related coach first and try again.'
            ], 403);
        };
        $district->delete();
        return response()->json(['success' => trans('admin.deleted_record')]);
    }

    public function destroyAll() {
        $itemsIndexes = request('item');
        $undeletableIndexes  = [];

        foreach ($itemsIndexes as $itemIndex) {
            $district = District::where('id', $itemIndex)->first();
            if ($district->coaches()->exists()) {
                array_push($undeletableIndexes, $itemIndex);
            };
        }
        if (count($undeletableIndexes) !== 0) {
            return response()->json([
                'error' => 'District number ' . implode(", ", $undeletableIndexes) . ' have a coach related to it, please delete the related coach first and try again.'
            ], 403);
        }
        District::destroy($itemsIndexes);
        return response()->json(['success' => trans('admin.deleted_record')]);
    }
}

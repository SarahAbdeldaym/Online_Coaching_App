<?php

namespace App\Http\Controllers\Admin;

use App\Models\Specialist;
use App\Http\Controllers\Controller;
use App\DataTables\SpecialistDatatable;
use App\Http\Requests\Admin\StoreSpecialistRequest;
use App\Http\Requests\Admin\UpdateSpecialistRequest;
use Exception;

class SpecialistController extends Controller {
    public function index(SpecialistDatatable $specialist) {
        return $specialist->render('admin.specialists.index', ['title' => 'Specialist Control']);
    }

    public function store(StoreSpecialistRequest $request) {
        $data = $request->all();
        Specialist::create($data);
        return response()->json(['success' => trans('admin.record_added')]);
    }

    public function show(Specialist $specialist) {
        return view('admin.specialists.modals.show', compact('specialist'));
    }

    public function edit(Specialist $specialist) {
        return view('admin.specialists.modals.edit', compact('specialist'));
    }

    public function update(UpdateSpecialistRequest $request, Specialist $specialist) {
        $data = $request->all();
        $specialist->update($data);
        return response()->json(['success' => trans('admin.updated_record')]);
    }

    public function destroy(Specialist $specialist) {
        if ($specialist->coaches()->exists()) {
            return response()->json([
                'error' => 'Specialist have a coach related to it, please delete the related coach first and try again.'
            ], 403);
        };
        $specialist->delete();
        return response()->json(['success' => trans('admin.deleted_record')]);
    }

    public function destroyAll() {
        $itemsIndexes = request('item');
        $undeletableIndexes  = [];

        foreach ($itemsIndexes as $itemIndex) {
            $specialist = Specialist::where('id', $itemIndex)->first();
            if ($specialist->coaches()->exists()) {
                array_push($undeletableIndexes, $itemIndex);
            };
        }
        if (count($undeletableIndexes) !== 0) {
            return response()->json([
                'error' => 'Specialist number ' . implode(", ", $undeletableIndexes) . ' have a coach related to it, please delete the related coach first and try again.'
            ], 403);
        }
        Specialist::destroy($itemsIndexes);
        return response()->json(['success' => trans('admin.deleted_record')]);
    }
}

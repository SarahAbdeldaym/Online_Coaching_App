<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coach;
use App\Http\Controllers\Controller;
use App\DataTables\CoachDatatable;
use App\Http\Requests\Admin\StoreCoachRequest;
use App\Http\Requests\Admin\UpdateCoachRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CoachController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CoachDatatable $coach) {
        return $coach->render('admin.coaches.index',  ['title' => trans('coach.coaches')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoachRequest $request) {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->storePublicly('images/coaches');
        } else {
            $data['image'] = "images/coaches/default_coach.png";
        }

        Coach::create($data);
        return response()->json(['success' => trans('admin.record_added')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Coach $coach) {
        return view('admin.coaches.modals.show', compact('coach'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Coach $coach) {
        return view('admin.coaches.modals.edit', compact('coach'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoachRequest $request, Coach $coach) {
        $data = $request->all();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data['password'] = $coach->password;
        }

        if ($request->hasFile('image')) {
            if ($coach->image != "images/coaches/default_coach.png") {
                File::delete("storage/" . $coach->image);
            };
            $data['image'] = $request->file('image')->storePublicly('images/coaches');
        }

        $coach->update($data);
        return response()->json(['success' => trans('admin.updated_record')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    //Remove A Specified Coach
    public function destroy(Coach $coach) {
        if ($coach->books()->exists()) {
            return response()->json([
                'error' => "Can't delete this coach as he has an appointment with a client"
            ], 403);
        };
        Storage::delete('images/' . $coach->image);
        $coach->delete();
        return response()->json(['success' => trans('admin.deleted_record')]);
    }

    //Destroy All Coaches
    public function destroyAll() {
        $itemsIndexes = request('item');
        $undeletableIndexes  = [];

        foreach ($itemsIndexes as $itemIndex) {
            $coach = Coach::where('id', $itemIndex)->first();
            if ($coach->books()->exists()) {
                array_push($undeletableIndexes, $itemIndex);
            };
        }
        if (count($undeletableIndexes) !== 0) {
            return response()->json([
                'error' => 'Coaches number ' . implode(", ", $undeletableIndexes) . " Can't be deleted as they have an appointment with a client."
            ], 403);
        }
        Coach::destroy($itemsIndexes);
        return response()->json(['success' => trans('admin.deleted_record')]);
    }

}

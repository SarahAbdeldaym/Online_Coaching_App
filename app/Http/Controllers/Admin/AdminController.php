<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\AdminDatatable;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDatatable $admin) {
        return $admin->render('admin.admins.index', ['title' => 'Admin Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreAdminRequest $request) {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->storePublicly('images/admins');
        } else {
            $data['image'] = "images/admins/default_admin.png";
        }

        Admin::create($data);
        return response()->json(['success' => trans('admin.record_added')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin) {
        return view('admin.admins.modals.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin) {
        return view('admin.admins.modals.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin) {

        $data = $request->all();
        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data['password'] = $admin->password;
        }

        if ($request->hasFile('image')) {
            if ($admin->image != "images/admins/default_admin.png") {
                File::delete("storage/" . $admin->image);
            };
            $data['image'] = $request->file('image')->storePublicly('images/admins');
        }

        $admin->update($data);
        return response()->json(['success' => trans('admin.updated_record')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Admin $admin) {
        $admin->delete();
        return response()->json([
            'success' => trans('admin.deleted_record')
        ]);
    }

    public function destroyAll() {
        Admin::destroy(request('item'));
        return response()->json(['success' => trans('admin.deleted_record')]);
    }
}

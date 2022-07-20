<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\DataTables\ClientDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StoreClientRequest;
use App\Http\Requests\Admin\UpdateClientRequest;
use Illuminate\Support\Facades\File;

class ClientController extends Controller {
    public function index(ClientDataTable $client) {
        return $client->render('admin.clients.index', ['title' => 'Clients Control']);
    }

    public function store(StoreClientRequest $request) {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->storePublicly('images/clients');
        } else {
            $data['image'] = "images/clients/default_client.png";
        }

        Client::create($data);
        return response()->json(['success' => trans('admin.record_added')]);
    }

    public function show(Client $client) {
        return view('admin.clients.modals.show', compact('client'));
    }

    public function edit(Client $client) {
        return view('admin.clients.modals.edit', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client) {
        $data = $request->all();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data['password'] = $client->password;
        }

        if ($request->hasFile('image')) {
            if ($client->image != "images/clients/default_client.png") {
                File::delete("storage/" . $client->image);
            };
            $data['image'] = $request->file('image')->storePublicly('images/clients');
        }

        $client->update($data);

        return response()->json(['success' => trans('admin.updated_record')]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    //Remove A Specified Client
    public function destroy(Client $client) {
        if ($client->books()->exists()) {
            return response()->json([
                'error' => "Can't delete this client as he has an appointment with a coach"
            ], 403);
        };
        Storage::delete('images/' . $client->image);
        $client->delete();
        return response()->json(['success' => trans('admin.deleted_record')]);
    }

    //Destroy All Clients
    public function destroyAll() {
        $itemsIndexes = request('item');
        $undeletableIndexes  = [];

        foreach ($itemsIndexes as $itemIndex) {
            $client = Client::where('id', $itemIndex)->first();
            if ($client->books()->exists()) {
                array_push($undeletableIndexes, $itemIndex);
            };
        }
        if (count($undeletableIndexes) !== 0) {
            return response()->json([
                'error' => 'Clients number ' . implode(", ", $undeletableIndexes) . " Can't be deleted as they have an appointment with a coach."
            ], 403);
        }
        Client::destroy($itemsIndexes);
        return response()->json(['success' => trans('admin.deleted_record')]);
    }
}//end of controller

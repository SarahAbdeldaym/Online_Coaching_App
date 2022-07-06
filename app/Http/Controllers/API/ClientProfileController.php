<?php

namespace App\Http\Controllers\API;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;

class ClientProfileController extends Controller {
    public function update(Request $request, $id) {

        $rules = [
            'email' => "nullable|email|unique:clients,email,$id",
            'password' => 'nullable|min:8',
            'password_confirm' => 'nullable|same:password',
            'name_en'  => 'nullable',
            'mobile'  => "nullable|numeric|unique:clients,mobile,$id",
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable',
        ];

        if ($request->hasFile('image')) {
            $rules += [
                'image'    => ['sometimes', 'nullable', 'image', 'mimes:jpg,jpeg,png'],
            ];
        }

        $request->validate($rules);

        $client = Client::find($id);

        $client->name_en = $request->input('name_en');

        $client->name_ar = $request->input('name_ar');

        $client->email = $request->input('email');

        $client->password = Hash::make($request->input('password'));

        $client->mobile = $request->input('mobile');

        $client->date_of_birth = $request->input('date_of_birth');

        $client->gender = $request->input('gender');

        if ($request->hasFile('image')) {
            if ($request->image != "images/clients/default_client.png") {
                File::delete("storage/" . $request->image);
            };
            $client->image = $request->file('image')->storePublicly('images/clients');
        }

        if ($client->save()) {
            return response()->json([
                "message" => "Client updated successfully",
                "status" => 200,
                "user" => $client,
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                "message" => "Client fail to update",
                "status" => 400,
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}

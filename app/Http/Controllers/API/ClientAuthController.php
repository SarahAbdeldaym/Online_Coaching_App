<?php

namespace App\Http\Controllers\API;

use App\Models\Client;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\API\Client\LoginRequest;
use App\Http\Requests\API\Client\RegisterRequest;

class ClientAuthController extends Controller {
    public function register(RegisterRequest $request) {
        $client = new Client();

        if ($request->hasFile('image')) {
            $client->image = $request->file('image')->storePublicly('images/clients');
        } else {
            $client->image = "images/clients/default_client.png";
        }

        $client->name_en       = $request->input('name_en');
        $client->email         = $request->input('email');
        $client->password      = Hash::make($request->input('password'));
        $client->mobile        = $request->input('mobile');
        $client->date_of_birth = $request->input('date_of_birth');
        $client->gender        = $request->input('gender');

        if ($client->save()) {
            return response()->json([
                "message" => "Client registered successfully",
                "status"  => 201,
                "user"    => $client,
            ], Response::HTTP_CREATED);
        } else {
            return response()->json([
                "message" => "Client failed to register",
                "status"  => 400,
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    
}

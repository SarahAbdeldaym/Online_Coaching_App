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

class ClientAuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
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

    public function login(LoginRequest $request)
    {
        $client = Client::where('email', $request->email)->first();
        if (!$client || !Hash::check($request->password, $client->password)) {
            return response()->json([
                "message"  => "Invalid credentials",
                "status"   => 401,
            ], Response::HTTP_UNAUTHORIZED);
        }

        $token = $client->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24, null, null, false, false);

        return response()->json([
            "jwt"    => $token,
            "status" => 200,
        ])->withCookie($cookie);
    }



    public function getLogin(Request $request)
    {
        dd($request);
        return $request->user();
    }

    public function clientUser(Request $request)
    {
        if (Auth::check()) {
            $client = Client::with(['books', 'books.coach'])
                ->where('id', $request->user()->id)->first();
            return $client;
        } else {
            return response()->json([
                "error" => "Not authenticated",
            ], Response::HTTP_UNAUTHORIZED);
        }
    }


    public function logout()
    {
        $cookie = Cookie::forget('jwt');
        return response()->json([
            "message" => 'Logout successfully',
        ])->withCookie($cookie);
    }

    public function cancelAppointment($id) {
        Book::find($id)->delete();
        return response()->json([
            "message" => "Appointment canceled successfully",
            "status"  => 203,
        ], Response::HTTP_OK);
    }
}

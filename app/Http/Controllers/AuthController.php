<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $user = new User;
            $user->nickName = $request->input("nickName");
            $user->fullName = $request->input("fullName");
            $user->email = $request->input("email");
            $user->password = Hash::make($request->input("password"));

            $user->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => "user created succesfully",
                    'data' => $user
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "User cant be created",
                    'error' => $th->getMessage() 
                ],
                500
            );
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{

    ////////////////       METHOD MYPROFULE      ////////////////////////
    public function getMyProfile()
    {
        try {
            $userId = auth()->user()->id;
            $user = User::where("id", $userId)->get();

            if (!$user) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "User not found"
                    ],
                    404
                );
            }
            return response()->json(
                [
                    'success' => true,
                    'message' => "User profile retrieved succesfully",
                    'data' => $user
                ]
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "User cant be retrieved",
                    'error' => $th->getMessage() // $th esun objeto del que cogemos el getter getMessage()
                ],
                500
            );
        }
    }

    /////////////    METHOD UPDATE   //////////////
    public function updateUser(Request $request)
    {
        try {
            $userId = auth()->user()->id;
            $validated = $request->validate([
                'nickname' => 'max:25',
                'fullname' => 'max:25'
            ]);

            $user = User::find($userId);

            if ($request->input('nickname')) {
                $user->nickname = $request->input('nickname');
            }
            if ($request->input('fullname')) {
                $user->fullname = $request->input('fullname');
            }

            $user->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'User update succesfully',
                    'data' => $user
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "User cant be updated",
                    'error' => $th->getMessage() // $th esun objeto del que cogemos el getter getMessage()
                ],
                500
            );
        }
    }

    ////////////////     METHOD DELETE     ///////////////
    public function deleteUser()
    {
        try {
            $userId = auth()->user()->id;
            $user = User::find($userId);
            $user->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => "User deleted succesfully",
                    'data' => $user
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "User cant be created",
                    'error' => $th->getMessage() // $th esun objeto del que cogemos el getter getMessage()
                ],
                500
            );
        }
    }
}

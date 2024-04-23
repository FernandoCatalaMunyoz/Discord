<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{

    ////////////////       METHOD MYPROFULE      ////////////////////////
    public function getMyProfile($id)
    {
        try {
            $user = User::find($id);

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
                    'message' => "Date of the user",
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
    public function updateUser(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'nickName' => 'required|max:25',
                'fullName' => 'required|max:25'
            ]);

            $user = User::find($id);

            if ($request->input('nickName')) {
                $user->nickName = $request -> input('nickName');
            }
            if ($request->input('fullName')) {
                $user->fullName = $request->input('fullName');
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
    public function deleteUser($id){
        try{
            $user = User::find($id);
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

<?php

namespace App\Http\Controllers;

use App\Models\UserRoom;
use Illuminate\Http\Request;

class UserRoomController extends Controller
{
    //Funciones de los endpoints

    public function addUser(Request $request)
    {
        try {
            $validated = $request->validate([
                "user_id" => "required",
                "room_id" => "required"
            ]);

            $userRoom = new UserRoom();
            $userRoom->user_id = $request->input('user_id');
            $userRoom->room_id = $request->input('room_id');

            $userRoom->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => "User added to room succesfully",
                    'data' => $userRoom
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "User cant be added to room",
                    'error' => $th->getMessage()
                ],
                500
            );
        }
    }

    public function deleteUser($id)
    {
        try {
            $userRoom = UserRoom::find($id);

            if ($userRoom == null) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "UserRoom not found",
                        'error' => "404"
                    ],
                    404
                );
            }

            $userRoom->delete();

            return response()->json(
                [
                    'success' => true,
                    'message' => "User deleted from room succesfully",
                    'data' => $userRoom
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "User cant be deleted from room",
                    'error' => $th->getMessage()
                ],
                500
            );
        }
    }
}



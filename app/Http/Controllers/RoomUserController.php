<?php

namespace App\Http\Controllers;

use App\Models\RoomUser;
use Illuminate\Http\Request;

class RoomUserController extends Controller
{
    public function addUser(Request $request)
    {
        try {
            $validated = $request->validate([
                "user_id" => "required",
                "room_id" => "required"
            ]);

            $userRoom = new RoomUser();
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
            $userRoom = RoomUser::find($id);

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

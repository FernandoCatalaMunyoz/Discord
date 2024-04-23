<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function createRoom(Request $request, $id)
    {
        try {
            $room = new Room;
            $room->room_name = $request->input("room_name");
            $room->room_description = $request->input("room_description");
            $room->game_id = $request->input("game_id");
            $room->owner = $id;

            $room->save();
            return response()->json(
                [
                    'success' => true,
                    'message' => "room created succesfully",
                    'data' => $room
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "room cant be created",
                    'error' => $th->getMessage() // $th esun objeto del que cogemos el getter getMessage()
                ],
                500
            );
        }
    }

    public function updateRoom(Request $request, $id)
    {
        $validated = $request->validate([
            "room_name" => "max:250",
            "room_description" => "String|max:250"

        ]);
        try {
            $room = Room::find($id);
            if ($request->input("room_name")) {
                $room->room_name = $request->input("room_name");
            }
            if ($request->input("room_description")) {
                $room->room_description = $request->input("room_description");
            }
            $room->save();
            return response()->json(
                [
                    'success' => true,
                    'message' => "Room updated succesfully",
                    'data' => $room
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Room cant be updated",
                    'error' => $th->getMessage() // $th esun objeto del que cogemos el getter getMessage()
                ],
                500
            );
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function createRoom(Request $request)
    {
        try {
            $room = new Room;
            $room->room_name = $request->input("room_name");
            $room->room_description = $request->input("room_description");
            $room->game_id = $request->input("game_id");
            $room->owner = auth()->user()->id;

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
            //poner validacion de que estas en esa sala
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

    public function deleteRoom(Request $request, $room_id)
    {
        try {
            $room = Room::find($room_id);
            $userId = auth()->user()->id;

            if ($userId !== $room->owner) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "you cant remove this room",

                    ],
                    500
                );
            }
            $room->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => "Room deleted succesfully",
                    'data' => $room
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Room cant be deleted",
                    'error' => $th->getMessage() // $th esun objeto del que cogemos el getter getMessage()
                ],
                500
            );
        }
    }

    public function getGameRooms($game_id)
    {
        try {
            // $game_id = $request->input("game_id");
            $rooms = Room::where("game_id", $game_id)->get()->paginate(15);


            return response()->json(
                [
                    'success' => true,
                    'message' => "Rooms retrieved succesfully",
                    'data' => $rooms
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Rooms cant be retrieved",
                    'error' => $th->getMessage()()
                ],
                500
            );
        }
    }

    public function joinRoom(Request $request, $id)

    {
        try {
            $room = Room::find($id);
            $userId = auth()->user()->id;
            $room->users()->attach($userId);
            return response()->json(
                [
                    'success' => true,
                    'message' => "User joined succesfully",
                    'data' => $room
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "User can't join",
                    'error' => $th->getMessage()()
                ],
                500
            );
        }
    }

    public function leaveRoom(Request $request, $id)

    {
        try {
            $room = Room::find($id);
            $userId = auth()->user()->id;
            $room->users()->detach($userId);
            return response()->json(
                [
                    'success' => true,
                    'message' => "User left succesfully",
                    'data' => $room
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "User can't left",
                    'error' => $th->getMessage()()
                ],
                500
            );
        }
    }
}

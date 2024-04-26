<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;

class MessageController extends Controller
{

    public function getRoomMessages(Request $request, $id)
    {
        try {

            $limit = $request->query('limit', 2);
            $messages = Message::where('room_id', $id)->paginate($limit);


            return response()->json(
                [
                    'success' => true,
                    'message' => "Messages retrieved successfully",
                    'data' => $messages
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Messages cant retrieved successfully",
                    'error' => $th->getMessage()
                ],
                500
            );
        }
    }

    public function createMessage(Request $request, $room_id)
    {
        try {
            $message = new Message;
            $message->message = $request->input("message");
            $message->user_id = auth()->user()->id;
            $message->room_id = $room_id;
            $message->save();
            return response()->json(
                [
                    'success' => true,
                    'message' => "message created succesfully",
                    'data' => $message
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Message cant be created",
                    'error' => $th->getMessage() // $th esun objeto del que cogemos el getter getMessage()
                ],
                500
            );
        }
    }

    public function updateMessage(Request $request, $id)
    {

        try {
            $validated = $request->validate([
                "message" => "required|max:30000",
            ]);

            $message = Message::find($id);
            if ($request->input('message')) {
                $message->message = $request->input('message');
            }

            $message->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => "Message updated succesfully",
                    'data' => $message
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Message cant be updated",
                    'error' => $th->getMessage()
                ],
                500
            );
        }
    }


    public function deleteMessage($id)
    {
        try {
            $message = Message::find($id);
            $message->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => "Message deleted succesfully",
                    'data' => $message
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Message cant be created",
                    'error' => $th->getMessage()
                ],
                500
            );
        }
    }
}

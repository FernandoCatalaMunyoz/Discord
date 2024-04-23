<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function postMessage(Request $request, $room_id)
    {
        try {
            $message = new Message;
            $message->message = $request->input("message");
            $message->user_id = $request->input("user_id");
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
}

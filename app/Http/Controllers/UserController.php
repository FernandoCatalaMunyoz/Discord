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

}

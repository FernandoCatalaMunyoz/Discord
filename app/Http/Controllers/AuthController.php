<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

use function PHPUnit\Framework\returnSelf;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            Log::info("REGISTERING USER");
            $user = new User;
            $user->nickName = $request->input("nickName");
            $user->fullName = $request->input("fullName");
            $user->email = $request->input("email");
            $user->password = Hash::make($request->input("password"));
            //VAlidaciones

            $validator = Validator::make($request->all(), [
                'nickName' => 'required|unique:users|max:50',
                'email' => 'required|unique:users', //poner validacion regex
                'password' => 'required|min:4|max:10'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "success" => false,
                    "message" => "Validation failed",
                    "error" => $validator->errors()
                ]);
            }
            $user->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => "user created succesfully",
                    'data' => $user
                ],
                201
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    'success' => false,
                    'message' => "User cant be created",
                    // 'error' => $th->getMessage()
                ],
                500
            );
        }
    }

    public function login(Request $request)
    {
        try {
            $email = $request->input('email');
            $password = $request->input('password');
            $validator = Validator::make($request->all(), [

                'email' => 'required', //poner validacion regex
                'password' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "success" => false,
                    "message" => "Validation failed",
                    "error" => $validator->errors()
                ]);
            }
            $user = User::query()
                ->where('email', $email)
                ->first();



            if (!$user) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "Email or password not valid",

                    ],
                    400
                );
            }

            // VALIDAR PASSWORD

            $checkPasswordUser = Hash::check($password, $user->password);
            if (!$checkPasswordUser) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "Email or password not valid 2",

                    ],
                    400
                );
            }

            //CREAR TOKEN

            $tokenData = $user->createToken('api-token')->plainTextToken; // guardamos el token que hemos creadopara ese usuario

            return response()->json(
                [
                    'success' => true,
                    'message' => "user logged succesfully",
                    'token' => $tokenData,

                ],
                201
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    'success' => false,
                    'message' => "User cant be logged",
                    // 'error' => $th->getMessage()
                ],
                500
            );
        }
    }
    //RPOFILE

    public function getProfile()
    {
        try {
            $user = auth()->user();
            return response()->json(
                [
                    "succes" => true,
                    "message" => "Profile retrieved succesfully",
                    "data" => $user
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(
                [
                    'success' => false,
                    'message' => "Profile cant be retrieved",

                ],
                500
            );
        }
    }

    public function logOut(Request $request)
    {
        $request()->user()->currentAccesToken()->delete();
        return "token deleted";
    }

    public function logOutAllDevices(Request $request)
    {
        $request()->user()->tokens()->delete();
        return "token deleted";
    }
}

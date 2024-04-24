<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserRoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login'])->middleware('superAdmin');
Route::delete('/auth/logout', [AuthController::class, 'logOut'])->middleware('auth:sanctum');
Route::get('/users/profile/{id}', [UserController::class], 'updateUser');
Route::get('/users/profile/{id}', [UserController::class], 'deleteUser');


Route::get('/games', [GameController::class, 'getAllGames']);
Route::post('/games', [GameController::class, 'createGame']);
Route::put('/games/{id}', [GameController::class, 'updateGame']);
Route::delete('/games/{id}', [GameController::class, 'deleteGame']);


Route::get('/messages', [MessageController::class, 'getAllMessages']);
Route::post('/messages/{room_id}', [MessageController::class, 'createMessage']);
Route::put('/messages/{id}', [MessageController::class, 'updateMessage']);
Route::delete('/messages/{id}', [MessageController::class, 'deleteMessage']);


Route::post('/rooms', [RoomController::class, 'createRoom']);
Route::put('/rooms/{id}', [RoomController::class, 'updateRoom']);
Route::delete('/rooms/{id}', [RoomController::class, 'deleteRoom']);
Route::get('/rooms', [RoomController::class, 'getAllRooms']);


Route::post('/user-room', [UserRoomController::class, 'addUser']);
Route::delete('/user-room/{id}', [UserRoomController::class, 'deleteUser']);




Route::middleware(['auth:sanctum'])->group(
    function () {
        Route::post('/rooms', [RoomController::class, 'createRoom']);
        Route::put('/rooms/{id}', [RoomController::class, 'updateRoom']);
        Route::delete('/rooms/{id}', [RoomController::class, 'deleteRoom']);
        Route::get('/rooms', [RoomController::class, 'getAllRooms']);
    }
);

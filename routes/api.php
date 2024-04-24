<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::delete('/auth/logout', [AuthController::class, 'logOut'])->middleware('auth:sanctum');


Route::put('/users/profile/{id}', [UserController::class], 'updateUser');
Route::delete('/users/profile/{id}', [UserController::class], 'deleteUser');
Route::get('/users/profile/{id}', [UserController::class], 'deleteUser');


Route::get('/games', [GameController::class, 'getAllGames']);
Route::post('/games', [GameController::class, 'createGame']);
Route::put('/games/{id}', [GameController::class, 'updateGame']);
Route::delete('/games/{id}', [GameController::class, 'deleteGame']);


Route::get('/messages', [MessageController::class, 'getAllMessages']);
Route::post('/messages/{id}', [MessageController::class, 'createMessage'])->middleware("auth:sanctum");
Route::put('/messages/{id}', [MessageController::class, 'updateMessage']);
Route::delete('/messages/{id}', [MessageController::class, 'deleteMessage']);


Route::post('/rooms', [RoomController::class, 'createRoom']);
Route::put('/rooms/{room_id}', [RoomController::class, 'updateRoom']);
Route::delete('/rooms/{id}', [RoomController::class, 'deleteRoom']);
Route::get('/rooms/{game_id}', [RoomController::class, 'getGameRooms']);


Route::post('/user-room', [RoomUserController::class, 'addUser']);
Route::delete('/user-room/{id}', [RoomUserController::class, 'deleteUser']);




// Route::middleware(['auth:sanctum'])->group(
//     function () {
//         Route::post('/rooms', [RoomController::class, 'createRoom']);
//         Route::put('/rooms/{id}', [RoomController::class, 'updateRoom']);
//         Route::delete('/rooms/{id}', [RoomController::class, 'deleteRoom']);
//         Route::get('/rooms', [RoomController::class, 'getAllRooms']);
//     }
// );

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomUserController;
use Illuminate\Support\Facades\Route;

//todo corregir las rutas de la tabla intermedia 
Route::post('/user-room', [UserRoomController::class, 'addUser']); //añadimos usuario a la sala
Route::delete('/user-room/{id}', [UserRoomController::class, 'deleteUser']); //eliminamos usuario de la sala


Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::delete('/auth/logout', [AuthController::class, 'logOut'])->middleware('auth:sanctum');


Route::middleware(['auth:sanctum'])->group(
    function () {
        Route::put('/users', [UserController::class, 'updateUser']);
        Route::delete('/users', [UserController::class, 'deleteUser']);
        Route::get('/users/profile', [UserController::class, 'getMyProfile']);
    }
);

Route::middleware(['auth:sanctum'])->group(
    function () {
        Route::post('/rooms', [RoomController::class, 'createRoom']);
        Route::put('/rooms/{room_id}', [RoomController::class, 'updateRoom']);
        Route::delete('/rooms/{id}', [RoomController::class, 'deleteRoom']);
        Route::get('/rooms/{game_id}', [RoomController::class, 'getGameRooms']);
    }
);

Route::middleware(['auth:sanctum'])->group(
    function () {
        Route::get('/messages', [MessageController::class, 'getAllMessages']);
        Route::post('/messages/{id}', [MessageController::class, 'createMessage']);
        Route::put('/messages/{id}', [MessageController::class, 'updateMessage']);
        Route::delete('/messages/{id}', [MessageController::class, 'deleteMessage'])->middleware("SuperAdmin");
    }
);
Route::middleware(['auth:sanctum'])->group(
    function () {
        Route::get('/games', [GameController::class, 'getAllGames']);
        Route::post('/games', [GameController::class, 'createGame'])->middleware("SuperAdmin");
        Route::put('/games/{id}', [GameController::class, 'updateGame'])->middleware("SuperAdmin");
        Route::delete('/games/{id}', [GameController::class, 'deleteGame'])->middleware("SuperAdmin");
    }
);

Route::post('/user-room', [RoomUserController::class, 'addUser']);
Route::delete('/user-room/{id}', [RoomUserController::class, 'deleteUser']);

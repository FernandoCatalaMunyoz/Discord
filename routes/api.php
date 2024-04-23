<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\RoomController;
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


Route::get('/games', [GameController::class, 'getAllGames']); // (ruta,[controlardor::class,nombre funcion])
Route::post('/games', [GameController::class, 'createGame']); // (ruta,[controlardor::class,nombre funcion])
Route::put('/games/{id}', [GameController::class, 'updateGame']); // (ruta,[controlardor::class,nombre funcion])
Route::delete('/games/{id}', [GameController::class, 'deleteGame']); // (ruta,[controlardor::class,nombre funcion])



Route::post('/rooms/{id}', [RoomController::class, 'createRoom']);
Route::put('/rooms/{id}', [RoomController::class, 'updateRoom']);
Route::delete('/rooms/{id}', [RoomController::class, 'deleteRoom']);
Route::get('/rooms', [RoomController::class, 'getAllRooms']);

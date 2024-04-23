<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
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

Route::get('/profile/{id}', [UserController::class, 'getMyProfile']);
route::update('/update/{id}', [UserController::class, 'updateUser']);
Route::get('/games', [GameController::class, 'getAllGames']); // (ruta,[controlardor::class,nombre funcion])
Route::post('/games', [GameController::class, 'createGame']); // (ruta,[controlardor::class,nombre funcion])
Route::put('/games/{id}', [GameController::class, 'updateGame']); // (ruta,[controlardor::class,nombre funcion])
Route::delete('/games/{id}', [GameController::class, 'deleteGame']); // (ruta,[controlardor::class,nombre funcion])






Route::post('/taks', function (
    Request $request
) {
    dump($request->input()); // asi recuperas lo qu ele envias por boy a traves del cliente
    dump($request->input("campo1")); // asi recuperas lo qu ele envias por boy a traves del cliente del campo 1

    $title = $request->input("campo1");

    return 'create TASK';
});
Route::put('/taks{$id}', function ($id) {
    return 'update TASK ' . $id;
});
Route::delete('/taks{$id}', function ($id) {
    return 'delete TASK ' . $id;
});

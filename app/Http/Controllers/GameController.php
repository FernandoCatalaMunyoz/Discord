<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class GameController extends Controller
{
    //Creamos aqui las funciones de cada empoint

    public function getAllGames()
    {
        try {
            $games = Game::all(); // devuelve coleccion con todos los registros de Games

            return response()->json(
                [
                    'success' => true,
                    'message' => "Games retrieved succesfully",
                    'data' => $games
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Games cant be retrieved",
                    'error' => $th->getMessage() // $th esun objeto del que cogemos el getter getMessage()
                ],
                500
            );
        }
    }
    public function createGAme(Request $request)
    {
        try {
            $game = new Game;
            $game->game_name = $request->input('game_name');
            $game->description = $request->input('description');
            $game->game_image = $request->input('game_image');

            $game->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => "Game created succesfully",
                    'data' => $game
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Games cant be created",
                    'error' => $th->getMessage() // $th esun objeto del que cogemos el getter getMessage()
                ],
                500
            );
        }
    }
    public function updateGame(Request $request, $id)
    {
        try {
            $game = Game::find($id);
            if ($request->input('game_name')) {
                $game->game_name = $request->input('game_name');
            }
            if ($request->input('description')) {
                $game->description = $request->input('description');
            }
            if ($request->input('game_image')) {
                $game->game_image = $request->input('game_image');
            }



            $game->save();
            //validar que eiste el juego
            return response()->json(
                [
                    'success' => true,
                    'message' => "Game updated succesfully",
                    'data' => $game
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Games cant be updated",
                    'error' => $th->getMessage() // $th esun objeto del que cogemos el getter getMessage()
                ],
                500
            );
        }
    }
    public function deleteGame($id)
    {
        try {
            $game = Game::find($id);
            $game->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => "Game deleted succesfully",
                    'data' => $game
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Games cant be created",
                    'error' => $th->getMessage() // $th esun objeto del que cogemos el getter getMessage()
                ],
                500
            );
        }
    }
}

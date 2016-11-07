<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Game;
use App\Quize;

class GamesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $games = Game::all();
        $quizes = Quize::all();
        return view('backend.games.index', ['games' => $games, 'quizes' => $quizes]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'game_name'  =>  'required',
            'game_quize'  =>  'required',
        ]);

        $game = new Game();
        $game->name = $request['game_name'];
        $game->quize_id = $request['game_quize'];
        $game->save();

        return redirect()->back()->with(['message' => 'The Game Inserted Sucessfully']);
    }
    public function update(Request $request)
    {
        $game = Game::find($request['game_id']);
        $game->name = $request['Name'];
        $game->quize_id = $request['quize_id'];
        $game->save();

        return response()->json([
            'game_name' => $game->name,
            'game_quize_id' => $game->quize_id,
            'game_quize_name' => $game->quize->name,
        ], 200);
    }

    public function delete($id)
    {
        $game = Game::find($id);
        $game->delete();
        return redirect()->back()->with(['message' => 'The Game Has been Deleted Successfully']);
    }
}

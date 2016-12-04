<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Game;
use App\Round;

class RoundsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rounds = Round::all();
        $games = Game::all();
        return view('backend.rounds.index', ['rounds' => $rounds, 'games' => $games]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required',
            'game_id'   =>  'required'
        ]);

        $round = new Round();
        $round->name = $request['name'];
        $round->game_id = $request['game_id'];
        $round->save();
        return redirect()->back()->with(['message' => 'Round Added Successfully']);
    }
    public function update(Request $request)
    {
        $round = Round::find($request['id']);
        $round->name = $request['round_name'];
        $round->game_id = $request['round_game'];
        $round->save();

        return response()->json([
            'id'        => $round->id,
            'round_name' => $round->name,
            'round_game' => $round->game->name,
            'round_game_id' => $round->game_id,
        ]);
    }

    public function delete($id)
    {
        $round = Round::find($id);
        $round->delete();
        return redirect()->back()->with(['message' => 'Round Deleted Successfully']);
    }
}

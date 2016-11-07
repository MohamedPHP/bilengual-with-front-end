<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\Game;

class QuistionTextController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = Question::where('Questiontype', 0)->get(); // 0 means text questions
        $games = Game::all();
        return view('backend.quistions.index', ['questions' => $questions, 'games' => $games]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'question_content'  =>  'required',
            'question_game_id'  =>  'required'
        ]);

        $question = new Question();
        $question->content = $request['question_content'];
        $question->game_id = $request['question_game_id'];
        $question->save();

        return redirect()->back()->with(['message' => 'The Question Added Sucessfully']);
    }

    public function update(Request $request)
    {
        $question = Question::find($request['qid']);
        $question->content = $request['question_content'];
        $question->game_id = $request['question_game_id'];
        $question->save();


        return response()->json([
            'question_content'  =>  $question->content,
            'question_game_id'  =>  $question->game_id,
            'question_game_name'=>  $question->game->name,
        ], 200);
    }



    public function delete($id)
    {
        $question = Question::find($id);
        $question->delete();

        return redirect()->back()->with(['message' => 'The Question has Been Deleted Sucessfully']);
    }
}

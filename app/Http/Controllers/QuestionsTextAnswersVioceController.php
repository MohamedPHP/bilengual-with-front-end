<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;
use App\Game;

class QuestionsTextAnswersVioceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = Question::where('Questiontype', 4)->get(); // 4 means text questions with answers vioce
        $games = Game::all();
        return view('backend.quistions.text-vioce', ['questions' => $questions, 'games' => $games]);
    }

    
    public function create(Request $request)
    {
        $this->validate($request, [
            'questions_text_answers_voice_content'  => 'required',
            'questions_text_answers_voice_game'     => 'required',
        ]);

        $question = new Question();
        $question->content      = $request['questions_text_answers_voice_content'];
        $question->game_id      = $request['questions_text_answers_voice_game'];
        $question->Questiontype = 4;
        $question->save();

        return redirect()->back()->with(['message' => 'The Question Added Sucessfully']);
    }

    public function update(Request $request)
    {
        $question = Question::find($request['id']);

        $question->content = $request['questions_text_answers_voice_content_update'];
        $question->game_id = $request['questions_text_answers_voice_game_update'];

        $question->save();

        return redirect()->back()->with(['message' => 'The Question Updated Sucessfully']);

    }

    public function delete($id)
    {
        $question = Question::find($id);

        $question->delete();

        return redirect()->back()->with(['message' => 'The Question Delete Sucessfully']);
    }
}

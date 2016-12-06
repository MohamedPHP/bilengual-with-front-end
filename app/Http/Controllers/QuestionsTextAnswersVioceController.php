<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;
use App\Round;

class QuestionsTextAnswersVioceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = Question::where('Questiontype', 4)->get(); // 4 means text questions with answers vioce
        $rounds = Round::all();
        return view('backend.quistions.text-vioce', ['questions' => $questions, 'rounds' => $rounds]);
    }


    public function create(Request $request)
    {
        $this->validate($request, [
            'questions_text_answers_voice_content'  => 'required',
            'questions_text_answers_voice_round'     => 'required',
        ]);

        $question = new Question();
        $question->content      = $request['questions_text_answers_voice_content'];
        $question->round_id      = $request['questions_text_answers_voice_round'];
        $question->Questiontype = 4;
        $question->save();

        return redirect()->back()->with(['message' => 'The Question Added Sucessfully']);
    }

    public function update(Request $request)
    {
        $question = Question::find($request['id']);

        $question->content = $request['questions_text_answers_voice_content_update'];
        $question->round_id = $request['questions_text_answers_voice_round_update'];

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

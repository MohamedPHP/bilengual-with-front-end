<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;

use App\Round;

class QuestionsTextAnswersShapeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = Question::where('Questiontype', 5)->get(); // 5 means text questions with answers shape
        $rounds = Round::all();
        return view('backend.quistions.text-shape', ['questions' => $questions, 'rounds' => $rounds]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'questions_text_answers_shape_content'  => 'required',
            'questions_text_answers_shape_game'     => 'required',
        ]);

        $question = new Question();
        $question->content      = $request['questions_text_answers_shape_content'];
        $question->round_id      = $request['questions_text_answers_shape_game'];
        $question->Questiontype = 5;
        $question->save();

        return redirect()->back()->with(['message' => 'The Question Added Sucessfully']);
    }
//     id
// questions_text_answers_shape_content
// questions_text_answers_shape_game
    public function update(Request $request)
    {
        $this->validate($request, [
            'questions_text_answers_shape_content'  => 'required',
            'questions_text_answers_shape_game'     => 'required',
        ]);

        $question = Question::find($request['id']);
        $question->content      = $request['questions_text_answers_shape_content'];
        $question->round_id      = $request['questions_text_answers_shape_game'];
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

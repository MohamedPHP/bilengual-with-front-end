<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\Round;

class QuistionTextController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = Question::where('Questiontype', 0)->get(); // 0 means text questions
        $rounds = Round::all();
        return view('backend.quistions.index', ['questions' => $questions, 'rounds' => $rounds]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'question_content'  =>  'required',
            'question_round_id'  =>  'required'
        ]);

        $question = new Question();
        $question->content = $request['question_content'];
        $question->round_id = $request['question_round_id'];
        $question->save();

        return redirect()->back()->with(['message' => 'The Question Added Sucessfully']);
    }

    public function update(Request $request)
    {
        $question = Question::find($request['qid']);
        $question->content = $request['question_content'];
        $question->round_id = $request['question_round_id'];
        $question->save();


        return response()->json([
            'question_content'  =>  $question->content,
            'question_round_id'  =>  $question->round_id,
            'question_round_name'=>  $question->round->name,
        ], 200);
    }



    public function delete($id)
    {
        $question = Question::find($id);
        $question->delete();

        return redirect()->back()->with(['message' => 'The Question has Been Deleted Sucessfully']);
    }
}

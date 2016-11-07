<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Answer;

use App\Question;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = Question::where('Questiontype', 0)->get();
        return view('backend.answers.index', ['questions' => $questions]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'answer_1'  =>  'required',
            'answer_1_ckeck'  =>  'integer',
            'answer_2'  =>  'required',
            'answer_2_ckeck'  =>  'integer',
            'answer_3'  =>  'required',
            'answer_3_ckeck'  =>  'integer',
            'answer_4'  =>  'required',
            'answer_4_ckeck'  =>  'integer',
            'question_id'  =>  'required',
        ]);

        Answer::insert(array(
            array(
                'content'       => $request['answer_1'],
                'result'        => $request['answer_1_ckeck'],
                'question_id'   => $request['question_id'],
            ),
            array(
                'content'       => $request['answer_2'],
                'result'        => $request['answer_2_ckeck'],
                'question_id'   => $request['question_id'],
            ),
            array(
                'content'       => $request['answer_3'],
                'result'        => $request['answer_3_ckeck'],
                'question_id'   => $request['question_id'],
            ),
            array(
                'content'       => $request['answer_4'],
                'result'        => $request['answer_4_ckeck'],
                'question_id'   => $request['question_id'],
            ),
        ));

        return redirect()->back()->with(['message' => 'All Answers Inserted SucessFully']);

    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'id'  =>  'integer',
            'answer_content'  =>  'required',
            'answer_question'  =>  'required'
        ]);
        $answer = Answer::find($request['id']);
        $answer->content = $request['answer_content'];
        $answer->question_id = $request['answer_question'];
        $answer->save();

        return redirect()->back()->with(['message' => 'The Answer Updated SucessFully']);
    }


    public function delete($id)
    {
        $answer = Answer::find($id);
        $answer->delete();
        return redirect()->back()->with(['message' => 'The Answer Has Been Deleted Succesfully']);
    }
}

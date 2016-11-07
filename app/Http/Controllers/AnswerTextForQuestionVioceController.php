<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;

use App\Answer;

class AnswerTextForQuestionVioceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = Question::where('Questiontype', 3)->get(); // 1 means answer text for vioce questions questions only
        return view('backend.answers.vioce-text', ['questions' => $questions]);
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
            'answer_content_question_text' => 'required',
            'answer_question_id' => 'required',
        ]);

        $answer = Answer::find($request['id']);
        $answer->content = $request['answer_content_question_text'];
        $answer->question_id = $request['answer_question_id'];
        $answer->save();

        return redirect()->back()->with(['message' => 'The Answer Has Been Updated Successfully']);
    }

    public function delete($id)
    {
        $answer = Answer::find($id);
        $answer->delete();
        return redirect()->back()->with(['message' => 'The Answer Has Been Deleted Successfully']);
    }
}

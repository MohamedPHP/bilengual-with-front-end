<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;
use App\Answer;

class AnswersTextQuestionsShapeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = Question::where('Questiontype', 6)->get(); // 6 means shape questions with answers text
        return view('backend.answers.shape-text', ['questions' => $questions]);
    }

    public function create(Request $request)
    {

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
        $answer = Answer::find($request['id']);
        $answer->content = $request['answercontent'];
        $answer->question_id = $request['questionid'];
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

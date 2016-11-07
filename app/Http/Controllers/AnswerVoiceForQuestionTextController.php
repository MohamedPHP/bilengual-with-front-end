<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Question;

use App\Answer;

class AnswerVoiceForQuestionTextController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = Question::where('Questiontype', 4)->get(); // 4 means text questions with answers vioce
        return view('backend.answers.text-voice', ['questions' => $questions]);
    }
    public function create(Request $request)
    {

        Answer::insert(array(
            array(
                'content'       => $this->upload($request['answer_1']),
                'result'        => $request['answer_1_ckeck'],
                'question_id'   => $request['question_id'],
            ),
            array(
                'content'       => $this->upload($request['answer_2']),
                'result'        => $request['answer_2_ckeck'],
                'question_id'   => $request['question_id'],
            ),
            array(
                'content'       => $this->upload($request['answer_3']),
                'result'        => $request['answer_3_ckeck'],
                'question_id'   => $request['question_id'],
            ),
            array(
                'content'       => $this->upload($request['answer_4']),
                'result'        => $request['answer_4_ckeck'],
                'question_id'   => $request['question_id'],
            ),
        ));

        return redirect()->back()->with(['message' => 'All Answers Inserted SucessFully']);

    }

    public function upload($file){
        $extension = $file->getClientOriginalExtension();
        $sha1 = sha1($file->getClientOriginalName());
        $filename = date('Y-m-d-h-i-s')."_".$sha1.".".$extension;
        $path = public_path('answers/voices');
        $file->move($path, $filename);
        return 'answers/voices/'.$filename;
    }

    public function update(Request $request)
    {
        $answer = Answer::find($request['id']);
        if (!empty($request['answer_vioce_question_text_content'])) {
            unlink(public_path($answer->content));
            $answer->content = $this->upload($request['answer_vioce_question_text_content']);
        }else {
            $content = $answer->content;
            $answer->content = $content;
        }

        $answer->question_id = $request['answer_voice_question_text_question'];
        $answer->save();

        return redirect()->back()->with(['message' => 'The Answer Updated SucessFully']);
    }

    public function delete($id)
    {
        $answer = Answer::find($id);
        if ($answer->content) {
            $public =  public_path($answer->content);
            unlink($public);
        }
        $answer->delete();
        return redirect()->back()->with(['message' => 'The Answer Has Been Deleted Succesfully']);
    }
}

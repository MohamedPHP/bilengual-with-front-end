<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Answer;

use App\Question;

class AnswerShapeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = Question::where('Questiontype', 2)->get(); // 2 means shape questions only
        return view('backend.answers.shape', ['questions' => $questions]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'answer_1'  =>  'required|image',
            'answer_1_ckeck'  =>  'integer',
            'answer_2'  =>  'required|image',
            'answer_2_ckeck'  =>  'integer',
            'answer_3'  =>  'required|image',
            'answer_3_ckeck'  =>  'integer',
            'answer_4'  =>  'required|image',
            'answer_4_ckeck'  =>  'integer',
            'question_id'  =>  'required',
        ]);

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
        $path = public_path('answers/shapes');
        $file->move($path, $filename);
        return 'answers/shapes/'.$filename;
    }



    public function update(Request $request)
    {
        $answer = Answer::find($request['id']);
        if (!empty($request['answer_content'])) {
            unlink(public_path($answer->content));
            $answer->content = $this->upload($request['answer_content']);
        }else {
            $content = $answer->content;
            $answer->content = $content;
        }

        $answer->question_id = $request['answer_question'];
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;

use App\Round;

class QuistionVioceAnswerTextController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = Question::where('Questiontype', 3)->get(); // 3 means voice questions with answers text
        $rounds = Round::all();
        return view('backend.quistions.vioce-text', ['questions' => $questions, 'rounds' => $rounds]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'text_question_answer_text_content' => 'required',
            'text_question_answer_text_game'    => 'required',
        ]);

        $question_text_answer_voice = new Question();
        $question_text_answer_voice->content = $this->upload($request['text_question_answer_text_content']);
        $question_text_answer_voice->round_id = $request['text_question_answer_text_game'];
        $question_text_answer_voice->Questiontype = 3;
        $question_text_answer_voice->save();

        return redirect()->back()->with(['message' => 'The Question Vioce For answer Text Has Been Added Sucessfully']);

    }

    public function upload($file){
        $extension = $file->getClientOriginalExtension();
        $sha1 = sha1($file->getClientOriginalName());
        $filename = date('Y-m-d-h-i-s')."_".$sha1.".".$extension;
        $path = public_path('questions/text-vioce');
        $file->move($path, $filename);
        return 'questions/text-vioce/'.$filename;
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'text_question_answer_text_game_id_update'    => 'required',
        ]);

        $question_text_answer_voice = Question::find($request['id']);
        if (!empty($request['text_question_answer_text_content_update'])) {
            unlink(public_path($question_text_answer_voice->content));
            $question_text_answer_voice->content = $this->upload($request['text_question_answer_text_content_update']);
        }else {
            $content = $question_text_answer_voice->content;
            $question_text_answer_voice->content = $content;
        }
        $question_text_answer_voice->round_id = $request['text_question_answer_text_game_id_update'];
        $question_text_answer_voice->save();

        return redirect()->back()->with(['message' => 'The Question Vioce For answer Text Has Been Updated Sucessfully']);

    }

    public function delete($id)
    {
        $question_text_answer_voice = Question::find($id);
        if ($question_text_answer_voice->content) {
            $public =  public_path($question_text_answer_voice->content);
            unlink($public);
        }
        $question_text_answer_voice->delete();

        return redirect()->back()->with(['message' => 'The Question Vioce For answer Text Has Been Deleted Sucessfully']);
    }
}

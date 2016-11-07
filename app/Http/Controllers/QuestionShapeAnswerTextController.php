<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;

use App\Game;

class QuestionShapeAnswerTextController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = Question::where('Questiontype', 6)->get(); // 6 means shape questions with answers text
        $games = Game::all();
        return view('backend.quistions.shape-text', ['questions' => $questions, 'games' => $games]);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'question_shape_answer_text_content'  => 'required',
            'question_shape_answer_text_game'     => 'required',
        ]);

        $question = new Question();
        $question->content      = $this->upload($request['question_shape_answer_text_content']);
        $question->game_id      = $request['question_shape_answer_text_game'];
        $question->Questiontype = 6;
        $question->save();

        return redirect()->back()->with(['message' => 'The Question Added Sucessfully']);
    }

    public function upload($file){
        $extension = $file->getClientOriginalExtension();
        $sha1 = sha1($file->getClientOriginalName());
        $filename = date('Y-m-d-h-i-s')."_".$sha1.".".$extension;
        $path = public_path('questions/shapes');
        $file->move($path, $filename);
        return 'questions/shapes/'.$filename;
    }

    public function update(Request $request)
    {
        $question = Question::find($request['id']);
        if (!empty($request['question_shape_answer_text_content'])) {
            unlink(public_path($question->content));
            $question->content = $this->upload($request['question_shape_answer_text_content']);
        }else {
            $content = $question->content;
            $question->content = $content;
        }

        $question->game_id = $request['question_shape_answer_text_game'];
        $question->save();

        return redirect()->back()->with(['message' => 'The Answer Updated SucessFully']);
    }

    public function delete($id)
    {
        $question = Question::find($id);
        if ($question->content) {
            $public =  public_path($question->content);
            unlink($public);
        }
        $question->delete();
        return redirect()->back()->with(['message' => 'The Question Has Been Deleted Succesfully']);
    }
}

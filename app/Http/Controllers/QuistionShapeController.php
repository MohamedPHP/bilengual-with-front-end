<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\Round;

class QuistionShapeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = Question::where('Questiontype', 2)->get(); // 2 means shapes questions
        $rounds = Round::all();
        return view('backend.quistions.shapes', ['questions' => $questions, 'rounds' => $rounds]);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'shape_question_content'  =>  'image|required',
            'shape_question_round'     =>  'required',
        ]);

        $question = new Question();
        $question->content      = $this->upload($request['shape_question_content']);
        $question->round_id      = $request['shape_question_round'];
        $question->Questiontype = 2;
        $question->save();

        return redirect()->back()->with(['message' => 'the question added sucessfully']);

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
        $this->validate($request, [
            'shape_question_round'     =>  'required',
        ]);
        $question = Question::find($request['id']);
        if (!empty($request['shape_question_content'])) {
            unlink(public_path($question->content));

            $question->content = $this->upload($request['shape_question_content']);
        }else {
            $content = $question->content;
            $question->content = $content;
        }
        $question->round_id = $request['shape_question_round'];
        $question->save();

        return redirect()->back()->with(['message' => 'the question updated successfully']);
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

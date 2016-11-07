<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use App\Game;

class QuistionVioceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = Question::where('Questiontype', 1)->get(); // 1 means voice questions only
        $games = Game::all();
        return view('backend.quistions.vioce', ['questions' => $questions, 'games' => $games]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'vioce_question_content' => 'required',
            'vioce_question_game'   => 'required'
        ]);
        $question = new Question();
        $question->content = $this->upload($request['vioce_question_content']);
        $question->game_id = $request['vioce_question_game'];
        $question->Questiontype = 1;
        $question->save();

        return redirect()->back()->with(['message' => 'The Vioce Question Added Sucessfully']);
    }
    public function upload($file){
        $extension = $file->getClientOriginalExtension();
        $sha1 = sha1($file->getClientOriginalName());
        $filename = date('Y-m-d-h-i-s')."_".$sha1.".".$extension;
        $path = public_path('questions/voices');
        $file->move($path, $filename);
        return 'questions/voices/'.$filename;
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'vioce_question_content'    => 'required',
            'vioce_question_game'       => 'required',
        ]);

        $question = Question::find($request['voice_id']);
        if ($question->content) {
            $public =  public_path($question->content);
            unlink($public);
        }
        $question->content = $this->upload($request['vioce_question_content']);
        $question->game_id = $request['vioce_question_game'];
        $question->save();

        return redirect()->back()->with(['message' => 'The Field Has Been Updated Sucessfully']);

    }


    public function delete($id)
    {
        $question = Question::find($id);
        if ($question->content) {
            $public =  public_path($question->content);
            unlink($public);
        }
        $question->delete();

        return redirect()->back()->with(['message' => 'Deleted SucessFully']);
    }

}

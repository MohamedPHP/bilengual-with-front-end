<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Quize;

use App\Level;

class QuizesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $quizes = Quize::all();
        $levels = Level::all();
        return view('backend.quizes.quizes', ['quizes' => $quizes, 'levels' => $levels]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name'          =>  'required',
            'quize_level'   =>  'required|numeric'
        ]);

        $quize = new Quize();
        $quize->name     =   $request['name'];
        $quize->level_id =   $request['quize_level'];
        $quize->save();

        return redirect()->back()->with(['message'  =>  'The Quize Has Been Added Sucessfully']);

    }

    public function update(Request $request)
    {
        $quize = Quize::find($request['quizeId']);
        $quize->name     =   $request['Name'];
        $quize->level_id =   $request['LevelNumber'];
        $quize->save();
        return response()->json([
            'name'  => $quize->name,
            'quize_level'   => $quize->level_id
        ], 200);
    }

    public function delete($id)
    {
        $quize = Quize::find($id);
        $quize->delete();

        return redirect()->back()->with(['message' => 'The Quize Deleted Sucessfully']);
    }
}

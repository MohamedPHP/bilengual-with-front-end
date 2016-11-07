<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Level;

class LevelsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $levels = Level::all();
        return view('backend.levels.levels', ['levels'  =>  $levels]);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'number'  =>  'required|numeric|unique:levels'
        ]);

        $level = new Level();
        $level->name = 'level';
        $level->number = $request['number'];
        $level->save();

        return redirect()->back()->with(['message' => 'the level added sucessfully']);
    }
    public function delete($id)
    {
         $level = Level::where('id', $id)->first();
         $level->delete();
         return redirect()->back()->with(['message' => 'level has been deleted']);
    }
}

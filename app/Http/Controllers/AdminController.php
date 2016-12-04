<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\FrontEnd;

use App\Level;
use App\User;
use App\Quize;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function dashboard()
    {
        $levels = Level::all();
        $users = User::all();
        $quizes = Quize::all();
        return view('backend.dashboard', [
            'levels'  =>  $levels,
            'users'  =>  $users,
            'quizes'  =>  $quizes,
        ]);
    }

}

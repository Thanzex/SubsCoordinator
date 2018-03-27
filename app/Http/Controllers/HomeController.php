<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Auth::user()->activeTasks()->with('project:name,id','members:nick')->get();
        $revs = Auth::user()->tasks_manager()->with(['project:name,id','members:nick'])->get();
        $teams = Auth::user()->teams;
        return view('home', ["tasks"=>$tasks , "revs"=>$revs , 'teams' =>$teams ]);
    }
}

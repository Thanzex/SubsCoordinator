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
        $tasks = Auth::user()->activeTasks();
        $revs = Auth::user()->tasks_manager()->get();
        $teams = Auth::user()->teams;
        return view('home', ["tasks"=>$tasks , "revs"=>$revs , 'teams' =>$teams ]);
    }
}

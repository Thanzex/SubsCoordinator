<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index() {
        return view('test',["group" =>  \App\Group::first()->members()->select('nick')->get(),
                            "users" => \App\User::all()]);
    }
}

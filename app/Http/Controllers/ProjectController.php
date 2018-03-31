<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
// namespace App\Rules;
// use Illuminate\Contracts\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = \App\Project::where('active','1')->get();
        return view('project.projects')->with("projects",$projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //Log::debug('project.create');
        //error_log("project.create")
        return view('project.create', ["users" => \App\User::all()]);
        //return "test";

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $utenti_autorizzati = \App\User::where('role','<','5')->get();
        //App\Task::first()->group->members()->attach(App\User::where('nick', '=', 'nick4')->get())
        $validation = $request->validate([
            "name" => "required|unique:projects,name",
            'type' => ["required",Rule::in('Serie','Film')],
            // 'manager' =>    ['required',Rule::exists('users:id')->where('role','<','5')],
        ]);

        $project = new \App\Project;
        $project->name=$request->input('name');
        $project->type=$request->input('type');
        $project->manager=$request->input('manager');
        
        $project->save(); 
        if($request->input('createTeam')) {
            foreach($request->input('groupMember') as $i => $user){
                $project->members()->attach($user,['position' => $i+1] );
                // Log::debug($user);
            }
        }
        return redirect(route('Serie.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function formEdit(Request $request)
    {
        //
        return $this->edit($request->input('project'));
    }

    public function formDestroy(Request $request)
    {
        //
        return $this->destroy($request->input('project'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('project.edit',['data'=>\App\Project::with('members')->find($id),
                                    'users' => \App\User::all(),
                                    'id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validation = $request->validate([
            "name" => "required",
            'type' => ["required",Rule::in('Serie','Film')],
            // 'manager' =>    ['required',Rule::exists('users:id')->where('role','<','5')],
        ]);

        $project = \App\Project::find($id);
        $project->name=$request->input('name');
        $project->type=$request->input('type');
        $project->manager=$request->input('manager');

        $project->save(); 
        if($request->input('createTeam')) {
            $project->members()->detach();
            if ($request->input('groupMember')) {
                foreach($request->input('groupMember') as $i => $user){
                    $project->members()->attach(\App\User::where('nick','=',$user)->get()[0]->id,['position' => $i+1] );
                    // Log::debug($user);
                }
            }   
        }
        return redirect(route('Serie.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //return "deactivating ".$id;
        $project = \App\Project::find($id);
        $project->active = 0;
        $project->save();
        return redirect(route('Serie.index'));
    }
}

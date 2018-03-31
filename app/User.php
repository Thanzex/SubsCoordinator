<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'nick', 'email', 'password', 'role', 'thumb', 'tool', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function groups() 
    // {
    //     return $this->belongsToMany(Group::class);
    // }

    public function tasks() 
    {
        /* $t = collect();
        $g = $this->groups()->get();
        foreach($g as $gruppo) {
            $task=$gruppo->task()->get();
            $t->push($task->push($task[0]->name()));
        }
        return $t; */
        // return $this->groups()->with(['task','task.project:name,id','members:nick']);//->where('active','=','1');
        //return $this->hasManyThrough(Task::class,Group::class);
        return $this->belongsToMany(Task::class);
    }

    public function activeTasks() 
    {
        return $this->tasks()->where('active', '=', '1');
    }

    public function teams() 
    {
        return $this->belongsToMany(Project::class)->where('active','1');
    }

    public function tasks_manager() 
    {
        return $this->HasMany(Task::class, 'manager_id');//->with(['project:name,id','members:nick']);
    }

    public function teams_manager() 
    {
        return $this->belongsToMany(Project::class, 'manager_id');
    }

    public function scores() 
    {
        return $this->hasMany(Score::class);
    }
}

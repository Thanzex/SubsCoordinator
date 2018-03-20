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

    public function groups() {
        return $this->belongsToMany(Group::class);
    }

    public function teams() {
        return $this->belongsToMany(Team::class);
    }

    public function tasks_manager() {
        return $this->belongsToMany(Task::class,'manager_id');
    }

    public function teams_manager() {
        return $this->belongsToMany(Team::class,'manager_id');
    }

    public function groups_manager() {
        return $this->BelongsToMany(Group::class,'manager_id');
    }

    public function scores() {
        return $this->hasMany(Score::class);
    }
}

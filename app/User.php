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
        return $this->belongsToMany('App/Group');
    }

    public function teams() {
        return $this->belongsToMany('App/Team');
    }

    public function tasks_manager() {
        return $this->hasMany('App/Task','manager_id');
    }

    public function teams_manager() {
        return $this->hasMany('App/Team','manager_id');
    }

    public function groups_manager() {
        return $this->hasMany('App/Group','manager_id');
    }

    public function scores() {
        return $this->hasMany('App/Score');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

    protected $fillable = [
        'type', 'name', 'manager', 'team', 'thumb', 'active'
    ];

    public function team() {
        return $this->hasOne('App/Team');
    }

    public function tasks() {
        return $this->hasMany('App/Task');
    }
}

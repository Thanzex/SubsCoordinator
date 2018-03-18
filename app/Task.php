<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //

    protected $fillable = [
        'project_id', 'group_id', 'thumb', 'season', 'episode', 'active', 'manager_id'
    ];

    public function project() {
        return $this->belongsTo('App/Project');
    }

    public function manager() {
        return $this->belongsTo('App/User','manager_id');
    }

    public function scores() {
        return $this->hasMany('App/Score');
    }
}

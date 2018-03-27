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
        return $this->hasOne(Team::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function manager() {
        return $this->belongsTo(User::class,'manager');
    }
}

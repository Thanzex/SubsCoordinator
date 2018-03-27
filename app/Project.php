<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

    protected $fillable = [
        'type', 'name', 'manager', 'thumb', 'active'
    ];

    public function members() {
        return $this->belongsToMany(User::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function manager() {
        return $this->belongsTo(User::class,'manager');
    }
}

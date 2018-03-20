<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    /* protected $fillable =[
        'task_id', 'team', 'manager_id'
    ]; */

    protected $guarded = [];

    public function project() {
        return $this->belongsTo(Task::class);
    }

    public function members() {
        return $this->belongsToMany(User::class);
    }

    public function manager() {
        return $this->hasOne(User::class,'manager_id');
    }
}

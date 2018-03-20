<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //

    /* protected $fillable = [
        'project_id', 'group_id', 'thumb', 'season', 'episode', 'active', 'manager_id','magnet', 'base','facebook','guida'
    ]; */
    protected $guarded =[];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function manager() {
        return $this->belongsTo(User::class,'manager_id');
    }

    public function group() {
        return $this->belongsTo(Group::class);
    }

    public function scores() {
        return $this->hasMany(Score::class);
    }
}

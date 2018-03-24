<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
   /*  protected $fillable =[
        'project_id', 'team', 'manager_id', 'active', 'thumb'
    ]; */

    protected $guarded =[];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function members() {
        return $this->belongsToMany(User::class);
    }

    public function manager() {
        return $this->belongsTo(User::class,'manager_id');
    }
}

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
        return $this->belongsTo('App/Project');
    }

    public function members() {
        return $this->belongsToMany('App/User');
    }

    public function manager() {
        return $this->belongsTo('App/User','manager_id');
    }
}

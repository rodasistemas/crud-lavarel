<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPlanUser extends Model
{
    //
    protected $table='planUsers';
    protected $fillable = [
        'id_user', 'id_plan'
    ];
    public function relUser(){
        return $this->hasOne('App\User','id','id_user');
    }
    public function relPlan(){
        return $this->hasOne('App\Models\ModelPlan','id','id_plan');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPlan extends Model
{
    //
    protected $table='plans';
    public function relPlan(){
        return $this->hasMany('App\Models\ModelPlanUser','id_plan');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EconomicActivities extends Model
{
    public $table='economic_activities';
    public $timestamps = false;

    public function getChildrens(){
        return self::where(['parent_id'=>$this->id])->get();
    }

    public function isParent(){
        return self::where(['parent_id'=>$this->id])->count() > 0;
    }

    public function getParent(){
        return isset($this->parent_id) ? self::where(['id'=>$this->parent_id])->first() : null;
    }

}

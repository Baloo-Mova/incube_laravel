<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EconomicActivity
 */
class EconomicActivity extends Model
{
    protected $table = 'economic_activities';

    public $timestamps = false;

    protected $fillable = [
        'name',
        's_code',
        'parent_id'
    ];

    protected $guarded = [];

    public function getChildrens(){
        return self::where(['parent_id'=>$this->id])->get();
    }

    public function isParent(){
        return self::where(['parent_id'=>$this->id])->count() > 0;
    }

    public function getParent(){
        return isset($this->parent_id) ? self::where(['id'=>$this->parent_id])->first() : null;
    }

    public function gotParent(){
        return $this->parent_id != 0;
    }


        
}
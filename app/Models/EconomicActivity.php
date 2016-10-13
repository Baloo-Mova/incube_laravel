<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EconomicActivity
 *
 * @property integer $id
 * @property string $name
 * @property string $s_code
 * @property integer $parent_id
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EconomicActivity whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EconomicActivity whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EconomicActivity whereSCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EconomicActivity whereParentId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\EconomicActivity $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EconomicActivity[] $childrens
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

    public function parent(){
        return $this->hasOne(EconomicActivity::class,'id','parent_id');
    }

    public function childrens(){
        return $this->hasMany(EconomicActivity::class,'parent_id');
    }

    public function isParent(){
        return  $this->parent_id == null; //count($this->childrens) > 0;
    }

    public function isChildren(){
        return $this->parent_id != 0;
    }


        
}
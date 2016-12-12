<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @property integer $id
 * @property string $name
  */
class Category extends Model
{
    

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'parent_id',
        'publish'
    ];

    protected $guarded = [];

       public function articles()
    {
        return $this->belongsToMany('App\Models\Article');
    } 
    public function parent(){
        return $this->hasOne(Category::class,'id','parent_id');
    }

    public function childrens(){
        return $this->hasMany(Category::class,'parent_id');
    }

    public function isParent(){
        return  $this->parent_id == null; //count($this->childrens) > 0;
    }

    public function isChildren(){
        return $this->parent_id != 0;
    }
}
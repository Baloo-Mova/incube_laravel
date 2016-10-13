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
        'name'
    ];

    protected $guarded = [];

       public function articles()
    {
        return $this->belongsToMany('App\Models\Article');
    } 
}
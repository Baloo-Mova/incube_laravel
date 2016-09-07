<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Stage
 */
class Stage extends Model
{
    protected $table = 'stages';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    protected $guarded = [];

        
}
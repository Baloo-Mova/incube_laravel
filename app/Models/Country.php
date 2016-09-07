<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 */
class Country extends Model
{
    protected $table = 'countries';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'icon'
    ];

    protected $guarded = [];
        
}
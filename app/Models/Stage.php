<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Stage
 *
 * @property integer $id
 * @property string $name
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Stage whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Stage whereName($value)
 * @mixin \Eloquent
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
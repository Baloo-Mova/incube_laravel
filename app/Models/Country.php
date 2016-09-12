<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 *
 * @property integer $id
 * @property string $name
 * @property string $icon
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country whereIcon($value)
 * @mixin \Eloquent
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
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 *
 * @property integer $id
 * @property string $name
 * @property integer $country_id
 * @property-read \App\Models\Country $country
 * @method static \Illuminate\Database\Query\Builder|\App\Models\City whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\City whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\City whereCountryId($value)
 * @mixin \Eloquent
 */
class City extends Model
{
    protected $table = 'cities';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'country_id'
    ];

    protected $guarded = [];

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }
        
}
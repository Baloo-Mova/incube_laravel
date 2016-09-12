<?php

namespace App\Models;

use App\Helpers\SaveFile;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProblemForm
 */
class ProblemForm extends Model
{

    use SaveFile;

    protected $table = 'problem_forms';

    public $timestamps = true;

    protected $fillable = [
        'author_id',
        'publisher_id',
        'status_id',
        'economic_activities_id',
        'country_id',
        'city_id',
        'name',
        'description'
    ];

    protected $guarded = [];
    
    public function economicActivities(){
        return $this->belongsTo('App\Models\EconomicActivity');
    }
    public function country(){
        return $this->belongsTo('App\Models\Country');
    }
    public function city(){
        return $this->belongsTo('App\Models\City');
    }

}
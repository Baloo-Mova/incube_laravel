<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "customer_forms".
 *
 * @property integer $id
 * @property integer $author_id
 * @property integer $publisher_id
 * @property integer $economic_activities_id
 * @property string $problem_name
 * @property string $problem_description
 * @property string $region
 * @property string $other
 * @property string $logo
 * @property string $date_create
 * @property string $date_publish
 * @property integer $status
*/
class Customer extends Model
{
    public $table = "customer_forms";
    public $fillable = [
        'problem_name',
        'problem_description',
        'region',
        'economic_activities_id',
        'other',
        'status',
    ];
    //
    
    public function economicActivities(){
        return $this->belongsTo('App\Models\EconomicActivities');
    }
    
    
}

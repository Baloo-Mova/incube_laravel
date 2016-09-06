<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "investor_forms".
 *
 * @property integer $id
 * @property integer $author_id
 * @property integer $publisher_id
 * @property string $investor_name
 * @property string $short_name
 * @property string $investor_contacts
 * @property string $stage_project
 * @property integer $economic_activities_id
 * @property string $region
 * @property integer $investor_cost
 * @property integer $duration_project
 * @property integer $term_refund
 * @property string $plan_rent
 * @property string $other
 * @property string $logo
 * @property string $date_create
 * @property string $date_publish
 * @property integer $status_id
 *
 */
class Investor extends Model
{
    public $table = "investor_forms";
    public $fillable = [
        'investor_name',
        'short_name',
        'investor_contacts',
        'stage_project',
        'region',
        'investor_cost',
        'duration_project',
        'term_refund',
        'plan_rent',
        'economic_activities_id',
        'other',
        'status',
    ];

    public function economicActivities(){
        return $this->belongsTo('App\Models\EconomicActivities');
    }

    public function status(){
        return $this->belongsTo('App\Models\Status');
    }
}

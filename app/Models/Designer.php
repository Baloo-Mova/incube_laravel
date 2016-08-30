<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "form_offer_project_full".
 *
 * @property integer $id
 * @property integer $author_id
 * @property integer $publisher_id
 * @property integer $economic_activities_id
 * @property string $project_manager
 * @property string $project_contacts
 * @property string $phone
 * @property string $email
 * @property string $web_site
 * @property string $project_name
 * @property string $project_goal
 * @property string $project_aspects
 * @property string $project_beneficaries
 * @property string $description
 * @property integer $project_cost
 * @property string $project_duration
 * @property string $region
 * @property string $project_stage
 * @property string $available_funding
 * @property string $other
 * @property string $logo
 * @property string $project_files
 * @property string $date_create
 * @property string $date_publish
 * @property integer $status
 */
class Designer extends Model {

    //
    public $table = "designer_forms";
    public $fillable = [
        'project_manager',
        'project_contacts',
        'phone',
        'email',
        'web_site',
        'project_name',
        'project_goal',
        'project_aspects',
        'project_beneficaries',
        'description',
        'project_cost',
        'project_duration',
        'region',
        'project_stage',
        'available_funding',
        'economic_activities_id',
        'other',
        'status',
    ];

    public function economicActivities() {
        return $this->belongsTo('App\Models\EconomicActivities');
    }

}

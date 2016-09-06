<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    public $table = "employer_forms";
    public $fillable = [
        'short_name',
        'org_name',
        'org_info',
        'org_type',
        'description',
        'web_site',
        'phone',
        'email',
        'adress',
               
        'economic_activities_id',
        'other',
        'status',
    ];

    public function economicActivities() {
        return $this->belongsTo('App\Models\EconomicActivities');
    }

    public function status(){
        return $this->belongsTo('App\Models\Status');
    }
}

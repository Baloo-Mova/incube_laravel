<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class WorkForm
 */
class WorkForm extends Model
{
    protected $table = 'work_form';

    public $timestamps = true;

    protected $fillable = [
        'author_id',
        'publisher_id',
        'status_id',
        'country_id',
        'city_id',
        'economic_activities_id',
        'name',
        'money',
        'phone',
        'request_email',
        'site',
        'about',
        'requirements',
        'working_conditions',
        'duties',
        'ect',
        'company_name',
        'company_description'
    ];

    protected $guarded = [];

        
}
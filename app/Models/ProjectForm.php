<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectForm
 */
class ProjectForm extends Model
{
    protected $table = 'project_form';

    public $timestamps = true;

    protected $fillable = [
        'author_id',
        'publisher_id',
        'status_id',
        'economic_activities_id',
        'country_id',
        'city_id',
        'stage_id',
        'name',
        'description',
        'web_site',
        'youtube_link',
        'idea',
        'current_situation',
        'field',
        'problem',
        'solution',
        'competition',
        'benefits',
        'buisness_model',
        'money_target',
        'investor_interest',
        'risks'
    ];

    protected $guarded = [];

        
}
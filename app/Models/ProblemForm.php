<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProblemForm
 */
class ProblemForm extends Model
{
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

        
}
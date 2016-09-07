<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InvestorForm
 */
class InvestorForm extends Model
{
    protected $table = 'investor_forms';

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
        'money_count',
        'duration_project',
        'term_refund',
        'plan_rent'
    ];

    protected $guarded = [];

        
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
/**
 * Class ExecutorForm
 */
class ExecutorForm extends Model
{
    protected $table = 'executor_forms';

    public $timestamps = true;

    protected $fillable = [
        'author_id',
        'publisher_id',
        'status_id',
        'executor_fname',
        'executor_sname',
        'executor_thname',
        'date_birth',
        'experience',
        'education',
        'internship',
        'participation_projects',
        'description',
        'adress',
        'phone',
        'contacts',
        'other'
    ];

    protected $guarded = [];


    // public function getDates()
   // {
    //    return ['created_at', 'updated_at', 'date_birth'];
    //}
    
}
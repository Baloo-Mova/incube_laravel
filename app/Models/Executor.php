<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Executor extends Model {

    public $table = "executor_forms";
    public $fillable = [
        'executor_fname',
        'executor_sname',
        'executor_thname',
        'short_name',
        'date_birth',
        'experience',
        'education',
        'internship',
        'participation_projects',
        'description',
        'adress',
        'phone',
        'contacts',
        'other',
        'status',
    ];
    public function status(){
        return $this->belongsTo('App\Models\Status');
    }
}

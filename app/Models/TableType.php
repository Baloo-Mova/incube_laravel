<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TableType
 */
class TableType extends Model
{
    const Investor = 1;
    const Problem = 2;
    const Project = 3;
    const Work = 4;
    const Executor = 5;

    protected $table = 'table_types';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    protected $guarded = [];

        
}
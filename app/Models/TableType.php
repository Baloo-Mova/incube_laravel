<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TableType
 *
 * @property integer $id
 * @property string $name
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TableType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TableType whereName($value)
 * @mixin \Eloquent
 */
class TableType extends Model
{
    const Investor = 1;
    const Problem = 2;
    const Designer = 3;
    const Employer = 4;
    const Executor = 5;

    protected $table = 'table_types';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    protected $guarded = [];

        
}
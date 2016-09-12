<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Status
 *
 * @property integer $id
 * @property string $name
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Status whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Status whereName($value)
 * @mixin \Eloquent
 */
class Status extends Model
{
    public $table = 'statuses';

    const EDITED = 4;
    const NEWS = 1;
    const NEED_EDIT = 3;
    const PUBLISHED = 2;
}

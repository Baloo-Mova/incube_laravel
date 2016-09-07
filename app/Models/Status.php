<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $table = 'statuses';

    const EDITED = 4;
    const NEWS = 1;
    const NEED_EDIT = 3;
    const PUBLISHED = 2;
}

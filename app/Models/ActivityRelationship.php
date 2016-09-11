<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ActivityRelationship extends Model
{
    protected $table = 'activity_relationship';

    public $timestamps = false;

    protected $fillable = [
        'sender_table_id',
        'sender_table_type',
        'receiver_table_id',
        'receiver_table_type'
    ];

    protected $guarded = [];
}
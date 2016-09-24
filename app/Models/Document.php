<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Document
 *
 * @property integer $id
 * @property string $name
 * @property integer $form_id
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Document whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Document whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Document whereFormId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Document whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\UserForm $form
 */
class Document extends Model
{

    protected $table = 'documents';

    public $timestamps = true;

    protected $fillable = [
        'filename'
    ];

    protected $guarded = [];

    public function form(){
        return $this->belongsTo('App\Models\UserForm');
    }
        
}
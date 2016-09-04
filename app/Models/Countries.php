<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "customer_forms".
 *
 * @property integer $id
 * @property integer $name
 * @property integer $icon
 * 
*/
class Countries extends Model
{
    public $table = "countries";
    public $fillable = [
        'name',
        'icon',
        
    ];
    //
    
    
    
    
}

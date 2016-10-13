<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class Article
 *
 * @property integer $id
 * @property integer $author_id
 * @property integer $categories_id
 * @property integer $publisher_id
 * @property integer $status_id
 * @property string $name
 * @property string $description
 * * @property string $logo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 **/
class Article extends Model
{
    protected $table = 'articles';

    public $timestamps = true;

    protected $fillable = [
        'author_id',
        'status_id',
        'category_id',
        'logo',
        'name',
        'description',
        'link'
    ];

    

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function publisher()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    

}
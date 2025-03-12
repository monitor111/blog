<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';
    protected $guarded = false;

    const DELETED_AT = 'deleted_at';


    public function posts() 
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}

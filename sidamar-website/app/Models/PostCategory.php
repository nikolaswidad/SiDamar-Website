<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;
    protected $table = 'posts_categories';
    protected $guarded = ['id'];

    public function getRouteKey()
    {
        return 'slug';
    }
}

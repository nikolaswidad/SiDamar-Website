<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'posts';
    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(PostCategory::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
}

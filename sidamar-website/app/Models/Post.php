<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use SoftDeletes,HasFactory, Sluggable;
    protected $table = 'posts';
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters){

        // $query -> when($filters['search'] ?? false, function($query, $search){
        //     return $query->where('title', 'like', '%' . $search . '%')
        //                 ->orWhere('body', 'like', '%' . $search . '%');
        // });
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
                    ->orWhereHas('author', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('category', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
        });
            });
        });
        

        $query -> when($filters['category'] ?? false, function($query, $category){
            return$query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        });

        $query -> when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('name',$author)
            )
        );

    }

    public function category(){
        return $this->belongsTo(PostCategory::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}


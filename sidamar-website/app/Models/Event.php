<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'events';
    protected $guarded = ['id'];
    
    public function category(){
        return $this->belongsTo(EventCategory::class);
    }

    public function present(){
        return $this->hasOne(Present::class);
    }

    public function attendees()
    {
        return $this->belongsToMany(User::class, 'presents', 'event_id', 'user_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Present extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function present_type(){
        return $this->belongsTo(PresentType::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

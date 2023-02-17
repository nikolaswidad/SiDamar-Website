<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresentType extends Model
{
    use HasFactory;

    public function present(){
        return $this->hasMany(Present::class);
    }
}

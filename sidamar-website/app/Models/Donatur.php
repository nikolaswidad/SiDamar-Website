<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Donatur extends Model
{

    use HasFactory;
    protected $table = 'donatur';
    protected $guarded = ['id'];

    public function donation(){
        return $this->belongsTo(donation::class);
    }

}

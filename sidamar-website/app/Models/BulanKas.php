<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulanKas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pembayaranKas(){
        return $this->hasMany(PembayaranKas::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

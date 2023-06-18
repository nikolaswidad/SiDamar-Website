<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranKas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function bulanKas(){
        return $this->belongsTo(BulanKas::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

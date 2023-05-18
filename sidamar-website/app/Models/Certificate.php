<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $table = 'certificates';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function cstatus(){
        return $this->belongsTo(CertificateStatus::class,'status');
    }

    public function scopeFilter($query, array $filters){
        $query -> when($filters['search'] ?? false, function($query,$search){
            return $query->where('title', 'like', '%' . $search . '%')->orWhereHas('user',function($q) use ($search){
                $q->where('name', 'like', '%' . $search . '%');
            });
        });
    }
}

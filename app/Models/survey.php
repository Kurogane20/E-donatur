<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function staff(){
        return $this->belongsTo(User::class, 'id_staff');
    }

    public function pdon(){
        return $this->belongsTo(penerima_donasi::class, 'id_pdon');
    }
}

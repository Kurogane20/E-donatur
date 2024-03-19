<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class doansi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function donatur() {
        return $this->belongsTo(donatur::class, 'id_donatur');
    }
}

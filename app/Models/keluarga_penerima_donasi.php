<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keluarga_penerima_donasi extends Model
{
    use HasFactory;

   protected $guarded = [];

    public function penerima_donasi() {
        return $this->belongsTo(Penerima_donasi::class, 'id_pdon');
    }
}

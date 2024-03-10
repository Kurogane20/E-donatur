<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donatur extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'full_name',
        'nik',
        'tempat_tanggal_lahir',
        'alamat1',
        'alamat2',
        'kecamatan',
        'kelurahan',
        'kota',
        'kode_pos',
        'nomor_ponsel',
        'nomor_telepon'
    ];
}

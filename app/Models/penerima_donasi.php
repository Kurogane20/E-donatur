<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerima_donasi extends Model
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
        'nomor_telepon',
        'pendidikan_terakhir',
        'status_pekerjaan',
        'pekerjaan_terakhir',
        'tni',
        'pangkat_satuan_terakhir',
        'status'
    ];

    public function keluarga_penerima_donasi()
    {
        return $this->hasMany(keluarga_penerima_donasi::class, 'id_pdon');
    }
}

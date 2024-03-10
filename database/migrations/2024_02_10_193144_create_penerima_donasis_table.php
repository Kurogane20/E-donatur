<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penerima_donasis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name')->nullable();
            $table->integer('nik')->nullable();
            $table->date('tempat_tanggal_lahir')->nullable();
            $table->string('alamat1')->nullable();
            $table->string('alamat2')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kota')->nullable();
            $table->integer('kode_pos')->nullable();
            $table->string('nomor_ponsel')->nullable();
            $table->string('nomor_telepon')->nullable();  
            $table->string('survey_id')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('status_pekerjaan')->nullable();
            $table->string('pekerjaan_terakhir')->nullable();
            $table->string('tni')->nullable();
            $table->string('pangkat_satuan_terakhir')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima_donasis');
    }
};

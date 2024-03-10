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
        Schema::create('doansis', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal')->nullable();
            $table->string('id_donatur')->nullable();
            $table->string('jenis_donasi')->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doansis');
    }
};

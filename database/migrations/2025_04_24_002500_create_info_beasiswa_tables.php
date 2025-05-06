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
        Schema::create('info_beasiswa', function (Blueprint $table) {
            $table->id('id_beasiswa'); // Primary key
            $table->string('nama_beasiswa')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('tanggal_buka')->nullable();
            $table->string('tanggal_tutup')->nullable();
            $table->string('cover')->nullable();
            $table->text('kategori')->nullable();
            $table->string('url_sumber')->nullable();
            $table->string('url_panduan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_beasiswa');
    }
};

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
            $table->string('nama_beasiswa');
            $table->text('deskripsi')->nullable();
            $table->string('tanggal_buka');
            $table->string('tanggal_tutup');
            $table->string('cover')->nullable();
            $table->string('kategori');
            $table->string('url_sumber')->nullable();
            $table->string('url_panduan')->nullable();
            $table->string('keyword')->nullable();
            $table->timestamps(); // created_at & updated_at
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

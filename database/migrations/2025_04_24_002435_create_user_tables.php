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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user'); // Primary key
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('tanggal_lahir');
            $table->string('username')->unique();
            $table->string('foto')->nullable(); // Opsional
            $table->enum('jenis_kelamin', ['L', 'P']); // Contoh: L = Laki-laki, P = Perempuan
            $table->text('deskripsi')->nullable(); // Opsional
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

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
        Schema::create('history', function (Blueprint $table) {
            $table->id('id_history'); // Primary key
            $table->date('tanggal');
            $table->text('query');
            $table->unsignedBigInteger('id_user'); // Foreign key

            // Relasi ke tabel users
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history');
    }
};

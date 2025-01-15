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
        Schema::create('materi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas');
            $table->unsignedBigInteger('mapel_id')->constrained('mapel')->nullable();
            $table->string('nama_materi')->nullable();
            $table->longText('isi_materi');
            $table->unsignedBigInteger('guru_id');
            $table->timestamps();
            $table->foreign('guru_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('mapel_id')
            ->references('id')
            ->on('mapel')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};
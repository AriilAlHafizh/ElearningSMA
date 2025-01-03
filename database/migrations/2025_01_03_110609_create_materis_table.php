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
            $table->string('nama_mapel');
            $table->longText('isi_materi');
            $table->unsignedBigInteger('guru_id');
            $table->timestamps();

            // Membuat hubungan foreign key ke tabel materis
            $table->foreign('guru_id')
            ->references('id')
            ->on('guru')
            ->onDelete('cascade'); // Opsional: Menghapus data terkait saat data induk dihapus
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
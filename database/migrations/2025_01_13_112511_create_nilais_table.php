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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->string('nilai')->nullable();
            $table->unsignedBigInteger('mapel_id')->constrained('mapel');
            $table->unsignedBigInteger('siswa_id')->constrained('siswa');
            $table->timestamps();

            // Membuat hubungan foreign key 
            $table->foreign('mapel_id')
            ->references('id')
            ->on('mapel')
            ->onDelete('cascade'); // Opsional: Menghapus data terkait saat data induk dihapus

            $table->foreign('siswa_id')
            ->references('id')
            ->on('siswa')
            ->onDelete('cascade'); // Opsional: Menghapus data terkait saat data induk dihapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
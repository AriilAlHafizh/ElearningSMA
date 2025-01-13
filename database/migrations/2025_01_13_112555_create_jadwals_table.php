<?php

use App\Models\hari;
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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->enum('hari',[Hari::SENIN->value, Hari::SELASA->value, Hari::RABU->value, Hari::KAMIS->value, Hari::JUMAT->value]);
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->unsignedBigInteger('materi_id')->constrained('materi')->nullable();
            $table->unsignedBigInteger('mapel_id')->constrained('mapel')->nullable();
            $table->timestamps();

            $table->foreign('materi_id')
            ->references('id')
            ->on('materi')
            ->onDelete('cascade'); // Opsional: Menghapus data terkait saat data induk dihapus

            $table->foreign('mapel_id')
            ->references('id')
            ->on('mapel')
            ->onDelete('cascade'); // Opsional: Menghapus data terkait saat data induk dihapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
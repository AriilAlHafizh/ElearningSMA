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
            $table->string('nilai');
            $table->unsignedBigInteger('materi_id');
            $table->timestamps();

            // Membuat hubungan foreign key 
            $table->foreign('materi_id')
            ->references('id')
            ->on('nilai')
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

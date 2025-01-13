<?php

use App\Models\gender;
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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->string('nama');
            $table->date('tgl_lahir');
            $table->enum('gender', [Gender::PRIA->value, Gender::WANITA->value]);
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('no_hp');
            $table->string('alamat');
            $table->string('foto')->nullable();
            $table->enum('role', ['siswa'])->nullable(); // Kolom ENUM
            $table->unsignedBigInteger('materi_id')->constrained('materi')->nullable();
            $table->timestamps();


            $table->foreign('materi_id')
            ->references('id')
            ->on('materi')
            ->onDelete('cascade'); // Opsional: Menghapus data terkait saat data induk dihapus

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
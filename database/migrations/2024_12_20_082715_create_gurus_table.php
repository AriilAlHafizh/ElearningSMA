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
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('gender', [Gender::PRIA->value, Gender::WANITA->value]);
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('no_hp');
            $table->string('alamat');
            $table->string('foto');
            $table->enum('role', ['guru'])->nullable(); // Kolom ENUM
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};

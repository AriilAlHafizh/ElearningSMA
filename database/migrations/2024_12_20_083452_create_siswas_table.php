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
            $table->string('nama');
            $table->date('tgl_lahir');
            $table->enum('gender', [gender::PRIA->value, gender::WANITA->value]);
            $table->string('email');
            $table->string('no_hp');
            $table->string('alamat');
            $table->timestamps();

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

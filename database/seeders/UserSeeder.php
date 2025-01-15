<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nis' => '0',
            'nama' => 'Admin',
            'gender' => 'pria',
            'tgl_lahir' => '2025-01-14',
            'email' => 'admin@gmail.com',
            'no_hp' => '0',
            'alamat' => 'a',
            'role' => 'admin',
            'password' => Hash::make('admin')
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\mapel;

class mapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        mapel::insert([
            ['nama_mapel' => 'Pendidikan Agama dan Budi Pekerti'],
            ['nama_mapel' => 'Pendidikan Pancasila'],
            ['nama_mapel' => 'Bahasa Indonesia'],
            ['nama_mapel' => 'Matematika'],
            ['nama_mapel' => 'Bahasa Inggris'],
            ['nama_mapel' => 'Pendidikan Jasmani'],
            ['nama_mapel' => 'Olahraga dan Kesehatan'],
            ['nama_mapel' => 'Sejarah'],
            ['nama_mapel' => 'Seni dan Budaya'],
            
        ]);
    }
}

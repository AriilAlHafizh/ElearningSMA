<?php

namespace App\Http\Controllers;

use App\Models\materi;
use Illuminate\Http\Request;

class siswa extends Controller
{
    public function indexsiswa()
    {   
        return view('siswa.materisiswa');
    }

    public function dashboardsiswa()
    {
        return view('siswa.dashboardsiswa');
    }

    public function nilaisiswa()
    {
        return view('siswa.nilaisiswa');
    }

    public function jadwalsiswa()
    {
        return view('siswa.jadwalsiswa');
    }

    public function profilesiswa()
    {
        return view('siswa.profilesiswa');
    }
}

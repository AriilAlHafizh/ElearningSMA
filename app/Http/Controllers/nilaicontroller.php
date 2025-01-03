<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\materi;
use App\Models\nilai;

class nilaicontroller extends Controller
{
    //
    public function create()
    {   
        $dtnilai = nilai::with('materi')->get();
        $materis = materi::all(); // Mengambil semua data materi

        return view('guru.nilaiguru',compact('dtnilai','materis'));
    }

    public function storenilai(Request $request)
    {
        $request->validate([
            'nilai' => 'required|string|max:255',
            'materi_id' => 'required|string|max:20',
        ]);

        // Simpan data ke database (gunakan model jika sudah ada)
        nilai::create([
            'nilai' => $request->nilai,
            'materi_id' => $request->materi_id,
        ]);


        return redirect()->route('nilai.guru')->with('success', 'Nilai berhasil ditambahkan!');
    }
}

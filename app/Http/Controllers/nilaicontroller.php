<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\materi;
use App\Models\nilai;
use App\Models\mapel;
use App\Models\User;

class nilaicontroller extends Controller
{
    //
    public function create()
    {   
        $dtnilai = nilai::with('mapel','siswa')->get();
        $mapels = mapel::all(); // Mengambil semua data materi
        $siswas = User::where('role', '=', 'siswa')->get();


        return view('guru.nilaiguru',compact('dtnilai','mapels','siswas'));
    }

    public function storenilai(Request $request)
    {
        $request->validate([
            'nilai' => 'required|string|max:255',
            'mapel_id' => 'required|string|max:20',
            'siswa_id' => 'required|string|max:20',
        ]);

        // Simpan data ke database (gunakan model jika sudah ada)
        nilai::create([
            'nilai' => $request->nilai,
            'mapel_id' => $request->mapel_id,
            'siswa_id' => $request->siswa_id,
        ]);


        return redirect()->route('guru.nilai')->with('success', 'Nilai berhasil ditambahkan!');
    }

    public function updatenilai(Request $request, string $id)
    {
        // Validasi data yang masuk
        $request->validate([
            'nilai' => 'required|string|max:255',
            'mapel_id' => 'required|string|max:20',
            'siswa_id' => 'required|string|max:20',
        ]);

        $nilai = nilai::findOrFail($id);

        $nilai->update([
            'nilai' => $request->nilai,
            'mapel_id' => $request->mapel_id,
            'siswa_id' => $request->siswa_id,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data jadwal berhasil diperbarui.');
    }

    public function destroynilai(string $id)
    {
        $nilai = Nilai::findOrFail($id); 
        $nilai->delete();

        return redirect()->back()->with('success', 'Guru berhasil dihapus.');

        
    }
}

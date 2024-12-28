<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\materi;

class matericontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $dtmateri = materi::with('guru')->get();

        return view('guru.materiguru',compact('dtmateri'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function dashboard()
    {
        return view('guru.dashboardguru');
    }

    public function nilai()
    {
        return view('guru.nilaiguru');
    }

    public function jadwal()
    {
        return view('guru.jadwalguru');
    }

    public function profile()
    {
        return view('guru.profileguru');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'nama_mapel' => 'required|string|max:255',
            'isi_materi' => 'required|file|mimes:pdf,docx|max:2048',
            'guru_id' => 'required|string|max:20',
        ]);

        // Simpan file materi
        $file = $request->file('isi_materi')->store('materi', 'public');

        // Simpan data ke database (gunakan model jika sudah ada)
        materi::create([
            'nama_kelas' => $request->nama_kelas,
            'nama_mapel' => $request->nama_mapel,
            'guru_id' => $request->guru_id,
            'isi_materi' => $file,  // Simpan path file
        ]);


        return redirect()->route('materi.guru')->with('success', 'Materi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function download($id)
    {
        // Ambil data materi berdasarkan ID
        $materi = Materi::findOrFail($id);

        // Lokasi file materi yang ingin diunduh
        $filePath = storage_path('app/public/' . $materi->isi_materi);

        // Cek apakah file ada
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan');
        }
    }
}

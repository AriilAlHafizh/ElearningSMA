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
    public function create()
    {
        return view('guru.materiguru');
    }

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
            'nama_mapel' => 'required|string|max:255',
            'isi_materi' => 'required|file|mimes:pdf,docx|max:2048',
            'guru_id' => 'required|string|max:20',
        ]);

        // Simpan file materi
        $file = $request->file('file')->store('materi', 'public');

        // Simpan data ke database (gunakan model jika sudah ada)
        materi::create([
            'nama_mapel' => $request->nama_mapel,
            'guru_id' => $request->guru_id,
            'isi_materi' => $file,  // Simpan path file
        ]);


        return redirect()->route('materiguru')->with('success', 'Materi berhasil ditambahkan!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

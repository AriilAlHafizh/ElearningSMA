<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\materi;
use App\Models\jadwal;
use App\Models\mapel;
use App\Models\User;

class matericontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dtmateri = Materi::with('guru', 'mapel')->get();
        $gurus = User::where('role', '=', 'guru')->get(); // Mengambil semua data guru
        $mapels = Mapel::all(); // Mengambil semua data guru

        return view('guru.materiguru', compact('dtmateri', 'gurus', 'mapels'));
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
        $dtjadwal = jadwal::with('materi')->get();
        $materis = materi::all(); // Mengambil semua data materi

        return view('guru.jadwalguru', compact('dtjadwal', 'materis'));
    }

    public function profile()
    {
        $gurus = User::where('role', 'guru')->get();
        return view('guru.profileguru',compact('gurus'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'mapel_id' => 'required|string|max:20',
            'nama_materi' => 'required|string|max:255',
            'isi_materi' => 'required|file|mimes:pdf,docx|max:2048',
            'guru_id' => 'required|string|max:20',
        ]);

        // Simpan file materi ke folder public/uploads
        $file = $request->file('isi_materi');
        $fileName = time() . '_' . $file->getClientOriginalName(); // Tambahkan timestamp untuk nama unik
        $filePath = $file->move(public_path('uploads'), $fileName);

        // Simpan data ke database (gunakan model jika sudah ada)
        materi::create([
            'nama_kelas' => $request->nama_kelas,
            'mapel_id' => $request->mapel_id,
            'nama_materi' => $request->nama_materi,
            'guru_id' => $request->guru_id,
            'isi_materi' => 'uploads/' . $fileName, // Simpan path relatif
        ]);


        return redirect()->route('guru.materi')->with('success', 'Materi berhasil ditambahkan!');
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
        // Validasi data yang masuk
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'mapel_id' => 'nullable|exists:mapel,id',
            'nama_materi' => 'required|string|max:255',
            'guru_id' => 'nullable|exists:users,id', // Validasi id_guru
            'isi_materi' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx|max:2048', // Validasi file
        ]);

        // Cari materi berdasarkan ID
        $materi = Materi::findOrFail($id);

        // Cek apakah ada file yang diunggah
        if ($request->hasFile('isi_materi')) {
            // Hapus file lama jika ada
            if ($materi->isi_materi && file_exists(public_path('uploads/' . $materi->isi_materi))) {
                unlink(public_path('uploads/' . $materi->isi_materi));
            }

            // Simpan file materi ke folder public/uploads
            $file = $request->file('isi_materi');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Tambahkan timestamp untuk nama unik
            $filePath = $file->move(public_path('uploads'), $fileName);

            // Update nama file di database
            $materi->isi_materi = $fileName;
        }

        // Perbarui data lain
        $materi->update([
            'nama_kelas' => $request->nama_kelas,
            'mapel_id' => $request->mapel_id,
            'nama_materi' => $request->nama_materi,
            'guru_id' => $request->guru_id,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Materi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materi = Materi::findOrFail($id); // Pastikan model Materi ada
        $materi->delete();

        return redirect()->back()->with('success', 'Materi berhasil dihapus.');
    }
    public function download($id)
    {
        // Ambil data materi berdasarkan ID
        $materi = Materi::findOrFail($id);

        // Lokasi file materi yang ingin diunduh
        $filePath = public_path($materi->isi_materi);

        // Cek apakah file ada
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }
    }
}

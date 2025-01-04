<?php

namespace App\Http\Controllers;

use App\Models\materi;
use App\Models\guru;
use App\Models\jadwal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class jadwalcontroller extends Controller
{
    public function jadwaladmin()
    {
        $dtjadwal = jadwal::with('materi', 'guru')->get();
        $materis = materi::all(); // Mengambil semua data materi
        $gurus = guru::all();

        return view('admin.jadwaladmin', compact('dtjadwal', 'materis', 'gurus'));
    }

    public function storejadwal(Request $request)
    {
        $request->validate([
            'hari' => 'required|string|max:255',
            'jam_mulai' => 'required|string|max:255',
            'jam_selesai' => 'required|string|max:255',
            'guru_id' => 'required|string|max:255',
            'materi_id' => 'required|string|max:20',
        ]);

        // Simpan data ke database (gunakan model jika sudah ada)
        jadwal::create([
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'guru_id' => $request->guru_id,
            'materi_id' => $request->materi_id,

        ]);


        return redirect()->route('jadwal.admin')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function updatejadwal(Request $request, string $id)
    {
        // Validasi data yang masuk
        $request->validate([
            'hari' => 'required|string|max:255',
            'jam_mulai' => 'required|string|max:255',
            'jam_selesai' => 'required|string|max:255',
            'guru_id' => 'required|string|max:255',
            'materi_id' => 'required|string|max:20',
        ]);

        $jadwal = jadwal::findOrFail($id);

        $jadwal->update([
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'guru_id' => $request->guru_id,
            'materi_id' => $request->materi_id,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data jadwal berhasil diperbarui.');
    }

    public function destroyjadwal(string $id)
    {
        $jadwal = jadwal::findOrFail($id); // Pastikan model Materi ada
        $jadwal->delete();

        return redirect()->back()->with('success', 'Jadwal berhasil dihapus.');

        
    }
}

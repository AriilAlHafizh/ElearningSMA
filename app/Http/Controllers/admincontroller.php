<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\guru;
use App\Models\materi;
use App\Models\nilai;
use App\Models\siswa;


class admincontroller extends Controller
{
    public function indexadmin()
    {
        return view('admin.materiadmin');
    }

    public function dataguru()

    {
        $dtguru = Guru::all(); // Mengambil data guru dari database
        return view('admin.guruadmin', compact('dtguru')); // Kirim data guru ke view
    }

    public function storeguru(Request $request)
    {
        // Validasi input data (optional)
        $request->validate([
            'nama' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Menangani upload foto jika ada
        if ($request->hasFile('foto')) {
            // Menyimpan foto ke folder 'photos' di public storage dan mendapatkan path-nya
            $photoPath = $request->file('foto')->store('photos', 'public');
        } else {
            $photoPath = null; // Jika tidak ada foto, set menjadi null
        }

        // Simpan data guru ke database
        Guru::create([
            'nama' => $request->nama,
            'gender' => $request->gender,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'foto' => $photoPath,
        ]);

        // Redirect ke halaman guru dengan pesan sukses
        return redirect()->route('admin.guru')->with('success', 'Guru berhasil ditambahkan!');
    }

    public function update(Request $request, string $id)
    {
        // Validasi data yang masuk
        $request->validate([
            'nama' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Cari guru berdasarkan ID
        $guru = Guru::findOrFail($id);

        // Cek apakah ada file yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus file lama jika ada
            if ($guru->foto && file_exists(public_path('uploads/' . $guru->foto))) {
                unlink(public_path('uploads/' . $guru->foto));
            }

            // Upload file baru
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);

            // Update nama file di database
            $guru->foto = $fileName;
        }

        // Perbarui data lain
        $guru->update([
            'nama' => $request->nama,
            'gender' => $request->gender,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroyguru(string $id)
    {
        $guru = Guru::findOrFail($id); // Pastikan model Materi ada
        $guru->delete();

        return redirect()->back()->with('success', 'Guru berhasil dihapus.');

        
    }
    public function dashboardadmin()
    {
        return view('admin.dashboardadmin');
    }

    public function nilaiadmin()
    {
        return view('admin.nilaiadmin');
    }

    public function jadwaladmin()
    {
        return view('admin.jadwaladmin');
    }

    public function profileadmin()
    {
        return view('admin.profileadmin');
    }
}

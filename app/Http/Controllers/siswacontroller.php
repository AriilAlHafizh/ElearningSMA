<?php

namespace App\Http\Controllers;

use App\Models\gender;
use App\Models\materi;
use Illuminate\Http\Request;
use App\Models\nilai;
use App\Models\siswa;


class siswacontroller extends Controller
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

    public function datasiswa()
    {
        $dtsiswa = siswa::all();
        // $materis = materi::all(); // Mengambil semua data materi
        // $nilai = nilai::all(); // Mengambil semua data nilai

        return view('admin.siswaadmin',compact('dtsiswa'));
    }

    public function storesiswa(Request $request)
{
    // Validasi input data
    $request->validate([
        'nis' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'tgl_lahir' => 'required|date',
        'gender' => 'required|in:pria,wanita',
        'email' => 'required|email|max:255',
        'no_hp' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    

    // Menangani upload foto
    if ($request->hasFile('foto')) {
        // Menyimpan foto ke folder 'photos' di public storage dan mendapatkan path-nya
        $photoPath = $request->file('foto')->store('photos', 'public');
    } else {
        $photoPath = null; // Jika tidak ada foto, set menjadi null
    }

    // Simpan data siswa ke database
    siswa::create([
        'nis' => $request->nis,
        'nama' => $request->nama,
        'tgl_lahir' => $request->tgl_lahir,
        'gender' => $request->gender,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
        'alamat' => $request->alamat,
        'foto' => $photoPath,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('admin.siswa')->with('success', 'Siswa berhasil ditambahkan!');
}

public function updatesiswa(Request $request, string $id)
    {
        // Validasi data yang masuk
        $request->validate([
            'nis' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'gender' => 'required|in:pria,wanita',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Cari guru berdasarkan ID
        $siswa = Siswa::findOrFail($id);

        // Cek apakah ada file yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus file lama jika ada
            if ($siswa->foto && file_exists(public_path('uploads/' . $siswa->foto))) {
                unlink(public_path('uploads/' . $siswa->foto));
            }

            // Upload file baru
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);

            // Update nama file di database
            $siswa->foto = $fileName;
        }

        // Perbarui data lain
        $siswa->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'gender' => $request->gender,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroysiswa(string $id)
    {
        $siswa = Siswa::findOrFail($id); // Pastikan model Materi ada
        $siswa->delete();

        return redirect()->back()->with('success', 'Siswa berhasil dihapus.');

        
    }





}

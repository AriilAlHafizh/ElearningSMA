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






}

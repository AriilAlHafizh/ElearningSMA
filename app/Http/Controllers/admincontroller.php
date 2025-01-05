<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\guru;
use App\Models\materi;
use App\Models\nilai;
use App\Models\siswa;
use App\Models\gender;


class admincontroller extends Controller
{
    public function indexadmin()
    {
        $dtmateriadmin = materi::with('guru')->get();
        $guruadmin = Guru::all(); // Mengambil semua data guru

        return view('admin.materiadmin',compact('dtmateriadmin','guruadmin'));
    }

    public function materistore(Request $request)
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


        return redirect()->route('materi.admin')->with('success', 'Materi berhasil ditambahkan!');
    }

    public function materiupdate(Request $request, string $id)
    {
        // Validasi data yang masuk
    $request->validate([
        'nama_kelas' => 'required|string|max:255',
        'nama_mapel' => 'required|string|max:255',
        'guru_id' => 'nullable|exists:guru,id', // Validasi id_guru
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

        // Upload file baru
        $file = $request->file('isi_materi');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName);

        // Update nama file di database
        $materi->isi_materi = $fileName;
    }

    // Perbarui data lain
    $materi->update([
        'nama_kelas' => $request->nama_kelas,
        'nama_mapel' => $request->nama_mapel,
        'guru_id' => $request->guru_id,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Materi berhasil diperbarui.');
    }

    public function materidestroy(string $id)
    {
        $materi = Materi::findOrFail($id); // Pastikan model Materi ada
        $materi->delete();

        return redirect()->back()->with('success', 'Materi berhasil dihapus.');

        
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
            'gender' => 'required|in:pria,wanita',
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
            'gender' => 'required|in:pria,wanita',
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
        $dtnilai = nilai::with('materi','siswa')->get();
        $materis = materi::all(); // Mengambil semua data materi
        $siswas = siswa::all();


        return view('admin.nilaiadmin',compact('dtnilai','materis','siswas'));
    }

    public function storenilaiadmin(Request $request)
    {
        $request->validate([
            'nilai' => 'required|string|max:255',
            'materi_id' => 'required|string|max:20',
            'siswa_id' => 'required|string|max:20',
        ]);

        // Simpan data ke database (gunakan model jika sudah ada)
        nilai::create([
            'nilai' => $request->nilai,
            'materi_id' => $request->materi_id,
            'siswa_id' => $request->siswa_id,
        ]);


        return redirect()->route('nilai.admin')->with('success', 'Nilai berhasil ditambahkan!');
    }

    public function updatenilaiadmin(Request $request, string $id)
    {
        // Validasi data yang masuk
        $request->validate([
            'nilai' => 'required|string|max:255',
            'materi_id' => 'required|string|max:20',
            'siswa_id' => 'required|string|max:20',
        ]);

        $nilai = nilai::findOrFail($id);

        $nilai->update([
            'nilai' => $request->nilai,
            'materi_id' => $request->materi_id,
            'siswa_id' => $request->siswa_id,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data jadwal berhasil diperbarui.');
    }

    public function destroynilaiadmin(string $id)
    {
        $nilai = Nilai::findOrFail($id); 
        $nilai->delete();

        return redirect()->back()->with('success', 'Guru berhasil dihapus.');

        
    }


    public function jadwaladmin()
    {
        return view('admin.jadwaladmin');
    }

    

    public function downloadadmin($id)
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

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\materi;
use App\Models\nilai;
use App\Models\mapel;
use App\Models\gender;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class admincontroller extends Controller
{
    public function indexadmin()
    {
        $dtmateriadmin = materi::with('guru', 'mapel')->get();
        $guruadmin = User::where('role', '=', 'guru')->get(); // Mengambil semua data guru
        $mapeladmin = Mapel::all(); // Mengambil semua data mapel

        return view('admin.materiadmin', compact('dtmateriadmin', 'guruadmin', 'mapeladmin'));
    }

    public function materistore(Request $request)
    {
        try {
            $request->validate([
                'nama_kelas' => 'required|string|max:255',
                'mapel_id' => 'required|string|max:20',
                'nama_materi' => 'required|string|max:255',
                'isi_materi' => 'required|file|mimes:pdf,docx|max:2048',
                'guru_id' => 'required|string|max:20',
            ]);

            // Simpan file materi
            $file = $request->file('isi_materi')->store('materi', 'public');

            // Simpan data ke database (gunakan model jika sudah ada)
            materi::create([
                'nama_kelas' => $request->nama_kelas,
                'mapel_id' => $request->mapel_id,
                'nama_materi' => $request->nama_materi,
                'guru_id' => $request->guru_id,
                'isi_materi' => $file,  // Simpan path file
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }


        return redirect()->route('admin.materi')->with('success', 'Materi berhasil ditambahkan!');
    }

    public function materiupdate(Request $request, string $id)
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
            'mapel_id' => $request->mapel_id,
            'nama_materi' => $request->nama_materi,
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
        $dtguru = User::where('role', '=', 'guru')->get();
        return view('admin.guruadmin', compact('dtguru')); // Kirim data guru ke view
    }

    public function storeguru(Request $request)
    {
        // Validasi input data (optional)
        $request->validate([
            'nama' => 'required|string|max:255',
            'gender' => 'required|in:pria,wanita',
            'email' => 'required|string|max:255',
            'tgl_lahir' => 'required|string|max:255',
            'password' => 'required|string|max:255',
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
        User::create([
            'nama' => $request->nama,
            'gender' => $request->gender,
            'email' => $request->email,
            'tgl_lahir' => $request->tgl_lahir,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'foto' => $photoPath,
            'role' => 'guru'
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
            'tgl_lahir' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $guru = User::findOrFail($id);

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

        if ($request->password != null) {
            $guru->update([
                'nama' => $request->nama,
                'gender' => $request->gender,
                'email' => $request->email,
                'tgl_lahir' => $request->tgl_lahir,
                'password' => $request->password,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
            ]);
        } else {
            $guru->update([
                'nama' => $request->nama,
                'gender' => $request->gender,
                'email' => $request->email,
                'tgl_lahir' => $request->tgl_lahir,
                'password' => $request->password,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
            ]);
        }

        return redirect()->back()->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroyguru(string $id)
    {
        $guru = User::findOrFail($id); // Pastikan model Materi ada
        $guru->delete();

        return redirect()->back()->with('success', 'Guru berhasil dihapus.');
    }
    public function dashboardadmin()
    {
        return view('admin.dashboardadmin');
    }

    public function nilaiadmin()
    {
        $dtnilai = nilai::with('mapel', 'siswa')->get();
        $mapels = mapel::all(); // Mengambil semua data materi
        $siswas = User::where('role', '=', 'siswa')->get();


        return view('admin.nilaiadmin', compact('dtnilai', 'mapels', 'siswas'));
    }

    public function storenilaiadmin(Request $request)
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


        return redirect()->route('admin.nilai')->with('success', 'Nilai berhasil ditambahkan!');
    }

    public function updatenilaiadmin(Request $request, string $id)
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

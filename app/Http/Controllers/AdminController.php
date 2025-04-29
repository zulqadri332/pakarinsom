<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Diagnosa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Ambil semua gejala yang ada di database
        $gejalas = Gejala::all();
        return view('admin.dashboard', compact('gejalas'));
    }

    public function storeGejala(Request $request)
    {
        // Validasi input dari admin
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|in:primer,sekunder',
        ]);

        // Cek apakah kolom kode diisi secara otomatis (misal, menggunakan ID)
        $kode = 'G' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 6)); // Generasi kode unik, contoh "G3d2f1b"

        // Simpan gejala baru
        Gejala::create([
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'kode' => $kode, // Mengisi kolom kode
        ]);

        // Kembali ke dashboard admin dengan pesan sukses
        return redirect()->route('admin.dashboard')->with('success', 'Gejala berhasil ditambahkan!');
    }

    public function riwayatDiagnosa()
    {
    $riwayat = Diagnosa::with('pasien')->latest()->get();
    return view('admin.riwayat', compact('riwayat'));
    }
}

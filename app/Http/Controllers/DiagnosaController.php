<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Pasien;
use App\Models\Diagnosa;

class DiagnosaController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::all(); // Ambil semua gejala dari database
        return view('diagnosa.index', compact('gejalas'));
    }

    public function prosesDiagnosa(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'usia' => 'required|integer',
            'jenis_kelamin' => 'required|in:L,P',
            'gejala' => 'required|array|min:1',
        ]);

        $gejalaInput = $request->gejala;

        // Simpan data pasien
        $pasien = Pasien::create([
            'nama' => $request->nama,
            'usia' => $request->usia,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        // Data latih sementara (contoh id gejala untuk setiap kelas)
        $dataLatih = [
            'primer' => [1, 2, 3, 4, 5],
            'sekunder' => [1, 2, 6, 7],
        ];

        $kelas = ['primer', 'sekunder', 'tidak_insomnia'];
        $hasilProb = [];

        // Hitung prior (P(Kelas))
        $totalData = count($dataLatih['primer']) + count($dataLatih['sekunder']);
        $prior = [
            'primer' => count($dataLatih['primer']) / $totalData,
            'sekunder' => count($dataLatih['sekunder']) / $totalData,
            'tidak_insomnia' => 0.1, // diasumsikan
        ];

        foreach ($kelas as $k) {
            $prob = $prior[$k] ?? 0.1;
            foreach ($gejalaInput as $gejalaId) {
                if ($k !== 'tidak_insomnia') {
                    $frekuensi = in_array($gejalaId, $dataLatih[$k]) ? 1 : 0;
                    $prob *= ($frekuensi + 1) / (count($dataLatih[$k]) + 2); // Laplace smoothing
                } else {
                    $prob *= 1 / 10; // Asumsi probabilitas gejala jika tidak insomnia
                }
            }
            $hasilProb[$k] = $prob;
        }

        // Tentukan hasil akhir dengan probabilitas tertinggi
        $diagnosaAkhir = array_search(max($hasilProb), $hasilProb);

        // Simpan hasil diagnosa
        Diagnosa::create([
            'pasien_id' => $pasien->id,
            'hasil' => $diagnosaAkhir,
        ]);

        return view('diagnosa.hasil', [
            'pasien' => $pasien,
            'hasil' => $diagnosaAkhir,
            'probabilitas' => $hasilProb,
        ]);
    }
}

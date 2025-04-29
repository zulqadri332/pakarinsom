@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Hasil Diagnosa Insomnia</h1>

    <div class="bg-white p-4 rounded shadow mb-4">
        <h2 class="text-xl font-semibold mb-2">Data Pasien</h2>
        <p><strong>Nama:</strong> {{ $pasien->nama }}</p>
        <p><strong>Usia:</strong> {{ $pasien->usia }}</p>
        <p><strong>Jenis Kelamin:</strong> {{ $pasien->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow mb-4">
        <h2 class="text-xl font-semibold mb-2">Hasil Diagnosa</h2>
        <p class="text-lg"><strong>Kategori Insomnia:</strong> 
            <span class="text-green-600 font-bold">{{ ucfirst(str_replace('_', ' ', $hasil)) }}</span>
        </p>
    </div>

    <div class="bg-white p-4 rounded shadow mb-4">
        <h2 class="text-xl font-semibold mb-2">Solusi</h2>
        @if (strtolower($hasil) == 'sekunder')
            <p>Solusi untuk Insomnia Sekunder: Mengelola faktor penyebab fisik atau psikologis yang mengganggu tidur, seperti pengobatan, terapi, atau perubahan gaya hidup.</p>
        @elseif (strtolower($hasil) == 'primer')
            <p>Solusi untuk Insomnia Primer: Mengatur kebiasaan tidur yang baik, seperti menjaga rutinitas tidur, menghindari stimulasi sebelum tidur, dan teknik relaksasi.</p>
        @else
            <p>Jenis insomnia tidak teridentifikasi. Pastikan untuk berkonsultasi dengan tenaga medis atau profesional kesehatan.</p>
        @endif
    </div>

    <div class="bg-white p-4 rounded shadow mb-4">
        <h2 class="text-xl font-semibold mb-2">Probabilitas Masing-masing Kategori:</h2>
        <ul class="list-disc ml-6">
            @foreach ($probabilitas as $kategori => $nilai)
                <li><strong>{{ ucfirst(str_replace('_', ' ', $kategori)) }}:</strong> {{ number_format($nilai, 6) }}</li>
            @endforeach
        </ul>
    </div>

    <a href="{{ route('diagnosa.index') }}" class="inline-block mt-4 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
        Kembali ke Form Diagnosa
    </a>
</div>
@endsection

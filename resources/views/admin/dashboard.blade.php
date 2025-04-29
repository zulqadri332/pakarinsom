<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Dashboard Admin</h1>

    <!-- Tampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-xl font-semibold mb-4">Tambah Gejala</h2>
    <form action="{{ route('admin.storeGejala') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="nama" class="block">Nama Gejala:</label>
            <input type="text" name="nama" id="nama" required class="border rounded w-full p-2">
        </div>

        <div>
            <label for="tipe" class="block">Tipe Gejala:</label>
            <select name="tipe" id="tipe" required class="border rounded w-full p-2">
                <option value="">Pilih Tipe</option>
                <option value="primer">Primer</option>
                <option value="sekunder">Sekunder</option>
            </select>
        </div>

        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Tambah Gejala
        </button>
    </form>

    <h2 class="text-xl font-semibold mt-8">Daftar Gejala</h2>
    <table class="min-w-full mt-4 border">
        <thead>
            <tr>
                <th class="px-4 py-2">Nama Gejala</th>
                <th class="px-4 py-2">Jenis</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gejalas as $gejala)
                <tr>
                    <td class="px-4 py-2">{{ $gejala->nama }}</td>
                    <td class="px-4 py-2">{{ ucfirst($gejala->tipe) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

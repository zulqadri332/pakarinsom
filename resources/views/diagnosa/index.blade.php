@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Form Diagnosa Pasien Insomnia</h1>

    <form id="diagnosa-form" action="{{ route('diagnosa.proses') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="nama" class="block">Nama Lengkap:</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required class="border rounded w-full p-2">
        </div>

        <div>
            <label for="usia" class="block">Usia:</label>
            <input type="number" name="usia" id="usia" value="{{ old('usia') }}" required class="border rounded w-full p-2">
        </div>

        <div>
            <label for="jenis_kelamin" class="block">Jenis Kelamin:</label>
            <select name="jenis_kelamin" id="jenis_kelamin" required class="border rounded w-full p-2">
                <option value="">Pilih</option>
                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div>
            <h2 class="text-xl font-semibold mb-2">Gejala yang Dialami:</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                @foreach($gejalas as $gejala)
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="gejala[]" value="{{ $gejala->id }}" class="form-checkbox"
                               {{ in_array($gejala->id, old('gejala', [])) ? 'checked' : '' }}>
                        <span>{{ $gejala->nama }} ({{ ucfirst($gejala->tipe) }})</span>
                    </label>
                @endforeach
            </div>
        </div>

        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Proses Diagnosa
        </button>
    </form>
</div>

<script>
    document.getElementById('diagnosa-form').addEventListener('submit', function(event) {
        // Cek apakah ada gejala yang dipilih
        var checkboxes = document.querySelectorAll('input[name="gejala[]"]:checked');
        if (checkboxes.length === 0) {
            event.preventDefault(); // Mencegah form submit
            alert('Anda harus memilih setidaknya satu gejala.');
        }
    });
</script>
@endsection

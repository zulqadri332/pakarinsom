@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Riwayat Diagnosa Pasien</h1>

    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Usia</th>
                <th class="border px-4 py-2">Jenis Kelamin</th>
                <th class="border px-4 py-2">Hasil Diagnosa</th>
                <th class="border px-4 py-2">Waktu</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($riwayat as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item->pasien->nama }}</td>
                    <td class="border px-4 py-2">{{ $item->pasien->usia }}</td>
                    <td class="border px-4 py-2">{{ $item->pasien->jenis_kelamin }}</td>
                    <td class="border px-4 py-2 capitalize">{{ str_replace('_', ' ', $item->hasil) }}</td>
                    <td class="border px-4 py-2">{{ $item->created_at->format('d M Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">Belum ada riwayat diagnosa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

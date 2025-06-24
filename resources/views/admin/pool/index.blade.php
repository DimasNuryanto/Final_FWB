@extends('admin.master')

@section('content')
<main class="p-6 bg-slate-50 min-h-screen">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-slate-700">Manajemen Pool</h1>
        <a href="/admin/pool/create" class="inline-block px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">
            <i class="fas fa-plus mr-2"></i>Tambah Pool
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg shadow">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded-xl">
        <table class="min-w-full table-auto text-sm text-left text-gray-700">
            <thead class="bg-slate-100 text-gray-800">
                <tr>
                    <th class="px-6 py-4 font-semibold">Gambar</th>
                    <th class="px-6 py-4 font-semibold">Nama</th>
                    <th class="px-6 py-4 font-semibold">Kategori</th>
                    <th class="px-6 py-4 font-semibold">Harga</th>
                    <th class="px-6 py-4 font-semibold">Stok</th>
                    <th class="px-6 py-4 font-semibold">Status</th>
                    <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($pools as $pool)
                    <tr>
                        <td class="px-6 py-3">
                            @if($pool->image)
                                <img src="{{ $pool->image }}" alt="Pool" class="w-16 h-16 object-cover rounded-lg">
                            @else
                                <span class="text-gray-400 italic">Tidak ada</span>
                            @endif
                        </td>
                        <td class="px-6 py-3">{{ $pool->name }}</td>
                        <td class="px-6 py-3">{{ $pool->pool_category->name }}</td>
                        <td class="px-6 py-3">Rp {{ number_format($pool->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-3">{{ $pool->stock }}</td>
                        <td class="px-6 py-3">
                            @if($pool->is_available)
                                <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-700 rounded-full">Tersedia</span>
                            @else
                                <span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-600 rounded-full">Tidak Tersedia</span>
                            @endif
                        </td>
                        <td class="px-6 py-3 text-center space-x-2">
                            <a href="/admin/pool/edit/{{ $pool->id }}" class="inline-block px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="/admin/pool/delete/{{ $pool->id }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus pool ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-500 text-white text-xs rounded hover:bg-red-600">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if($pools->isEmpty())
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-400">Belum ada pool ditambahkan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</main>
@endsection

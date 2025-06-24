@extends('user.master')

@section('title', 'Detail Pool')

@section('content')
<div class="max-w-5xl mx-auto mt-6 bg-white rounded-2xl shadow-lg overflow-hidden p-6 border border-blue-100">

    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md shadow">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
        </div>
    @endif

    {{-- Notifikasi error --}}
    @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-md shadow">
            <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
        </div>
    @endif

    {{-- Validasi --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-md shadow">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex flex-col md:flex-row gap-8">
        {{-- Gambar --}}
        <div class="md:w-1/2">
            @if ($pool->image)
                <img src="{{ $pool->image }}" alt="{{ $pool->name }}"
                     class="rounded-xl w-full h-64 object-cover shadow-md border border-blue-200">
            @else
                <div class="h-64 bg-gray-100 flex items-center justify-center text-gray-400 rounded-xl">
                    Tidak Ada Gambar
                </div>
            @endif
        </div>

        {{-- Info --}}
        <div class="md:w-1/2">
            <h2 class="text-3xl font-bold text-blue-800 mb-3">{{ $pool->name }}</h2>
            <p class="text-sm text-gray-600 mb-4 italic">{{ $pool->description ?? 'Tidak ada deskripsi.' }}</p>

            <div class="space-y-1 text-sm">
                <p><strong>Kategori:</strong> {{ ucfirst($pool->category->name ?? '-') }}</p>
                <p><strong>Harga:</strong> Rp{{ number_format($pool->price, 0, ',', '.') }}</p>
                <p><strong>Stok:</strong> {{ $pool->stock }} tersedia</p>
            </div>

            <form action="{{ route('user.pool.order', $pool->id) }}" method="POST" class="mt-6 space-y-4">
                @csrf
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Pesanan</label>
                    <input type="number" id="quantity" name="quantity"
                           min="1" max="{{ $pool->stock }}"
                           class="w-full border border-gray-300 rounded-md px-4 py-2 text-sm focus:ring-blue-500 focus:outline-none"
                           required>
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-xl shadow-md transition">
                    <i class="fas fa-shopping-cart mr-2"></i> Pesan Sekarang
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

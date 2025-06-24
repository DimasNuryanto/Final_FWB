@extends('admin.master')

@section('title', 'Edit pool')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit pool: {{ $pool->name }}</h2>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tampilkan error --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pool.update', $pool->id) }}" method="POST" class="space-y-6">
        @csrf

        <!-- Nama Pool -->
        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Pool</label>
            <input type="text" name="name" id="name" value="{{ old('name', $pool->name) }}" class="w-full border rounded-md px-4 py-2" required>
        </div>

        <!-- Deskripsi -->
        <div>
            <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
            <textarea name="description" id="description" rows="3" class="w-full border rounded-md px-4 py-2">{{ old('description', $pool->description) }}</textarea>
        </div>

        <!-- Harga -->
        <div>
            <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Harga</label>
            <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $pool->price) }}" class="w-full border rounded-md px-4 py-2" required>
        </div>

        <!-- Link Gambar -->
        <div>
            <label for="image" class="block text-sm font-semibold text-gray-700 mb-1">Link Gambar Pool (URL)</label>
            <input type="url" name="image" id="image" value="{{ old('image', $pool->image) }}" class="w-full border rounded-md px-4 py-2" placeholder="https://example.com/image.jpg">
            @if ($pool->image)
                <div class="mt-2">
                    <img src="{{ $pool->image }}" alt="Preview" class="h-32 rounded shadow-md">
                </div>
            @endif
        </div>

        <!-- Stok -->
        <div>
            <label for="stock" class="block text-sm font-semibold text-gray-700 mb-1">Stok</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $pool->stock) }}" class="w-full border rounded-md px-4 py-2" required>
        </div>

        <!-- Kategori -->
        <div>
            <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
            <select name="category_id" id="category_id" class="w-full border rounded-md px-4 py-2" required>
                @foreach ($pool_categories as $pool_category)
                    <option value="{{ $pool_category->id }}" {{ $pool->category_id == $pool_category->id ? 'selected' : '' }}>
                        {{ $pool_category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Status Ketersediaan -->
        <div class="flex items-center">
            <input type="checkbox" name="is_available" id="is_available" class="mr-2"
                   {{ $pool->is_available ? 'checked' : '' }}>
            <label for="is_available" class="text-sm text-gray-700">Tersedia untuk dipesan</label>
        </div>

        <!-- Tombol Submit -->
        <div class="text-right">
            <a href="/admin/pool" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md mr-2">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-semibold">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

@extends('user.master')

@section('title', 'Dashboard')

@section('content')
<h2 class="text-3xl font-bold text-blue-700 mb-6">Kolam Tersedia</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse ($pools as $pool)
        <a href="{{ route('user.menu.detail', $pool->id) }}" class="block group">
            <div class="bg-white rounded-2xl shadow-md overflow-hidden transition transform duration-200 group-hover:scale-105 group-hover:shadow-xl">
                @if ($pool->image)
                    <img src="{{ $pool->image }}" alt="{{ $pool->name }}" class="h-40 w-full object-cover">
                @else
                    <div class="h-40 bg-gray-100 flex items-center justify-center text-gray-400">Tidak Ada Gambar</div>
                @endif

                <div class="p-4 space-y-1">
                    <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $pool->name }}</h3>
                    <p class="text-sm text-gray-600 line-clamp-2">
                        {{ \Illuminate\Support\Str::limit($pool->description ?? 'Tidak ada deskripsi.', 70) }}
                    </p>

                    <div class="flex justify-between items-center mt-2">
                        <span class="text-blue-600 font-bold">Rp{{ number_format($pool->price, 0, ',', '.') }}</span>
                        <span class="text-xs px-2 py-1 bg-blue-50 text-blue-600 rounded-md">
                            {{ ucfirst($pool->category->name ?? '-') }}
                        </span>
                    </div>
                </div>
            </div>
        </a>
    @empty
        <p class="col-span-full text-center text-gray-500">Belum ada kolam tersedia.</p>
    @endforelse
</div>
@endsection

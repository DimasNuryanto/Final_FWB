@extends('staff.master')

@section('title', 'Dashboard Staff')

@section('content')
<div class="space-y-6">

    {{-- Header Selamat Datang --}}
    <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white p-6 rounded-2xl shadow-md flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold mb-1">Halo, {{ Auth::user()->name }} 👋</h1>
            <p class="text-sm">Pantau & kelola semua aktivitas pemesanan dengan mudah.</p>
        </div>
        <i class="fas fa-person-booth text-6xl opacity-20"></i>
    </div>

    {{-- Statistik Pesanan --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @php
            $cards = [
                ['label' => 'Pending', 'count' => $pending, 'icon' => 'fa-clock', 'color' => 'sky'],
                ['label' => 'Diproses', 'count' => $processing, 'icon' => 'fa-spinner animate-spin', 'color' => 'blue'],
                ['label' => 'Siap Diambil', 'count' => $ready, 'icon' => 'fa-check-circle', 'color' => 'cyan'],
                ['label' => 'Selesai', 'count' => $completed, 'icon' => 'fa-box-open', 'color' => 'indigo'],
            ];
        @endphp

        @foreach ($cards as $card)
            <div class="bg-{{ $card['color'] }}-50 border-l-4 border-{{ $card['color'] }}-400 p-5 rounded-xl shadow hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-medium text-{{ $card['color'] }}-600">{{ $card['label'] }}</h2>
                    <i class="fas {{ $card['icon'] }} text-{{ $card['color'] }}-500 text-2xl"></i>
                </div>
                <p class="text-3xl font-bold text-{{ $card['color'] }}-700 mt-2">{{ $card['count'] }}</p>
            </div>
        @endforeach
    </div>

    {{-- Ringkasan Aktivitas --}}
    <div class="bg-white rounded-2xl shadow-md p-6 border border-blue-100 mt-8">
        <h3 class="text-lg font-semibold text-blue-600 mb-4 flex items-center gap-2">
            <i class="fas fa-info-circle text-blue-500"></i> Aktivitas Hari Ini
        </h3>
        <ul class="text-sm text-gray-700 space-y-2 leading-relaxed">
            <li>📦 Total pesanan aktif: <span class="font-semibold text-blue-600">{{ $pending + $processing + $ready + $completed }}</span></li>
            <li>✅ Pesanan selesai: <span class="font-semibold text-indigo-600">{{ $completed }}</span></li>
            <li>🕒 Menunggu konfirmasi: <span class="font-semibold text-sky-500">{{ $pending }}</span></li>
            <li>🔧 Sedang diproses: <span class="font-semibold text-blue-500">{{ $processing }}</span></li>
        </ul>
    </div>
</div>
@endsection

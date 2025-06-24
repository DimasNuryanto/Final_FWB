@extends('user.master')

@section('title', 'Riwayat Pesanan')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6 text-blue-700">Riwayat Pesanan Anda</h2>

    {{-- Pesan Flash --}}
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg shadow">
            <i class="fas fa-times-circle mr-2"></i>{{ session('error') }}
        </div>
    @endif

    @forelse ($bookings as $booking)
        <div class="mb-6 bg-white shadow-md rounded-xl p-5 border border-blue-100">
            <div class="mb-2 text-sm text-gray-700 space-y-1">
                <p><strong>Tanggal Pesanan:</strong> {{ $booking->created_at->format('d M Y, H:i') }}</p>
                <p>
                    <strong>Status:</strong> 
                    @php
                        $statusColors = [
                            'pending' => 'bg-yellow-100 text-yellow-700',
                            'processing' => 'bg-blue-100 text-blue-700',
                            'ready' => 'bg-indigo-100 text-indigo-700',
                            'completed' => 'bg-green-100 text-green-700',
                            'cancelled' => 'bg-red-100 text-red-700',
                        ];
                        $color = $statusColors[$order->status] ?? 'bg-gray-100 text-gray-700';
                    @endphp
                    <span class="uppercase px-2 py-1 rounded text-xs font-semibold {{ $color }}">
                        {{ $booking->status }}
                    </span>
                </p>
                <p><strong>Total:</strong> Rp{{ number_format($booking->total_amount, 0, ',', '.') }}</p>
            </div>

            <div class="mt-3">
                <p class="font-semibold mb-2 text-gray-600">Item Pesanan:</p>
                <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                    @foreach ($booking->bookingItems as $item)
                        <li>
                            {{ $item->pool->name ?? 'Kolam tidak ditemukan' }} -
                            {{ $item->quantity }} x Rp{{ number_format($item->price, 0, ',', '.') }}
                        </li>
                    @endforeach
                </ul>
            </div>

            @if ($booking->status === 'pending')
                <form action="{{ route('user.riwayat.batal', $booking->id) }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white text-sm font-semibold py-2 px-4 rounded">
                        Batalkan Pesanan
                    </button>
                </form>
            @endif
        </div>
    @empty
        <p class="text-gray-500 text-sm">Belum ada riwayat pesanan.</p>
    @endforelse
</div>
@endsection

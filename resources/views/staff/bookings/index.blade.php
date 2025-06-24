@extends('staff.master')

@section('title', 'Kelola Pesanan')

@section('content')
<div class="p-6 space-y-8">
    <h2 class="text-3xl font-bold text-blue-600 flex items-center gap-2">
        <i class="fas fa-clipboard-list text-blue-500"></i> Kelola Pesanan
    </h2>

    @foreach ($groupedBookings as $status => $bookings)
        <div class="space-y-4">
            <h3 class="text-2xl font-semibold capitalize text-blue-700 border-b border-blue-200 pb-1">
                {{ ucfirst($status) }} ({{ $bookings->count() }})
            </h3>

            <div class="space-y-4">
                @forelse ($bookings as $booking)
                    <div class="bg-white rounded-xl shadow-md border border-slate-200 p-5 hover:shadow-lg transition">
                        {{-- Header Order --}}
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <p class="text-sm text-slate-500">
                                    <strong class="text-slate-700">Pesanan ID:</strong> #{{ $booking->id }}
                                </p>
                                <p class="text-sm text-slate-500">
                                    <strong>User:</strong> {{ $booking->user->name ?? '-' }}
                                </p>
                            </div>
                            <div class="text-right">
                                <span class="inline-block text-xs px-2 py-1 rounded-full
                                    {{ $booking->is_paid ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $booking->is_paid ? '✅ Sudah Dibayar' : '❌ Belum Dibayar' }}
                                </span>
                            </div>
                        </div>

                        {{-- Item List --}}
                        <div class="text-sm text-slate-700 mb-2 space-y-1">
                            @foreach ($booking->bookingItems as $item)
                                <div class="ml-2">🍽️ {{ $item->menu->name ?? '-' }} <span class="text-gray-500">(x{{ $item->quantity }})</span></div>
                            @endforeach
                        </div>

                        {{-- Info Total dan Status --}}
                        <div class="text-sm text-slate-600 mb-4">
                            <p><strong>Total:</strong> Rp{{ number_format($booking->total_amount, 0, ',', '.') }}</p>
                            <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
                        </div>

                        {{-- Form Update --}}
                        <form action="{{ route('staff.bookings.update', $order->id) }}"
                              method="POST"
                              class="grid grid-cols-1 sm:grid-cols-4 gap-3 mt-3">
                            @csrf

                            <select name="status"
                                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
                                @foreach(['pending', 'processing', 'ready', 'completed', 'cancelled'] as $opt)
                                    <option value="{{ $opt }}" {{ $order->status == $opt ? 'selected' : '' }}>
                                        {{ ucfirst($opt) }}
                                    </option>
                                @endforeach
                            </select>

                            <input type="number"
                                   name="total_amount"
                                   value="{{ $order->total_amount }}"
                                   class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"
                                   step="0.01" min="0">

                            <select name="is_paid"
                                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
                                <option value="1" {{ $order->is_paid ? 'selected' : '' }}>Sudah Dibayar</option>
                                <option value="0" {{ !$order->is_paid ? 'selected' : '' }}>Belum Dibayar</option>
                            </select>

                            <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-md transition">
                                Simpan
                            </button>
                        </form>
                    </div>
                @empty
                    <div class="bg-blue-50 border border-blue-200 text-blue-700 text-sm p-4 rounded-lg">
                        Tidak ada pesanan dalam status ini.
                    </div>
                @endforelse
            </div>
        </div>
    @endforeach
</div>
@endsection

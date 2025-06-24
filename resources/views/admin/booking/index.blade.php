@extends('admin.master')

@section('title', 'Manajemen Pesanan')

@section('content')
<div class="p-6 bg-gradient-to-tr from-blue-50 via-white to-blue-100 rounded-2xl shadow-md border border-blue-100">
    <h2 class="text-2xl font-bold text-blue-800 mb-4 flex items-center gap-2">
        <i class="fas fa-clipboard-list text-blue-600"></i> Manajemen Pesanan
    </h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded-lg mb-4 border border-green-300 shadow-sm">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-xl border border-blue-100">
        <table class="min-w-full text-sm text-slate-700">
            <thead>
                <tr class="bg-blue-100 text-blue-800">
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">User</th>
                    <th class="px-4 py-2 text-left">Metode Ambil</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Total</th>
                    <th class="px-4 py-2 text-left">Bayar</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-blue-50">
                @forelse($booking as $booking)
                <tr class="hover:bg-blue-50 transition">
                    <td class="px-4 py-3 font-medium">#{{ $booking->id }}</td>
                    <td class="px-4 py-3">{{ $booking->user->name ?? 'Guest' }}</td>
                    <td class="px-4 py-3 capitalize">{{ $booking->pickup_method }}</td>
                    <td class="px-4 py-3 capitalize">{{ ucfirst($booking->status) }}</td>
                    <td class="px-4 py-3">Rp{{ number_format($booking->total_amount, 0, ',', '.') }}</td>
                    <td class="px-4 py-3">
                        @if ($booking->is_paid)
                            <span class="text-green-600 font-semibold"><i class="fas fa-check-circle"></i> Dibayar</span>
                        @else
                            <span class="text-red-600 font-semibold"><i class="fas fa-times-circle"></i> Belum</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-5 text-center text-gray-500">Belum ada pesanan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

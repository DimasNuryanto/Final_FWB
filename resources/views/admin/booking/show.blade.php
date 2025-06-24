@extends('admin.master')

@section('content')
<div class="p-6 bg-white rounded-xl shadow-md">
    <h2 class="text-xl font-semibold mb-4">Detail Pesanan #{{ $booking->id }}</h2>

    <div class="mb-4">
        <p><strong>User:</strong> {{ $booking->user->name ?? 'Guest' }}</p>
        <p><strong>Metode Ambil:</strong> {{ ucfirst($booking->pickup_method) }}</p>
        <p><strong>Metode Bayar:</strong> {{ ucfirst($booking->payment_method) ?? '-' }}</p>
        <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
        <p><strong>Total:</strong> Rp{{ number_format($booking->total_amount, 0, ',', '.') }}</p>
    </div>

    <form action="{{ url('/admin/booking/'.$booking->id.'/status') }}" method="POST" class="mb-6">
        @csrf
        <label for="status" class="block mb-2 font-semibold">Ubah Status</label>
        <select name="status" id="status" class="w-full border rounded px-3 py-2 mb-4">
            @foreach(['pending', 'processing', 'ready', 'completed', 'cancelled'] as $status)
                <option value="{{ $status }}" {{ $booking->status === $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded">
            Simpan
        </button>
    </form>

    <h3 class="text-lg font-semibold mb-3">Item Pesanan:</h3>
    <ul class="list-disc ml-6">
        @foreach ($booking->bookingItems as $item)
            <li>{{ $item->pool->name }} x{{ $item->quantity }}</li>
        @endforeach
    </ul>

    <div class="mt-6">
        <a href="/admin/booking" class="text-blue-600 hover:underline">← Kembali ke Daftar Pesanan</a>
    </div>
</div>
@endsection

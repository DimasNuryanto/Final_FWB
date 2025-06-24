@extends('user.master')

@section('title', 'Edit Profil')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow-lg border border-blue-100">
    <h2 class="text-2xl font-bold mb-5 text-blue-700">Perbarui Profil Anda</h2>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
        </div>
    @endif

    {{-- Error Message --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg shadow">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.profil.update') }}" method="POST" class="space-y-5">
        @csrf

        {{-- Nama --}}
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-400">
                    <i class="fas fa-user"></i>
                </span>
                <input type="text" name="name" id="name"
                       value="{{ old('name', $user->name) }}"
                       class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-blue-400 focus:outline-none focus:border-blue-300">
            </div>
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-400">
                    <i class="fas fa-envelope"></i>
                </span>
                <input type="email" name="email" id="email"
                       value="{{ old('email', $user->email) }}"
                       class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-blue-400 focus:outline-none focus:border-blue-300">
            </div>
        </div>

        {{-- Password Baru --}}
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-400">
                    <i class="fas fa-lock"></i>
                </span>
                <input type="password" name="password" id="password"
                       placeholder="Kosongkan jika tidak diubah"
                       class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-blue-400 focus:outline-none focus:border-blue-300">
            </div>
        </div>

        {{-- Konfirmasi Password --}}
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-400">
                    <i class="fas fa-lock"></i>
                </span>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-blue-400 focus:outline-none focus:border-blue-300">
            </div>
        </div>

        {{-- Tombol --}}
        <div class="pt-4">
            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-xl shadow-md transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

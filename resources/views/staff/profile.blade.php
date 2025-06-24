@extends('staff.master')

@section('title', 'Edit Profil')

@section('content')
<div class="max-w-3xl mx-auto mt-12 bg-white border border-blue-200 rounded-2xl shadow-md overflow-hidden">
    <div class="px-8 py-6 bg-gradient-to-r from-blue-50 via-white to-blue-100">
        <h2 class="text-3xl font-extrabold text-blue-600 flex items-center gap-3">
            <i class="fas fa-user-cog text-blue-400 text-2xl"></i>
            Edit Profil Staff
        </h2>
    </div>

    <div class="px-8 py-6 space-y-6 bg-white">

        {{-- Pesan sukses --}}
        @if(session('success'))
            <div class="flex items-center bg-green-100 border border-green-300 text-green-800 text-sm rounded-lg px-4 py-3 shadow">
                <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            </div>
        @endif

        {{-- Pesan error --}}
        @if($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-700 text-sm rounded-lg px-4 py-3 shadow">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li><i class="fas fa-exclamation-triangle mr-1"></i>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('staff.profile.update') }}" class="space-y-5">
            @csrf

            {{-- Nama --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-blue-400">
                        <i class="fas fa-user"></i>
                    </span>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                           class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"
                           required>
                </div>
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-blue-400">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                           class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"
                           required>
                </div>
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru (Opsional)</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-blue-400">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" name="password" id="password"
                           placeholder="Kosongkan jika tidak diubah"
                           class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
            </div>

            {{-- Konfirmasi Password --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-blue-400">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
            </div>

            {{-- Tombol Simpan --}}
            <div class="pt-4 text-right">
                <button type="submit"
                        class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition duration-200">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

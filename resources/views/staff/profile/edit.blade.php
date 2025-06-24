@extends('staff.master')

@section('title', 'Edit Profil')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow-lg border border-blue-100">
    <h2 class="text-3xl font-bold text-slate-700 mb-6 flex items-center gap-3">
        <i class="fas fa-user-cog text-blue-500 text-xl"></i> Edit Profil Staff
    </h2>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-800 rounded-lg shadow">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    {{-- Error Messages --}}
    @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-800 rounded-lg shadow">
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li><i class="fas fa-exclamation-circle mr-1"></i> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('staff.profile.update') }}" class="space-y-5">
        @csrf

        {{-- Nama --}}
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                Nama Lengkap
            </label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-400">
                    <i class="fas fa-user"></i>
                </span>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
            </div>
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                Email
            </label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-400">
                    <i class="fas fa-envelope"></i>
                </span>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
            </div>
        </div>

        {{-- Password Baru --}}
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                Password Baru <span class="text-xs text-gray-500">(Opsional)</span>
            </label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-400">
                    <i class="fas fa-lock"></i>
                </span>
                <input type="password" name="password" id="password"
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"
                       placeholder="Biarkan kosong jika tidak ingin mengubah">
            </div>
        </div>

        {{-- Konfirmasi Password --}}
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                Konfirmasi Password
            </label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-400">
                    <i class="fas fa-lock"></i>
                </span>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
        </div>

        {{-- Tombol --}}
        <div class="pt-4 text-right">
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-xl shadow-md transition duration-200">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

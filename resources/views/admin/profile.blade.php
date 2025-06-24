@extends('admin.master')

@section('content')
<main class="p-6 bg-gradient-to-tr from-orange-50 via-white to-orange-100 min-h-screen">
  <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg border border-orange-200">
    <div class="flex items-center mb-6">
      <i class="fas fa-user-shield text-3xl text-orange-500 mr-3"></i>
      <h2 class="text-3xl font-extrabold text-gray-800">Edit Profil Admin</h2>
    </div>

    {{-- Flash Message --}}
    @if (session('success'))
      <div class="mb-4 flex items-center bg-green-100 border border-green-300 text-green-800 text-sm rounded-lg px-4 py-3 shadow">
        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-6">
      @csrf

      {{-- Nama --}}
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
            <i class="fas fa-user"></i>
          </span>
          <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                 class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-orange-400 focus:outline-none">
        </div>
        @error('name')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Email --}}
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
            <i class="fas fa-envelope"></i>
          </span>
          <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                 class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-orange-400 focus:outline-none">
        </div>
        @error('email')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Password --}}
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru (Opsional)</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
            <i class="fas fa-lock"></i>
          </span>
          <input type="password" name="password" id="password"
                 class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-orange-400 focus:outline-none"
                 placeholder="Biarkan kosong jika tidak ingin mengubah">
        </div>
        @error('password')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      {{-- Konfirmasi Password --}}
      <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-orange-400">
            <i class="fas fa-lock"></i>
          </span>
          <input type="password" name="password_confirmation" id="password_confirmation"
                 class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-orange-400 focus:outline-none">
        </div>
      </div>

      {{-- Tombol --}}
      <div class="pt-4 text-right">
        <button type="submit"
                class="bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition duration-200">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</main>
@endsection


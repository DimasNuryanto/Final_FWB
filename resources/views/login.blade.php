<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Warung Makan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome Gratis -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    integrity="sha512-dN1T9ZUEgUq4ljv0TnTgjqgsZnAq+ZK9nIga5kCbgJbFM/pAEwbkA2uE0h0GMqH6Izjwn2aPPrLPD1lDZo1SOw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-amber-50 min-h-screen flex items-center justify-center px-4 py-8">

  <div class="w-full max-w-4xl bg-white shadow-2xl rounded-3xl overflow-hidden flex flex-col lg:flex-row">
    
    <!-- Sidebar Logo -->
    <div class="lg:w-1/3 w-full bg-orange-100 flex flex-col justify-center items-center p-8 space-y-4">
      <div class="text-orange-600 text-7xl">
        <img src="{{ asset('logo/logo.png') }}" alt="Logo Warung Makan" class="w-50 h-50 object-contain" />
      </div>
      <!-- Keterangan bisa diaktifkan kembali jika dibutuhkan -->
      <!-- <h2 class="text-xl font-semibold text-orange-600">Warung Makan</h2>
      <p class="text-sm text-orange-500 text-center">Makanan Nusantara</p> -->
    </div>

    <!-- Form Login -->
    <div class="lg:w-2/3 w-full p-10 flex flex-col justify-center">
      <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center lg:text-left">Masuk ke Akun Anda</h3>
        <!-- Tambahkan ini setelah heading -->
      @if (session('success'))
        <div class="mb-4 bg-green-100 border border-green-300 text-green-800 text-sm rounded-xl px-4 py-3" role="alert">
          <i class="fas fa-check-circle mr-2"></i>
          {{ session('success') }}
        </div>
      @endif

      <!-- Pesan error dari middleware (misalnya status non-aktif) -->

      <!-- Pesan validasi form -->
      @if ($errors->any())
        <div class="mb-4 bg-red-50 border border-red-300 text-red-800 text-sm rounded-xl px-4 py-3" role="alert">
          <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{route('login.post')}}" method="POST" class="space-y-5">
         @csrf

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <div class="flex items-center border rounded-xl px-4 py-2 bg-white focus-within:ring-2 focus-within:ring-green-400">
            <i class="fas fa-envelope text-gray-400 mr-3"></i>
            <input type="email" id="email" name="email" placeholder="email@example.com"
                   class="w-full bg-transparent focus:outline-none text-sm" required />
          </div>
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <div class="flex items-center border rounded-xl px-4 py-2 bg-white focus-within:ring-2 focus-within:ring-green-400">
            <i class="fas fa-lock text-gray-400 mr-3"></i>
            <input type="password" id="password" name="password" placeholder="••••••••"
                   class="w-full bg-transparent focus:outline-none text-sm" required />
          </div>
        </div>

        <!-- Tombol Login -->
        <div>
          <button type="submit"
                  class="w-full py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl transition shadow-md">
            <i class="fas fa-sign-in-alt mr-2"></i> Masuk
          </button>
        </div>
      </form>

      <!-- Link Registrasi -->
      <div class="text-center mt-6">
        <p class="text-sm text-gray-600 mb-2">Belum punya akun?</p>
        <a href="{{ route('register') }}"
           class="inline-block px-6 py-2 bg-orange-400 hover:bg-orange-500 text-white font-semibold rounded-xl shadow-md transition">
          <i class="fas fa-user-plus mr-2"></i> Daftar Sekarang
        </a>
      </div>

      <p class="text-xs text-gray-400 text-center mt-6">
        &copy; 2025 Warung Makan • Sistem Informasi
      </p>
    </div>
  </div>

</body>
</html>

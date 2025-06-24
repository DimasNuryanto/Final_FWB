<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registrasi | Warung Makan</title>
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
    </div>

    <!-- Form Registrasi -->
    <div class="lg:w-2/3 w-full p-10 flex flex-col justify-center">
      <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center lg:text-left">Buat Akun Baru</h3>
      
      <form action="{{route('register.post')}}" method="POST" class="space-y-5">
         @csrf 

        <!-- Nama -->
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
          <div class="flex items-center border rounded-xl px-4 py-2 bg-white focus-within:ring-2 focus-within:ring-orange-400">
            <i class="fas fa-user text-gray-400 mr-3"></i>
            <input type="text" id="name" name="name" placeholder="Nama Anda"
                   class="w-full bg-transparent focus:outline-none text-sm" required />
          </div>
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <div class="flex items-center border rounded-xl px-4 py-2 bg-white focus-within:ring-2 focus-within:ring-orange-400">
            <i class="fas fa-envelope text-gray-400 mr-3"></i>
            <input type="email" id="email" name="email" placeholder="email@example.com"
                   class="w-full bg-transparent focus:outline-none text-sm" required />
          </div>
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <div class="flex items-center border rounded-xl px-4 py-2 bg-white focus-within:ring-2 focus-within:ring-orange-400">
            <i class="fas fa-lock text-gray-400 mr-3"></i>
            <input type="password" id="password" name="password" placeholder="••••••••"
                   class="w-full bg-transparent focus:outline-none text-sm" required />
          </div>
        </div>

        <!-- Konfirmasi Password -->
        <div>
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
          <div class="flex items-center border rounded-xl px-4 py-2 bg-white focus-within:ring-2 focus-within:ring-orange-400">
            <i class="fas fa-lock text-gray-400 mr-3"></i>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••"
                   class="w-full bg-transparent focus:outline-none text-sm" required />
          </div>
        </div>

        <!-- Tombol Registrasi -->
        <div>
          <button type="submit"
                  class="w-full py-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-xl transition shadow-md">
            <i class="fas fa-user-plus mr-2"></i> Daftar
          </button>
        </div>
      </form>

      <!-- Link ke Login -->
      <div class="text-center mt-6">
        <p class="text-sm text-gray-600 mb-2">Sudah punya akun?</p>
        <a href="{{route('login')}}"
           class="inline-block px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl shadow-md transition">
          <i class="fas fa-sign-in-alt mr-2"></i> Masuk Sekarang
        </a>
      </div>

      <p class="text-xs text-gray-400 text-center mt-6">
        &copy; 2025 Warung Makan • Sistem Informasi
      </p>
    </div>
  </div>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin | SwimZone')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-blue-50 text-gray-800 font-sans antialiased">

  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r shadow-md">
      <div class="bg-gradient-to-r from-blue-600 to-blue-400 text-white text-center py-6 text-xl font-bold tracking-wide shadow">
        <i class="fas fa-swimmer mr-2"></i>Admin Panel
      </div>
      <nav class="mt-4 space-y-1 px-4 text-sm">
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                  @if(request()->routeIs('admin.dashboard')) bg-blue-100 font-semibold text-blue-700 shadow-inner 
                  @else hover:bg-blue-100 text-gray-700 @endif">
          <i class="fas fa-home"></i> Dashboard
        </a>

        <a href="{{ route('user.index') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                  @if(request()->routeIs('user.index')) bg-blue-100 font-semibold text-blue-700 shadow-inner 
                  @else hover:bg-blue-100 text-gray-700 @endif">
          <i class="fas fa-users-cog"></i> Manajemen User
        </a>

        <a href="{{ route('pool.index') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                  @if(request()->routeIs('pool.index')) bg-blue-100 font-semibold text-blue-700 shadow-inner 
                  @else hover:bg-blue-100 text-gray-700 @endif">
          <i class="fas fa-water"></i> Manajemen Pool
        </a>

        <a href="{{ route('booking.index') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                  @if(request()->routeIs('booking.index')) bg-blue-100 font-semibold text-blue-700 shadow-inner 
                  @else hover:bg-blue-100 text-gray-700 @endif">
          <i class="fas fa-clipboard-list"></i> Pesanan
        </a>

        <a href="{{ route('admin.profile') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                  @if(request()->routeIs('admin.profile')) bg-blue-100 font-semibold text-blue-700 shadow-inner 
                  @else hover:bg-blue-100 text-gray-700 @endif">
          <i class="fas fa-user-cog"></i> Pengaturan Profil
        </a>

        <a href="/logout"
           class="flex items-center gap-3 px-4 py-2 rounded-lg text-red-600 hover:bg-red-100 transition">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </nav>
    </aside>

    <!-- Konten Utama -->
    <main class="flex-1 p-6 bg-gradient-to-br from-blue-50 via-white to-blue-100">
      <div class="mb-6 border-b pb-3">
        <h1 class="text-2xl font-bold text-blue-700">@yield('page_title', 'Dashboard')</h1>
      </div>
      @yield('content')
    </main>
  </div>

</body>
</html>

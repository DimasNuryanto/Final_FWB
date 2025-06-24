<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SwimZone Staff | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    {{-- Custom Tailwind Color Theme --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#2563EB', // blue-600
                            light: '#3B82F6',   // blue-500
                            dark: '#1D4ED8'     // blue-700
                        },
                        accent: '#E0F2FE',     // blue-100
                        sidebar: '#F0F9FF'     // light blue sidebar
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-accent text-gray-800 font-sans antialiased">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r shadow-md">
            <div class="bg-primary text-white text-center py-6 text-xl font-bold tracking-wide shadow">
                <i class="fas fa-water mr-2"></i>SwimZone Staff
            </div>

            <nav class="mt-4 space-y-1 px-4 text-sm">
                <a href="{{ route('staff.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                          @if(request()->routeIs('staff.dashboard')) bg-blue-100 font-semibold text-primary shadow-inner 
                          @else hover:bg-blue-50 text-gray-700 @endif">
                    <i class="fas fa-home"></i> Dashboard
                </a>

                <a href="{{ route('staff.bookings') }}"
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                          @if(request()->routeIs('staff.bookings')) bg-blue-100 font-semibold text-primary shadow-inner 
                          @else hover:bg-blue-50 text-gray-700 @endif">
                    <i class="fas fa-clipboard-list"></i> Kelola Pesanan
                </a>

                <a href="{{ route('staff.profile.edit') }}"
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                          @if(request()->routeIs('staff.profile.edit')) bg-blue-100 font-semibold text-primary shadow-inner 
                          @else hover:bg-blue-50 text-gray-700 @endif">
                    <i class="fas fa-user-cog"></i> Profil Staff
                </a>

                <a href="{{ route('logout') }}"
                   class="flex items-center gap-3 px-4 py-2 rounded-lg text-red-600 hover:bg-red-100 transition">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </nav>
        </aside>

        <!-- Konten Utama -->
        <main class="flex-1 p-6">
            <div class="mb-6 border-b pb-2">
                <h1 class="text-2xl font-bold text-primary">@yield('title')</h1>
            </div>
            @yield('content')
        </main>
    </div>

</body>
</html>

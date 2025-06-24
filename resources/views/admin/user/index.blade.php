@extends('admin.master')

@section('content')
<main class="p-6 bg-gray-50 min-h-screen">
    {{-- <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-700">Manajemen User</h2>
        <a href="/admin/user/create" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow">
            <i class="fas fa-user-plus mr-2"></i> Tambah User
        </a>
    </div> --}}

    <!-- Notifikasi -->
    @if(session('success'))
    <div class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded">
        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
    </div>
    @endif

    <!-- Tabel User -->
    <div class="bg-white shadow rounded-xl overflow-x-auto">
        <table class="min-w-full table-auto text-sm text-left">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Role</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @forelse ($users as $index => $user)
                <tr class="border-b">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4 capitalize">{{ $user->role }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold 
                            {{ $user->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ ucfirst($user->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <!-- Edit -->
                        <a href="{{route('user.edit',$user->id)}}"
                           class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-xs">
                           <i class="fas fa-edit"></i> Edit
                        </a>

                        <!-- Hapus -->
                        <form action="{{route('user.delete',$user->id)}}" method="POST" class="inline-block"
                              onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-xs">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </form>

                        <!-- Aktifkan / Nonaktifkan -->
                        @if ($user->status !== 'active')
                        <form action="{{ route('user.activate',$user->id) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit"
                                    class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md text-xs">
                                <i class="fas fa-check-circle"></i> Aktifkan
                            </button>
                        </form>
                        @else
                        <form action="{{ route('user.deactivate',$user->id) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-xs">
                                <i class="fas fa-ban"></i> Nonaktifkan
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">Tidak ada user ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
@endsection

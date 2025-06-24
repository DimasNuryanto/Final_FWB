<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pool;
use App\Models\pool_category;
use App\Models\Booking;
use App\Models\BookingItem;
use Illuminate\Support\Facades\DB;



class SessionController extends Controller
{
    //Function untuk admin
   public function adminDashboard()
   {
    $users = User::where('status', 'active')->count();
    $pools = Pool::where('is_available', true)->count();
    $bookings = Booking::where('status', '!=', 'cancelled')->count();
    $pending = Booking::where('status', 'pending')->count();
    $processing = Booking::where('status', 'processing')->count();
    $ready = Booking::where('status', 'ready')->count();
    $completed = Booking::where('status', 'completed')->count();
    return view('admin.dashboard', compact('users', 'pools', 'bookings', 'pending', 'processing', 'ready', 'completed'));
   }

   public function indexUser()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.user.index', compact('users'));
    }

    // Tampilkan form edit
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    // Update data user
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:user,staff',
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => $request->role,
        ]);

        return redirect()->back()->with('success', 'User berhasil diperbarui.');
    }

    // Hapus user
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }

    // Aktifkan user
    public function activateUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'active';
        $user->save();

        return redirect()->back()->with('success', 'User berhasil diaktifkan.');
    }

    // Nonaktifkan user
    public function deactivateUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'inactive';
        $user->save();

        return redirect()->back()->with('success', 'User berhasil dinonaktifkan.');
    }

    public function indexPool()
    {
        $pools = Pool::all();
        return view('admin.pool.index', compact('pools'));
    }

    public function createPool()
    {
        $pool_categories = pool_category::all();
        return view('admin.pool.create', compact('pool_categories'));
    }

   public function storePool(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'category_id' => 'required|exists:pool_categories,id',
        'image' => 'nullable|url',
    ]);

    $pool = new Pool();
    $pool->name = $validated['name'];
    $pool->description = $validated['description'] ?? null;
    $pool->price = $validated['price'];
    $pool->stock = $validated['stock'];
    $pool->category_id = $validated['category_id'];
    $pool->image = $validated['image'] ?? null;
    $pool->is_available = $request->has('is_available'); // true jika dicentang

    $pool->save();

    return redirect()->back()->with('success', 'Pool berhasil ditambahkan.');
}



    public function editPool($id)
    {
        $pool = Pool::findOrFail($id);
        $pool_categories = pool_category::all();
        return view('admin.pool.edit', compact('pool', 'pool_categories'));
    }

    public function updatePool(Request $request, $id)
    {
        $pool = Pool::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:pool_categories,id',
            'image' => 'nullable|url|max:255',
        ]);

        $pool->name = $validated['name'];
        $pool->description = $validated['description'] ?? null;
        $pool->price = $validated['price'];
        $pool->stock = $validated['stock'];
        $pool->category_id = $validated['category_id'];
        $pool->image = $validated['image'] ?? null;
        $pool->is_available = $request->has('is_available');

        $pool->save();

        return redirect()->back()->with('success', 'Pool berhasil diperbarui.');
    }


    public function destroyPool($id)
    {
        $pool = Pool::findOrFail($id);
        $pool->delete();

        return redirect()->back()->with('success', 'Pool berhasil dihapus.');
    }


    //Function untuk booking
    public function indexBooking()
    {
        $booking = Booking::with('user')->latest()->get();
        return view('admin.booking.index', compact('booking'));
    }

    public function showBooking($id)
    {
        $booking = Booking::with(['user', 'bookingItems.pool'])->findOrFail($id);
        return view('admin.booking.show', compact('booking'));
    }

    public function updateStatusBooking(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,ready,completed,cancelled',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->back()->with('success', 'Status booking diperbarui.');
    }

public function indexOrder()
{
    $groupedBookings = Booking::with('user', 'orderItems.menu')
        ->orderByDesc('created_at')
        ->get()
        ->groupBy('status');

    return view('staff.bookings.index', compact('groupedBookings'));
}

    


    //Function untuk profile admin
    public function editProfile()
{
    $user = Auth::user(); // ambil data user yang login
    return view('admin.profile', compact('user'));
}

public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui.');
}

    
   

   




























   //Function untuk staff
   public function staffDashboard()
    {
        $pending = Booking::where('status', 'pending')->count();
        $processing = Booking::where('status', 'processing')->count();
        $ready = Booking::where('status', 'ready')->count();
        $completed = Booking::where('status', 'completed')->count();

        return view('staff.dashboard', compact('pending', 'processing', 'ready', 'completed'));
    }

    public function manageBookings()
    {
        $bookings = Booking::with('bookingItems.pool', 'user')->latest()->get();

        $groupedBookings = [
            'pending' => $bookings->where('status', 'pending'),
            'processing' => $bookings->where('status', 'processing'),
            'ready' => $bookings->where('status', 'ready'),
            'completed' => $bookings->where('status', 'completed'),
        ];

        return view('staff.bookings.index', compact('groupedBookings'));
    }


    public function updateBooking(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,ready,completed,cancelled',
            'total_amount' => 'required|numeric|min:0',
            'is_paid' => 'required|boolean',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->total_amount = $request->total_amount;
        $booking->is_paid = $request->is_paid;
        $booking->save();

        return redirect()->route('staff.bookings')->with('success', 'Booking berhasil diperbarui.');
    }


    public function editStaffProfile()
{
    $user = Auth::user(); // Ambil staff yang sedang login
    return view('staff.profile.edit', compact('user'));
}

public function updateStaffProfile(Request $request)
{
    $user = Auth::user();

    // Validasi input
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    // Update profil
    $user->name = $request->name;
    $user->email = $request->email;

    // Jika password diisi, update
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
}
















   //function untuk user
   public function userDashboard()
    {
        $pools = Pool::with('category')->where('is_available', true)->get();
        return view('user.dashboard', compact('pools'));
    }

    public function detailPool($id)
{
    $pool = Pool::with('category')->findOrFail($id);
    return view('user.detail', compact('pool'));
}

public function bookingPool(Request $request, $id)
    {
        $pool = Pool::findOrFail($id);

        // Validasi input jumlah pesanan
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $pool->stock,
        ]);

        $quantity = $request->quantity;
        $userId = Auth::id(); // Ambil ID user yang sedang login

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Hitung total harga
        $total = $pool->price * $quantity;

        // Jalankan dalam transaksi database
        DB::beginTransaction();
        try {
            // Buat entri booking baru
            $booking = Booking::create([
                'user_id' => $userId,
                'status' => 'pending',
                'pickup_method' => 'dine_in', // default atau bisa dibuat pilihan nanti
                'payment_method' => null,
                'total_amount' => $total,
                'is_paid' => false,
            ]);

            // Tambah detail item yang dipesan
            BookingItem::create([
                'booking_id' => $booking->id,
                'pool_id' => $pool->id,
                'quantity' => $quantity,
                'price' => $pool->price,
            ]);

            // Kurangi stok
            $pool->decrement('stock', $quantity);

            DB::commit();

            return redirect()->route('user.dashboard')->with('success', 'Pesanan berhasil dibuat.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function riwayatPesanan()
    {
        $userId = Auth::id();

        $bookings = Booking::with(['bookingItems.pool']) // ambil item dan info pool
                    ->where('user_id', $userId)
                    ->latest()
                    ->get();

        return view('user.riwayat', compact('bookings'));
    }

    public function batalkanPesanan($id)
    {
        $userId = Auth::id();
        $booking = Booking::with('bookingItems')->where('user_id', $userId)->findOrFail($id);

        // Hanya bisa dibatalkan jika masih pending
        if ($booking->status !== 'pending') {
            return back()->with('error', 'Pesanan tidak dapat dibatalkan.');
        }

        DB::beginTransaction();
        try {
            // Kembalikan stok pool
            foreach ($booking->bookingItems as $item) {
                $item->pool->increment('stock', $item->quantity);
            }

            // Update status jadi cancelled
            $booking->status = 'cancelled';
            $booking->save();

            DB::commit();
            return back()->with('success', 'Pesanan berhasil dibatalkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal membatalkan pesanan.');
        }
    }

    public function editProfil()
{
    $user = auth()->user();
    return view('user.edit_profile', compact('user'));
}

public function updateProfil(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('user.profil.edit')->with('success', 'Profil berhasil diperbarui.');
}





    





   //Function untuk logout
   public function logout(Request $request)
    {
        Auth::logout(); // Logout user

        // Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }

}

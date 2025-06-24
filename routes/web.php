<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RoleMiddleware;


Route::get('/',[AuthController::class, 'login'])->name('login');
Route::post('/loginPost',[AuthController::class, 'loginPost'])->name('login.post');


Route::get('/register',[AuthController::class, 'register'])->name('register');
Route::post('/registerPost',[AuthController::class, 'registerPost'])->name('register.post');
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');


// Middleware dipakai secara langsung per grup atau per route
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin/dashboard',[SessionController::class,'adminDashboard'])->name('admin.dashboard');
    //Manajemen User
    Route::get('/user', [SessionController::class, 'indexUser'])->name('user.index');
    Route::get('/user/{id}/edit', [SessionController::class, 'editUser'])->name('user.edit');;
    Route::put('/user/{id}', [SessionController::class, 'updateUser'])->name('user.update');
    Route::delete('/user/{id}', [SessionController::class, 'destroyUser'])->name('user.delete');
    Route::post('/user/{id}/activate', [SessionController::class, 'activateUser'])->name('user.activate');
    Route::post('/user/{id}/deactivate', [SessionController::class, 'deactivateUser'])->name('user.deactivate');

    //Manajemen Pool
    Route::get('/admin/pool', [SessionController::class, 'indexPool'])->name('pool.index');
    Route::get('/admin/pool/create', [SessionController::class, 'createPool'])->name('pool.create');
    Route::post('/admin/pool/store', [SessionController::class, 'storePool'])->name('pool.store');
    Route::get('/admin/pool/edit/{id}', [SessionController::class, 'editPool'])->name('pool.edit');
    Route::post('/admin/pool/update/{id}', [SessionController::class, 'updatePool'])->name('pool.update');
    Route::delete('/admin/pool/delete/{id}', [SessionController::class, 'destroyPool'])->name('pool.delete');

    //manajemen pesanan
    Route::get('/admin/pesanan', [SessionController::class, 'indexBooking'])->name('booking.index');
    Route::get('/admin/pesanan/{id}', [SessionController::class, 'showBooking'])->name('booking.show');
    Route::post('/admin/pesanan/{id}/status', [SessionController::class, 'updateStatusBooking'])->name('booking.updateStatus');

    //Manajemen Profile
    Route::get('/admin/profile', [SessionController::class, 'editProfile'])->name('admin.profile');
    Route::post('/admin/profile', [SessionController::class, 'updateProfile'])->name('admin.profile.update');
    
    //Manajemen Booking
    Route::get('/admin/booking', [SessionController::class, 'indexOrder'])->name('booking.index');
    Route::get('/admin/booking/{id}', [SessionController::class, 'showOrder'])->name('booking.show');
    Route::post('/admin/booking/{id}/status', [SessionController::class, 'updateStatusOrder'])->name('booking.updateStatus');

});







Route::middleware(['auth', RoleMiddleware::class . ':staff'])->group(function () {
     Route::get('/staff/dashboard', [SessionController::class, 'staffDashboard'])->name('staff.dashboard');

     //kelola bookings
     Route::get('/staff/bookings', [SessionController::class, 'manageBookings'])->name('staff.bookings');
     Route::post('/staff/bookings/{id}/update', [SessionController::class, 'updateBooking'])->name('staff.bookings.update');
     Route::get('/staff/bookings', [SessionController::class, 'indexOrder'])->name('staff.bookings');
     // profile
     Route::get('/staff/profile', [SessionController::class, 'editStaffProfile'])->name('staff.profile.edit');
     Route::post('/staff/profile', [SessionController::class, 'updateStaffProfile'])->name('staff.profile.update');
});









Route::middleware(['auth', RoleMiddleware::class . ':user'])->group(function () {
    Route::get('/userDashboard', [SessionController::class, 'userDashboard'])->name('user.dashboard');

    //detail produk
    Route::get('/pool/{id}', [SessionController::class, 'detailPool'])->name('user.pool.detail');
    Route::post('/pool/booking/{id}', [SessionController::class, 'bookingPool'])->name('user.pool.booking');

    //riwayat pesanan
    Route::get('/riwayat-pesanan', [SessionController::class, 'riwayatPesanan'])->name('user.riwayat');
    Route::post('/riwayat-pesanan/batal/{id}', [SessionController::class, 'batalkanPesanan'])->name('user.riwayat.batal');

    //profile user
    Route::get('/profil/edit', [SessionController::class, 'editProfil'])->name('user.profil.edit');
    Route::post('/profil/update', [SessionController::class, 'updateProfil'])->name('user.profil.update');
    
});
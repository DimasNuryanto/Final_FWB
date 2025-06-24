<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\BookingItem;

class Booking extends Model
{
    protected $fillable = [
        'user_id', 'status', 'pickup_method', 'payment_method', 'total_amount', 'is_paid'
    ];

    public function bookingItems()
    {
        return $this->hasMany(BookingItem::class);
    }

    // 🔧 Tambahkan relasi ini untuk mengakses nama user pemesan
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

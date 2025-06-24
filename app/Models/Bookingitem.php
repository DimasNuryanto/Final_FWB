<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class BookingItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id', 'pool_id', 'quantity', 'price'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function pool()
    {
        return $this->belongsTo(Pool::class);
    }
}

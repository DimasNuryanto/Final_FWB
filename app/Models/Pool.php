<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\pool_category;
use App\Models\Booking;

class Pool extends Model
{
    public function category()
    {
        return $this->belongsTo(pool_category::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

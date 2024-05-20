<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;
    protected $table = 'room';
    protected $fillable = [];

    public function photos() : HasMany {
        return $this->hashMany(Photo::class);
    }

    public function amenities() : HasMany {
        return $this->hasMany(Amenity::class);
    }

    public function bookings() : HasMany {
        return $this->hasMany(Booking::class);
    }
}

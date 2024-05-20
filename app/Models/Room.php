<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;
    protected $table = 'room';
    protected $fillable = ['id',
    'type',
    'number',
    'description',
    'offer',
    'price',
    'cancellation',
    'discount',
    'status'];

    public function photos() : HasMany {
        return $this->hasMany(Photo::class, 'room_id');
    }

    public function amenities() : BelongsToMany {
        return $this->belongsToMany(Amenity::class, 'amenity_room');
    }

    public function bookings() : HasMany {
        return $this->hasMany(Booking::class, 'room_id');
    }

    public static function offers() {
        return self::with(['photos', 'amenities'])->where('offer', 'true')->get();
    }

    public static function swiper() {
        return self::with(['photos', 'amenities'])->get();
    }
}

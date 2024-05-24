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
    protected $fillable = [
        'id',
        'type',
        'number',
        'description',
        'offer',
        'price',
        'cancellation',
        'discount',
        'status'
    ];

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class, 'room_id');
    }

    public function amenities(): BelongsToMany
    {
        return $this->belongsToMany(Amenity::class, 'amenity_room');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'room_id');
    }

    public static function offers()
    {
        return self::with(['photos', 'amenities'])->where('offer', 'true')->orderBy('discount', 'desc')->get();
    }

    public static function swiper()
    {
        return self::with(['photos', 'amenities'])->orderBy('price', 'desc')->take(3)->get();
    }

    public static function rooms()
    {
        return self::with(['photos', 'amenities'])->get();
    }

    public static function checkAvailability($check_in, $check_out)
    {
        return self::with(['photos', 'amenities'])->whereDoesntHave('bookings', function ($query) use ($check_in, $check_out) {
            $query->where('check_in', '<', $check_out)->where('check_out', '>', $check_in)
                ->orWhere('check_in', '=<', $check_in)->where('check_out', '<', $check_out)
                ->orWhere('check_in', '>=', $check_in)->where('check_in', '<', $check_out)
                ->orWhere('check_out', '>', $check_in)->where('check_out', '=<', $check_out);
        })->get();
    }

    public static function isAvailable($room_id, $check_in, $check_out)
    {
        return self::with(['photos', 'amenities'])->whereHas('bookings', function ($query) use ($check_in, $check_out) {
            $query->where('check_in', '<', $check_out)->where('check_out', '>', $check_in)
                ->orWhere('check_in', '=<', $check_in)->where('check_out', '<', $check_out)
                ->orWhere('check_in', '>=', $check_in)->where('check_in', '<', $check_out)
                ->orWhere('check_out', '>', $check_in)->where('check_out', '=<', $check_out);
        })->find($room_id);
    }

    public function calculateDiscount()
    {
        $resultPriceOnCent = $this->price - ($this->price * $this->discount / 100);
        return round($resultPriceOnCent / 100);
    }

    public function calculateWithoutDiscount()
    {
        return round($this->price / 100);
    }

    public function name() {
        return 'Room ' . $this->number;
    }

    public function typeName() {
        return $this->type . ' - ' . $this->name();
    }

    public function firstPhoto() {
        return $this->photos[0]->url;
    }
}

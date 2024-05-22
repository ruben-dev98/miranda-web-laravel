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
        $rooms = self::with(['photos', 'amenities'])->where('offer', 'true')->orderBy('discount', 'desc')->get();
        return self::formatRooms($rooms);
    }

    public static function swiper()
    {
        $rooms = self::with(['photos', 'amenities'])->orderBy('price', 'desc')->take(3)->get();
        return self::formatRooms($rooms);
    }

    public static function rooms()
    {
        $rooms = self::with(['photos', 'amenities'])->get();
        return self::formatRooms($rooms);
    }

    public static function checkAvailability($check_in, $check_out)
    {
        $rooms = self::with(['photos', 'amenities'])->whereDoesntHave('bookings', function($query) use($check_in, $check_out) {
            $query->where('check_in', '<', $check_out)->where('check_out', '>', $check_in)
            ->orWhere('check_in', '=<', $check_in)->where('check_out', '<', $check_out)
            ->orWhere('check_in', '>=', $check_in)->where('check_in', '<', $check_out)
            ->orWhere('check_out', '>', $check_in)->where('check_out', '=<', $check_out);
        })->get();
        return self::formatRooms($rooms);
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

    public static function formatRoom($rawRoom)
    {
        return [
            'id' => $rawRoom['id'],
            'description' => $rawRoom['description'],
            'type' => $rawRoom['type'],
            'name' => 'Room ' . $rawRoom['number'],
            'type_name' => $rawRoom['type'] . ' - Room ' . $rawRoom['number'],
            'amenities' => $rawRoom['amenities'],
            'price' => $rawRoom->calculateDiscount(),
            'price_not_discount' => $rawRoom->calculateWithoutDiscount(),
            'photo' => $rawRoom['photos'][0]['url'],
            'cancellation' => $rawRoom['cancellation']
        ];
    }

    private static function formatRooms($rawRooms)
    {
        $formatRooms = [];
        foreach ($rawRooms as $roomToFormat) {
            $formatRooms[] = self::formatRoom($roomToFormat);
        }
        return $formatRooms;
    }
}

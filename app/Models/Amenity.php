<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;
    protected $table = 'amenity';
    protected $fillable = ['id', 'name'];

    public function getAmenityIcon()
    {

        $amenities = [
            'Air Conditioner' => asset('./assets/icon/amenities-air-conditioner.svg'),
            'Breakfast' => asset('./assets/icon/amenities-breakfast.svg'),
            'Cleaning' => asset('./assets/icon/amenities-cleaning.svg'),
            'Grocery' => asset('./assets/icon/amenities-grocery.svg'),
            'Shop Near' => asset('./assets/icon/amenities-shop.svg'),
            '24/7 Online Support' => asset('./assets/icon/amenities-online-support.svg'),
            'Smart Security' => asset('./assets/icon/amenities-smart-security.svg'),
            'High Speed Wifi' => asset('./assets/icon/amenities-wifi.svg'),
            'Kitchen' => asset('./assets/icon/amenities-kitchen.svg'),
            'Shower' => asset('./assets/icon/amenities-shower.svg'),
            'Single Bed' => asset('./assets/icon/amenities-single-bed.svg'),
            'Expert Team' => asset('./assets/icon/amenities-expert.svg'),
            'Towels' => asset('./assets/icon/amenities-towels.svg'),
            'Strong Locker' => asset('./assets/icon/amenities-strong-locker.svg'),
        ];

        return $amenities[$this->name];
    }
}

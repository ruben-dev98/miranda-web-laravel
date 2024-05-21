<?php

function calculateDiscount($price, $discount)
{
    $resultPriceOnCent = $price - ($price * $discount / 100);
    return round($resultPriceOnCent / 100);
}

function formatNumber($number)
{
    strval($number);
}

function formatRoom($rawRoom)
{
    return [
        'id' => $rawRoom['id'],
        'description' => $rawRoom['description'],
        'type' => $rawRoom['type'],
        'name' => 'Room ' . $rawRoom['number'],
        'type_name' => $rawRoom['type'] . ' - Room ' . $rawRoom['number'],
        'amenities' => $rawRoom['amenities'],
        'price' => calculateDiscount($rawRoom['price'], $rawRoom['discount']),
        'price_not_discount' => calculateDiscount($rawRoom['price'], 0),
        'photo' => $rawRoom['photos'][0]['url'],
        'cancellation' => $rawRoom['cancellation']
    ];
}

function formatListRooms($rawRooms)
{
    $formatRooms = [];
    foreach ($rawRooms as $roomToFormat) {
        $formatRooms[] = formatRoom($roomToFormat);
    }
    return $formatRooms;
}

function getAmenityIcon($amenity)
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

    return $amenities[$amenity['name']];
}

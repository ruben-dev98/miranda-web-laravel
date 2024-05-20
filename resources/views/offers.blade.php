@extends('layout')
@section('title', 'Offers')
@section('content')
    <header class="banner">
        <div class="banner__inner banner__inner--rooms --max-width">
            <p class="font__title font__title--dark upper__case">The Ultimate Luxury </p>
            <h2 class="font__subtitle font__subtitle--banner font__subtitle--dark">Our Offers</h2>
        </div>
        <div class="banner__pagination">
            <span>Home</span><span>|</span><span>Offers</span>
        </div>
    </header>
    <section class="offers offers__cards --max-width">
        @foreach ($rooms as $room)
            <div class="offers__card">
                <a href="room-details.php?id={{ $room['id'] }}"><img class="offers__img"
                        src="{{ $room['photo'] }}" alt=""></a>
                <div class="offers__inner">
                    <header class="offers__card-header">
                        <div>
                            <p class="offers__informative-text upper__case">{{ $room['type'] }}</p>
                            <p class="offers__title"><a href="room-details.php?id={{ $room['id'] }}">{{ $room['name'] }}</a></p>
                        </div>
                        <div class="offers__prices">
                            <p class="offers__price offers__price--crossed">
                                <span>${{ $room['price_not_discount'] }}</span>
                                <span>/Night</span>
                            </p>
                            <p class="offers__price">
                                <span>${{ $room['price'] }}</span>
                                <span>/Night</span>
                            </p>
                        </div>
                    </header>
                    <div class="offers__card-body">
                        <p class="offers__text">
                            {{ $room['description'] }}
                        </p>
                        <section class="offers__amenities">
                            @component('amenitiesDetails', ['room' => $room, 'title' => true])
                            @endcomponent
                        </section>
                        <button class="offers__button upper__case"><a href="room-details.php?id={{ $room['id'] }}">Book
                                Now</a></button>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <section class="offers__popular-rooms">
        <p class="offers__popular-rooms-informative-text upper__case">Popular List</p>
        <p class="offers__popular-rooms-title">Popular Rooms</p>
        <div class="offers__swiper swiper --max-width">
            <div class="offers__swiper-wrapper swiper-wrapper">
                @foreach ($popularRooms as $room)
                    <div class="offers__swiper-slide rooms__grid-item swiper-slide">
                        <img src="{{ $room['photo'] }}" alt="">
                        @component('amenitiesMenu', ['room' => $room, 'title' => false])
                        @endcomponent
                        <div class="rooms__grid-item-details offers__details">
                            <p class="rooms__grid-item-details-title">{{ $room['type_name'] }}</p>
                            <p class="rooms__grid-item-details-text">
                                {{ $room['description'] }}
                            </p>
                            <p class="rooms__grid-item-details-price">
                                <span>${{ $room['price'] }}/Night</span><span><a
                                        href="room-details.php?id={{ $room['id'] }}"></a></span>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="offers__swiper-button-prev swiper-button-prev"></div>
            <div class="offers__swiper-button-next swiper-button-next"></div>
        </div>
    </section>
@endsection

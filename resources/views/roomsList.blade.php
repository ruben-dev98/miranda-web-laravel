@extends('layout')
@section('title', 'Rooms')
@section('content')
    <header class="banner">
        <div class="banner__inner banner__inner--rooms --max-width">
            <p class="font__title font__title--dark upper__case">The Ultimate Luxury </p>
            <h2 class="font__subtitle font__subtitle--banner font__subtitle--dark">Ultimate<br> Room</h2>
        </div>
        <div class="banner__pagination">
            <span>Home</span><span>|</span><span>Rooms</span>
        </div>
    </header>
    <section class="rooms__list rooms__list --max-width">
        <div class="rooms-list__swiper swiper">
            <div class="swiper-wrapper">
                @foreach ($rooms as $room)
                    <div class="rooms-list__swiper-slide swiper-slide">
                        <div class="rooms__list-item">
                            <img class="rooms__list-item-img" src="{{ $room['photo'] }}" alt="">
                            <div class="rooms__list-content">
                                <div class="rooms__list-item-details">
                                    @component('amenitiesMenu', ['room' => $room, 'title' => false])
                                    @endcomponent
                                    <p class="rooms__list-item-details-title">
                                        {{ $room['type_name'] }}
                                    </p>
                                    <p class="rooms__list-item-details-text">
                                        {{ $room['description'] }}
                                    </p>
                                </div>
                                <p class="rooms__list-item-details-price">
                                    <span>${{ $room['price'] }}/Night</span><span><a
                                            href="room-details.php?id={{ $room['id'] }}&check_in={{ $check_in }}&check_out={{ $check_out }}"></a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="rooms-grid__swiper-pagination rooms-list__swiper-pagination swiper-pagination">
        </div>
    </section>
@endsection

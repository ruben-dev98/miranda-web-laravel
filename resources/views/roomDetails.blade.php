@extends('layout')
@section('title', 'Rooms Details')
@section('content')
    <header class="banner">
        <div class="banner__inner banner__inner--rooms --max-width">
            <p class="font__title font__title--dark upper__case">The Ultimate Luxury</p>
            <h2 class="font__subtitle font__subtitle--banner font__subtitle--dark">Ultimate<br> Room</h2>
        </div>
        <div class="banner__pagination banner__pagination--room-details">
            <span>Home</span><span>|</span><span>Room Details</span>
        </div>
    </header>
    <section class="room-details__details --max-width">
        <div class="room-details__details-info">
            <div class="details-info__text">
                <div>
                    <p class="room-details__details-informative-text upper__case">{{ $room['type'] }}</p>
                    <p class="room-details__details-title">{{ $room['name'] }}</p>
                </div>
                <p class="room-details__details-price">
                    <span>$</span>
                    <span>{{ $room['price'] }}</span>
                    <span>/Night</span>
                </p>
            </div>
            <img class="room-details__details-img" src="{{ $room['photo'] }}" alt="">
        </div>
        <form class="room-details__form" method="POST">
            <div class="room-details__form-title">
                <span>Check Availability</span>
            </div>
            <div class="room-details__form-control">
                <label for="check_in">Check In</label>
                <input type="date" id="check_in" name="check_in" value="{{ $check_in }}" required>
            </div>
            <div class="room-details__form-control">
                <label for="check_out">Check Out</label>
                <input type="date" id="check_out" name="check_out" value="{{ $check_out }}" required>
            </div>
            <div class="room-details__form-control">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" value="Name" required>
            </div>
            <div class="room-details__form-control">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="dddd@gmail.com" required>
            </div>
            <div class="room-details__form-control">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" value="223344453" required>
            </div>
            <div class="room-details__form-control">
                <label for="special_request">Special Request</label>
                <textarea class="room-details__area" cols="30" rows="10" name="special_request" id="special_request"></textarea>
            </div>
            <input type="hidden" name="room_id" id="room_id" value="{{ $room['id'] }}">
            <button class="button upper__case" type="submit">Check Availability</button>
        </form>
        <p class="room-details__text">
            {{ $room['description'] }}
        </p>
    </section>
    <section class="room-details__amenities --max-width">
        <p class="room-details__amenities-title">Amenities</p>
        @component('amenitiesDetails')
        @endcomponent
    </section>
    <section class="room-details__founder --max-width">
        <div class="room-details__founder-content">
            <div class="room-details__founder-img" style="background-image: url(assets/img/bg-footer.png);">
                <div class="room-details__founder-elipsis">
                    <img class="room-details__founder-check" src="assets/icon/check.svg" alt="">
                </div>
            </div>
            <p class="room-details__founder-title">Rosalina D. William</p>
            <p class="room-details__founder-subtitle">Founder, Qux Co.</p>
            <p class="room-details__founder-text">
                Lorem ipsum dolor sit amet, consectetur
                adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore.
            </p>
        </div>
    </section>
    <section class="room-details__cancellation --max-width">
        <p class="room-details__cancellation-title">Cancellation</p>
        <p class="room-details__cancellation-text">
            {{ $room['cancellation'] }}
        </p>
    </section>
    <section class="offers__popular-rooms offers__popular-rooms--ligth room-details__related-rooms --max-width">
        <p class="offers__popular-rooms-title offers__popular-rooms-title--related-rooms">Related Rooms</p>
        <div class="offers__swiper swiper --max-width">
            <div class="offers__swiper-wrapper swiper-wrapper">
                @foreach ($rooms as $room)
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
                                <span>${{ $room['price'] }}/Night</span>
                                <span>
                                    @if ($check_in === null)
                                        <a href="room-details.php?id={{ $room['id'] }}"></a>
                                    @else
                                        <a
                                            href="room-details.php?id={{ $room['id'] }}&check_in={{ $check_in }}&check_out={{ $check_out }}"></a>
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="offers__swiper-button-prev swiper-button-prev"></div>
            <div class="offers__swiper-button-next swiper-button-next"></div>
        </div>
    </section>
    @if ($formBooking !== null)
        @if (!$operationSuccessful)
            @component('swal', [
                'title' => '¡We are sorry!',
                'text' => 'This room is not available for the dates you need. Please try different dates or try a different room.
                    The Miranda Hotel',
                'icon' => 'error'
            ])
            @endcomponent
            {{ header( 'Refresh: 1') }}
        @endif
    @endif
@endsection

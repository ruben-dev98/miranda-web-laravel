@extends('layout')
@section('title', 'Home')
@section('content')
    <header class="banner">
        <div class="banner__inner --max-width">
            <p class="font__title font__title--dark  upper__case">The Ultimate Luxury Experience</p>
            <h2 class="font__subtitle font__subtitle--dark font__subtitle--banner-home">The Perfect<br />Base For You</h2>
            <button class="button button__banner upper__case"><a href="/about.php">Take a Tour</a></button>
            <button class="button button__banner button--transparent upper__case"><a href="/contact.php">Learn More</a></button>
        </div>
    </header>
    <section class="checking">
        <form class="checking__inner form --max-width" action="rooms-list.php">
            <div class="form__control">
                <div class="form__control-input">
                    <label class="checking__label" for="check_in">Arrival Date</label>
                    <input required class="checking__input" type="date" name="check_in" id="check_in">
                </div>
                <div class="form__control-input">
                    <label class="checking__label" for="check_out">LeDeparture Date</label>
                    <input required class="checking__input" type="date" name="check_out" id="check_out">
                </div>
            </div>
            <button class="button button--big upper__case" type="submit">Check availability</button>
        </form>
    </section>
    <section class="about-us">
        <div class="about-us__background"></div>
        <div class="about-us__inner --max-width">
            <section class="about-us__info">
                <h2 class="font__title font__title--weight-700 upper__case">About Us</h2>
                <p class="font__subtitle font__subtitle--height">Discover Our Underground.</p>
                <p class="font__text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat.
                </p>
                <button class="button upper__case">
                    <a href="/rooms.php">Book Now</a>
                </button>
            </section>
            <section class="about-us__features">
                <img class="about-us__features-img" src="assets/img/team.jpg" alt="">
                <div class="about-us__features-feature">
                    <img class="about-us__features-feature-img" src="assets/icon/strong-team.svg"
                        alt="imagen con la silueta de tres personas">
                    <p class="about-us__features-feature-title">Strong Team</p>
                    <p class="about-us__features-feature-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor.</p>
                </div>
                <img class="about-us__features-img" src="assets/img/luxury-room-2.jpg" alt="">
                <div class="about-us__features-feature about-us__features-feature--dark">
                    <img class="about-us__features-feature-img" src="assets/icon/luxury-room.svg"
                        alt="imagen de un calendario con una flecha saliendo del mismo a la dirección izquierda">
                    <p class="about-us__features-feature-title about-us__features-feature-title--dark">Luxury Room</p>
                    <p class="about-us__features-feature-text about-us__features-feature-text--dark">Lorem ipsum dolor
                        sit
                        amet, consectetur adipisicing elit,
                        sed do eiusmod tempor.</p>
                </div>
            </section>
        </div>
    </section>
    <section class="rooms">
        <p class="font__title font__title--weight-700 upper__case rooms__title">Rooms</p>
        <p class="font__subtitle font__subtitle--height rooms__informative-text">Hand Picked Rooms</p>
        <div class="rooms__swiper swiper">
            <div class="rooms__swiper-wrapper swiper-wrapper">
                @foreach ($rooms as $room)
                    <div class="rooms__swiper-slide swiper-slide">
                        @component('amenitiesMenu', ['room' => $room, 'title' => true])
                        @endcomponent
                        <div class="rooms__image" style='background-image: url({{ $room['photo'] }});'>
                        </div>
                        <div class="rooms__details">
                            <div class="rooms__details-info">
                                <p class="rooms__details-title">{{ $room['type_name'] }}</p>
                                <p class="rooms__details-text">
                                    {{ $room['description'] }}
                                </p>
                            </div>
                            <p class="rooms__details-price">
                                <span>$</span>
                                <span>{{ $room['price'] }}</span>
                                <span>/Night</span>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="rooms__swiper-button-prev swiper-button-prev"></div>
            <div class="rooms__swiper-button-next swiper-button-next"></div>
        </div>
    </section>
    <section class="intro-video">
        <div class="intro-video__background"></div>
        <div class="intro-video__inner --max-width">
            <p class="intro-video__informative-text upper__case">Intro Video</p>
            <p class="intro-video__title">Meet With Our Luxury Place.</p>
            <p class="intro-video__text">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat you have to understand this.
            </p>
            <iframe id="player" class="intro-video__video" src="https://www.youtube.com/embed/Bu3Doe45lcU"
                title="Hotel Miranda in Bayahibe Dom. Rep. 4K" frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; picture-in-picture;" allowfullscreen></iframe>
            <button class="intro-video__button button upper__case"><a href="/offers.php">Book Now</a></button>
        </div>
    </section>
    <section class="facilities --max-width">
        <div class="facilities__inner ">
            <p class="facilities__informative-text upper__case">Facilities</p>
            <p class="facilities__title">Core Features</p>
            <div class="facilities__swiper swiper --max-width">
                <!-- Additional required wrapper -->
                <div class="facilities__swiper-wrapper swiper-wrapper">
                    <!-- Slides -->
                    <div class="facilities__swiper-slide swiper-slide">
                        <p class="facilities__swiper-slide-number">
                            01
                        </p>
                        <img class="facilities__swiper-slide-img" src="assets/img/high-rating.svg" alt="">
                        <p class="facilities__swiper-slide-title">Have High Rating</p>
                        <p class="facilities__swiper-slide-text">
                            Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna..
                        </p>
                    </div>
                    <div class="facilities__swiper-slide swiper-slide">
                        <p class="facilities__swiper-slide-number">
                            02
                        </p>
                        <img class="facilities__swiper-slide-img" src="assets/img/quiet-hours.svg" alt="">
                        <p class="facilities__swiper-slide-title">Quiet Hours</p>
                        <p class="facilities__swiper-slide-text">
                            Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna..
                        </p>
                    </div>
                    <div class="facilities__swiper-slide swiper-slide">
                        <p class="facilities__swiper-slide-number">
                            03
                        </p>
                        <img class="facilities__swiper-slide-img" src="assets/img/location.svg" alt="">
                        <p class="facilities__swiper-slide-title">Best Locations</p>
                        <p class="facilities__swiper-slide-text">
                            Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna..
                        </p>
                    </div>
                    <div class="facilities__swiper-slide swiper-slide">
                        <p class="facilities__swiper-slide-number">
                            04
                        </p>
                        <img class="facilities__swiper-slide-img" src="assets/img/free-cancelation.svg" alt="">
                        <p class="facilities__swiper-slide-title">Free Cancellation</p>
                        <p class="facilities__swiper-slide-text">
                            Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna..
                        </p>
                    </div>
                    <div class="facilities__swiper-slide swiper-slide">
                        <p class="facilities__swiper-slide-number">
                            05
                        </p>
                        <img class="facilities__swiper-slide-img" src="assets/img/payment.svg" alt="">
                        <p class="facilities__swiper-slide-title">Payment Options</p>
                        <p class="facilities__swiper-slide-text">
                            Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna..
                        </p>
                    </div>
                    <div class="facilities__swiper-slide swiper-slide">
                        <p class="facilities__swiper-slide-number">
                            06
                        </p>
                        <img class="facilities__swiper-slide-img" src="assets/img/special-offers.svg" alt="">
                        <p class="facilities__swiper-slide-title">Special Offers</p>
                        <p class="facilities__swiper-slide-text">
                            Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna..
                        </p>
                    </div>
                </div>
                <!-- If we need pagination -->
            </div>
            <div class="facilities__swiper-pagination swiper-pagination"></div>
        </div>
    </section>
    <section class="menu --max-width">
        <div class="menu__display">
            <img class="menu__display-img" src="assets/img/donut.svg" alt="donut">
        </div>
        <div class="menu__inner">
            <p class="menu__informative-text upper__case">Menu</p>
            <h2 class="menu__title">Our Foods Menu</h2>
            <div class="menu-foods__swiper swiper">
                <!-- Additional required wrapper -->
                <div class="menu-foods__swiper-wrapper swiper-wrapper">
                    <!-- Slides -->
                    <div class="menu-foods__swiper-slide swiper-slide">
                        <article class="menu__article">
                            <img class="menu__article-img" src="assets/img/eggs-bacon.jpg" alt="">
                            <div class="menu__article-text">
                                <p>Eggs & Bacon</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adip isicing elit, sed do eiusmod tempor.</p>
                            </div>
                            <img class="menu__article-arrow" src="assets/icon/arrow-hover.svg" alt="">
                        </article>
                        <article class="menu__article">
                            <img class="menu__article-img" src="assets/img/tea-coffe.jpg" alt="">
                            <div class="menu__article-text">
                                <p>Tea or Coffe</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adip isicing elit, sed do eiusmod tempor.</p>
                            </div>
                            <img class="menu__article-arrow" src="assets/icon/arrow-hover.svg" alt="">
                        </article>
                        <article class="menu__article">
                            <img class="menu__article-img" src="assets/img/chia-outmeal.jpg" alt="">
                            <div class="menu__article-text">
                                <p>Chia Oatmeal</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adip isicing elit, sed do eiusmod tempor.</p>
                            </div>
                            <img class="menu__article-arrow" src="assets/icon/arrow-hover.svg" alt="">
                        </article>
                    </div>
                    <div class="menu-foods__swiper-slide swiper-slide">
                        <article class="menu__article">
                            <img class="menu__article-img" src="assets/img/fruit-par.jpg" alt="">
                            <div class="menu__article-text">
                                <p>Fruit Parfait</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adip isicing elit, sed do eiusmod tempor.</p>
                            </div>
                            <img class="menu__article-arrow" src="assets/icon/arrow-hover.svg" alt="">
                        </article>
                        <article class="menu__article">
                            <img class="menu__article-img" src="assets/img/marmalade.jpg" alt="">
                            <div class="menu__article-text">
                                <p>Marmalade Selection</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adip isicing elit, sed do eiusmod tempor.</p>
                            </div>
                            <img class="menu__article-arrow" src="assets/icon/arrow-hover.svg" alt="">
                        </article>
                        <article class="menu__article">
                            <img class="menu__article-img" src="assets/img/chesse.jpg" alt="">
                            <div class="menu__article-text">
                                <p>Cheese Plate</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adip isicing elit, sed do eiusmod tempor.</p>
                            </div>
                            <img class="menu__article-arrow" src="assets/icon/arrow-hover.svg" alt="">
                        </article>
                    </div>
                    <div class="menu-foods__swiper-slide swiper-slide">
                        <article class="menu__article">
                            <img class="menu__article-img" src="assets/img/eggs-bacon.jpg" alt="">
                            <div class="menu__article-text">
                                <p>Eggs & Bacon</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adip isicing elit, sed do eiusmod tempor.</p>
                            </div>
                            <img class="menu__article-arrow" src="assets/icon/arrow-hover.svg" alt="">
                        </article>
                        <article class="menu__article">
                            <img class="menu__article-img" src="assets/img/tea-coffe.jpg" alt="">
                            <div class="menu__article-text">
                                <p>Tea or Coffe</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adip isicing elit, sed do eiusmod tempor.</p>
                            </div>
                            <img class="menu__article-arrow" src="assets/icon/arrow-hover.svg" alt="">
                        </article>
                        <article class="menu__article">
                            <img class="menu__article-img" src="assets/img/chia-outmeal.jpg" alt="">
                            <div class="menu__article-text">
                                <p>Chia Oatmeal</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adip isicing elit, sed do eiusmod tempor.</p>
                            </div>
                            <img class="menu__article-arrow" src="assets/icon/arrow-hover.svg" alt="">
                        </article>
                    </div>
                </div>
            </div>
            <div class="menu-foods__swiper-button-prev swiper-button-prev"></div>
            <div class=" menu-foods__swiper-button-next swiper-button-next"></div>
        </div>
        <div class="menu__swiper swiper">
            <!-- Additional required wrapper -->
            <div class="menu__swiper-wrapper swiper-wrapper">
                <!-- Slides -->
                <div class="menu__swiper-slide swiper-slide" style="background-image: url(assets/img/cooked-food.jpg);">
                </div>
                <div class="menu__swiper-slide swiper-slide"
                    style="background-image: url(assets/img/food-photography.jpg);">
                </div>
                <div class="menu__swiper-slide swiper-slide" style="background-image: url(assets/img/grilled-steak.jpg);">
                </div>
            </div>
        </div>
        <div class="menu__swiper-pagination swiper-pagination"></div>
    </section>
    <section class="stats --max-width">
        <div class="stats__inner">
            <article class="stats__article">
                <img class="stats__article-img" src="assets/img/rocket.svg" alt="cohete">
                <p class="stats__article-title">84k<span class="stats__article-title-plus">+</span></p>
                <p class="stats__article-text">Projects are Completed</p>
            </article>
            <article class="stats__article">
                <img class="stats__article-img" src="assets/img/persons.svg" alt="tres siluetas de personas">
                <p class="stats__article-title">10M<span class="stats__article-title-plus">+</span></p>
                <p class="stats__article-text">Active Backers Around World</p>
            </article>
            <article class="stats__article">
                <img class="stats__article-img" src="assets/img/currency.svg" alt="icono de una tabla de ganancias">
                <p class="stats__article-title">02k<span class="stats__article-title-plus">+</span></p>
                <p class="stats__article-text">Categories Served</p>
            </article>
            <article class="stats__article">
                <img class="stats__article-img" src="assets/img/book.svg" alt="icono de un libro abierto">
                <p class="stats__article-title">100M<span class="stats__article-title-plus">+</span></p>
                <p class="stats__article-text">Idea Raised Funds</p>
            </article>
        </div>
    </section>
    @if ($success === '1')
        @if ($redirection === '1')
            @component('swal', [
                'title' => '¡Thank you for your request!',
                'text' => 'We have received it correctly. Someone from our Team will get back to you very soon. The Miranda Hotel',
                'icon' => 'success',
            ])
            @endcomponent
        @else
            @component('swal', [
                'title' => 'Your message was sent successfully',
                'text' => 'Thanks for your time',
                'icon' => 'success',
            ])
            @endcomponent
        @endif
    @endif
@endsection
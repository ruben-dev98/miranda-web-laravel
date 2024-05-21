<div class="background__header">
    <span class="background__header-informative-text">We Make Your Feel Comfortable</span>
    <header class="header">
        <div class="header__menu">
            <img class="header__menu-icon --visible" src="{{ asset('./assets/icon/menu.svg') }}" alt="">
            <img class="header__menu-icon" src="{{ asset('./assets/icon/menu-x.svg') }}" alt="">
        </div>
        <div id="nav" class="header__logo">
            <a class="header__link" href="index">
                <span class="header__logo-img">
                    <img src="{{ asset('assets/img/logo-H.svg') }}" alt="logo con la letra H">
                </span>
                <h2 class="header__logo-title upper__case">
                    <span>Hotel</span>
                    <span>Miranda</span>
                </h2>
            </a>
        </div>
        <nav class="header__nav" hidden>
            <ul>
                <li><a href="about">About Us</a></li>
                <li><a href="rooms">Rooms</a></li>
                <li><a href="offers">Offers</a></li>
                <li><a href="contact">Contact</a></li>
            </ul>
        </nav>
        <div class="header__icons">
            <img class="header__icons-icon" src="{{ asset('assets/icon/user.svg') }}">
            <img class="header__icons-icon" src="{{ asset('assets/icon/search.svg') }}">
        </div>
    </header>
</div>
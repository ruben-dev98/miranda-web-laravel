<div class="background__header">
    <span class="background__header-informative-text">We Make Your Feel Comfortable</span>
    <header class="header">
        <div class="header__menu">
            <img class="header__menu-icon {{ $class }} --visible " src="{{ asset('./assets/icon/menu.svg') }}" alt="">
            <img class="header__menu-icon {{ $class }}" src="{{ asset('./assets/icon/menu-x.svg') }}" alt="">
        </div>
        <div id="nav" class="header__logo">
            <a class="header__link" href="{{ route('home') }}">
                <span class="header__logo-img">
                    <img src="{{ asset('assets/img/logo-H.svg') }}" alt="logo con la letra H">
                </span>
                <h2 class="header__logo-title upper__case">
                    <span>Hotel</span>
                    <span>Miranda</span>
                </h2>
            </a>
        </div>
        <nav class="header__nav">
            <ul>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('rooms') }}">Rooms</a></li>
                <li><a href="{{ route('offers') }}">Offers</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>
        <div class="header__icons">
            @if (Auth::user())
                <div>
                    <x-dropdown>
                        <x-slot name="trigger">
                            <img class="header__icons-icon" src="{{ asset('assets/icon/user.svg') }}">
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <a href={{ route('login') }}><img class="header__icons-icon" src="{{ asset('assets/icon/user.svg') }}"></a>
            @endif
        </div>
    </header>
</div>

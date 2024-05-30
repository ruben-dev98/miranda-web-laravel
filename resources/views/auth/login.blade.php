<x-guest-layout>
    <!-- Session Status -->
    @section('title', 'Login')
    @section('content')
        <header class="banner">
            <div class="banner__inner banner__inner--about --max-width">
                <p class="font__title font__title--dark upper__case">The Ultimate Luxury </p>
                <h2 class="font__subtitle font__subtitle--banner font__subtitle--dark">Login</h2>
            </div>
            <div class="banner__pagination">
                <span>Home</span><span>|</span><span>Login</span>
            </div>
        </header>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" class="--max-width form" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-control form-control--no-margin">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <!-- Password -->
            <div class="form-control">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="form-control form-contol--check">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="form-control form-control--flex">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('register') }}">
                    {{ __('You don`t have an account. Register Now!') }}
                </a>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-4"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button>
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    @endsection
</x-guest-layout>

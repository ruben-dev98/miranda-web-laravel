<x-guest-layout>
    <div class="info">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" class="--max-width form" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="form__control">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')"/>
        </div>

        <div class="form-control form-control--flex">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

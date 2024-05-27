<x-app-layout>
    @section('title', 'Dashboard')
    @section('content')
        <header class="banner">
            <div class="banner__inner banner__inner--about --max-width">
                <p class="font__title font__title--dark upper__case">The Ultimate Luxury </p>
                <h2 class="font__subtitle font__subtitle--banner font__subtitle--dark">Dashboard</h2>
            </div>
            <div class="banner__pagination">
                <span>Home</span><span>|</span><span>Dashboard</span>
            </div>
        </header>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>

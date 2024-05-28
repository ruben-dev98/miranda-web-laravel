<x-app-layout>
    @section('title', 'Dashboard')
    @section('content')
        <header class="banner">
            <div class="banner__inner banner__inner--about --max-width">
                <p class="font__title font__title--dark upper__case">The Ultimate Luxury </p>
                <h2 class="font__subtitle font__subtitle--banner font__subtitle--dark">Order Details</h2>
            </div>
            <div class="banner__pagination">
                <span>Home</span><span>|</span><span>Order Details</span>
            </div>
        </header>
        <div class="py-12">
            <div>
                {{ $order->id }}
                {{ $order->room->name() }}
                {{ $order->user->full_name }}
                {{ $order->description }}
                {{ $order->type }}
            </div>
        </div>
    @endsection
</x-app-layout>

<x-app-layout>
    @section('title', 'Dashboard')
    @section('content')
        <header class="banner">
            <div class="banner__inner banner__inner--about --max-width">
                <p class="font__title font__title--dark upper__case">The Ultimate Luxury </p>
                <h2 class="font__subtitle font__subtitle--banner font__subtitle--dark">Orders</h2>
            </div>
            <div class="banner__pagination">
                <span>Home</span><span>|</span><span>Orders</span>
            </div>
        </header>
        <div class="py-12 --max-width --center">
            <div class="form-control form-control--flex">
                <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', {name: 'create-new-order',
                data: {} })">
                    + New Order
                </x-primary-button>
            </div>
            @if (count($orders) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            @foreach (['Room', 'Type', 'Description', 'Actions'] as $prop)
                                <th>{{ $prop }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->room->name() }}</td>
                                <td>{{ $order->type }}</td>
                                <td>{{ $order->description }}</td>
                                <td class="actions">
                                    <button x-data="{
                                        id: '{{ $order->id }}',
                                        type: '{{ $order->type }}',
                                        description: '{{ $order->description }}'
                                    }"
                                        x-on:click.prevent="$dispatch('open-modal', 
                                        {
                                            name:'edit-order', 
                                            data: {
                                                id: id, 
                                                type: type, 
                                                description: description
                                            }
                                        })">
                                        <img src="{{ asset('assets/icon/edit-order.svg') }}">
                                    </button>
                                    <form method="POST" action="{{ route('orderDelete', ['order' => $order->id]) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">
                                            <a href="{{ route('dashboard') }}" class="delete__order">
                                                <img src="{{ asset('assets/icon/delete-order.svg') }}">
                                            </a>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div>
                    No hay ninguna orden
                </div>
            @endif
        </div>
        @include('orders.modalCreate')
        @include('orders.modalEdit')
    @endsection
</x-app-layout>

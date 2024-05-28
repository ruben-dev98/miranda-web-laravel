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
                <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-new-order')">
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
                                    <button x-data="{{ $order }}"
                                        x-on:click.prevent="$dispatch('open-modal', 'edit-order')">
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
        <x-modal name="create-new-order" focusable>
            <form method="post" class="form form--modal --max-width" action="{{ route('orderNew') }}" class="p-6">
                @csrf

                <h2 class="profile__title">
                    {{ __('Create a new order') }}
                </h2>
                <x-text-input id="user_id" type="hidden" name="user_id" :value="Auth::id()" />

                <div class="form-control">
                    <x-input-label for="room_id" :value="__('Room')" />
                    <select class="form__select" name="room_id" id="room">
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name() }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('room_id')" />
                </div>

                <div class="form-control">
                    <x-input-label for="type" :value="__('Type')" />
                    <select class="form__select" name="type" id="type">
                        @foreach ($types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('type')" />
                </div>

                <div class="form-control">
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea class="form__area" name="description" id="description" cols="30" rows="10"></textarea>
                    <x-input-error :messages="$errors->get('description')" />
                </div>

                <div class="form-control form-control--flex">
                    <x-primary-button class="new__order">
                        {{ __('Create New Order') }}
                    </x-primary-button>
                </div>
            </form>
        </x-modal>
        <x-modal name="edit-order" focusable>
            <form method="post" class="form form--modal --max-width" action="{{ route('orderNew') }}"
                class="p-6">
                @csrf

                <h2 class="profile__title">
                    {{ __('Create a new order') }}
                </h2>

                <div class="form-control">
                    <x-input-label for="type" :value="__('Type')" />
                    <select class="form__select" name="type" id="type"
                        value="{{ $order->type }}">
                        @foreach ($types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('type')" />
                </div>

                <div class="form-control">
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea class="form__area" name="description" id="description" cols="30" rows="10">{{ $order->description }}</textarea>
                    <x-input-error :messages="$errors->get('description')" />
                </div>

                <div class="form-control form-control--flex">
                    <x-primary-button class="edit__order">
                        {{ __('Edit Order') }}
                    </x-primary-button>
                </div>
            </form>
        </x-modal>
    @endsection
</x-app-layout>

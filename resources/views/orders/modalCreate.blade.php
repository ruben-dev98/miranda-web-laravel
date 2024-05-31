<x-modal name="create-new-order" focusable>
    <form method="post" class="form form--modal --max-width" action="{{ route('orderNew') }}" class="p-6">
        @csrf

        <h2 class="profile__title">
            {{ __('Create a new order') }}
        </h2>

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

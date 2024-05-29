<x-modal name="edit-order" focusable>
    <form method="POST" class="form form--modal --max-width" action="{{ route('orderUpdate') }}" class="p-6">
        @csrf
        @method('patch')
        <h2 class="profile__title">
            {{ __('Edit an order') }}
        </h2>
        <x-text-input id="id" type="hidden" name="id" x-bind:value="data.id" />
        <div class="form-control">
            <x-input-label for="type" :value="__('Type')" />
            <select class="form__select" name="type" id="type" x-bind:value="data.type">
                @foreach ($types as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('type')" />
        </div>

        <div class="form-control">
            <x-input-label for="description" :value="__('Description')" />
            <textarea class="form__area" name="description" id="description" cols="30" rows="10" x-bind:value="data.description"></textarea>
            <x-input-error :messages="$errors->get('description')" />
        </div>

        <div class="form-control form-control--flex">
            <x-primary-button class="edit__order">
                {{ __('Edit Order') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>

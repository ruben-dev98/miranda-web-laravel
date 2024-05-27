@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'errors']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

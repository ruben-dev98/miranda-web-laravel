<button {{ $attributes->merge(['type' => 'submit', 'class' => 'button button--form upper__case']) }}>
    {{ $slot }}
</button>

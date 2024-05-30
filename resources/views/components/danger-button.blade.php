<button {{ $attributes->merge(['type' => 'submit', 'class' => 'button button--red button--form upper__case']) }}>
    {{ $slot }}
</button>

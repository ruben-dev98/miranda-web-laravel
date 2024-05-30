<button {{ $attributes->merge(['type' => 'button', 'class' => 'button button--transparent button--form button--modal upper__case']) }}>
    {{ $slot }}
</button>

<button id="swal">
</button>
<script defer>
    Swal.fire({
        title: '{{ $title }}',
        text: '{{ $text }}',
        icon: '{{ $icon }}',
        showConfirmButton: false,
        timer: 2500
    })
</script>

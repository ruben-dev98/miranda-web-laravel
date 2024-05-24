<!DOCTYPE html>
<html lang="es">
@component('head')
@endcomponent

<body>
    @component('header')
    @endcomponent
    @section('content')
    @show
    @component('footer')
    @endcomponent
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        @if (session('booking'))
            @component('swal', [
                'title' => '¡Thank you for your request!',
                'text' => 'We have received it correctly. Someone from our Team will get back to you very soon. The Miranda Hotel',
                'icon' => 'success',
            ])
            @endcomponent
        @else
            @component('swal', [
                'title' => 'Your message was sent successfully',
                'text' => 'Thanks for your time',
                'icon' => 'success',
            ])
            @endcomponent
        @endif
    @endif
    @if ($errors->any())
        @component('swal', [
                'title' => 'Validation errors',
                'text' => implode('\n', $errors->all()),
                'icon' => 'error',
            ])
        @endcomponent
    @endif
</body>

</html>

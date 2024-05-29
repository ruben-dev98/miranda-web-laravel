<!DOCTYPE html>
<html lang="es">

<head>
    @vite(['resources/css/app.css'])
    @component('head')
    @endcomponent
</head>

<body>
    @component('header', ['class' => 'header__menu--login'])
    @endcomponent
    @section('content')
    @show
    @component('footer')
    @endcomponent
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        @if (session('store'))
            @component('swal', [
                'title' => '¡Order Created Successfully!',
                'text' => 'We have received it correctly.',
                'icon' => 'success',
            ])
            @endcomponent
        @elseif (session('update'))
            @component('swal', [
                'title' => '¡Order Updated Successfully!',
                'text' => 'We have updated it correctly.',
                'icon' => 'success',
            ])
            @endcomponent
        @elseif (session('destroy'))
            @component('swal', [
                'title' => '¡Order Deleted Successfully!',
                'text' => 'We have deleted it correctly.',
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
    @php
        session()->forget(['success', 'store', 'update', 'destroy']);
    @endphp
</body>

</html>

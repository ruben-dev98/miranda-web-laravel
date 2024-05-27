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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

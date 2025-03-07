<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name') }} - @yield('title', 'Default Page')</title>

    <link rel="shortcut icon" href="https://laravel.com/img/favicon/favicon-32x32.png" type="image/x-icon">

    {{-- Tabler CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/tabler/tabler.min.css') }}" />

    {{-- iziToast CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/izitoast/css/iziToast.min.css') }}" />

    {{-- Boxicons CSS --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">

    @stack('css')
</head>

<body>
    <div class="page">
        @include('admin.components.partials.sidebar')
        <div class="page-wrapper">
            @include('admin.components.partials.navbar')

            <div class="page-header d-print-none mt-0">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    {{-- JQuery JS --}}
    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>

    {{-- Tabler JS --}}
    <script src="{{ asset('assets/admin/vendor/tabler/tabler.min.js') }}"></script>

    {{-- iziToast JS --}}
    <script src="{{ asset('assets/admin/vendor/izitoast/js/iziToast.min.js') }}"></script>

    @include('admin.components.utils.izitoast')
    @stack('js')
</body>

</html>

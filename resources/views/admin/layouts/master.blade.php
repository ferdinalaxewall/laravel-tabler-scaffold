<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name') }} - @yield('title', 'Default Page')</title>

    <link rel="shortcut icon" href="https://laravel.com/img/favicon/favicon-32x32.png" type="image/x-icon">

    {{-- Tabler CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/tabler/tabler.min.css') }}" />

    {{-- dataTables CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/dataTables/dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/dataTables/dataTables-bootstrap.css') }}">

    {{-- iziToast CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/izitoast/css/iziToast.min.css') }}" />

    {{-- Boxicons CSS --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap/dist/css/jsvectormap.min.css" />

    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">

    @stack('css')
</head>

<body>
    <div class="page">
        @include('admin.components.partials.sidebar')
        <div class="page-wrapper">
            @include('admin.components.partials.navbar')

            <div class="page-header d-print-none mt-0 tabler-content-wrapper">
                <div class="container-xl pb-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    {{-- JQuery JS --}}
    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>

    {{-- Tabler JS --}}
    <script src="{{ asset('assets/admin/vendor/tabler/tabler.min.js') }}"></script>

    {{-- dataTables JS --}}
    <script src="{{ asset('assets/admin/vendor/dataTables/dataTables.min.js') }}"></script>

    {{-- ApexChart JS --}}
    <script src="{{ asset('assets/admin/vendor/apexcharts/apexcharts.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/jsvectormap"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap/dist/maps/world.js"></script>

    {{-- iziToast JS --}}
    <script src="{{ asset('assets/admin/vendor/izitoast/js/iziToast.min.js') }}"></script>

    {{-- Custom JS --}}
    <script src="{{ asset('assets/admin/js/script.js') }}"></script>

    @include('admin.components.utils.izitoast')
    @stack('js')
</body>

</html>

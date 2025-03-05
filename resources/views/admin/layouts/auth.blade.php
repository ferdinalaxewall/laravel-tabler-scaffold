<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} - @yield('title', 'Authentication')</title>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('assets/admin/vendor/tabler/tabler.min.css') }}" rel="stylesheet">
    <!-- END GLOBAL MANDATORY STYLES -->

    {{-- iziToast CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/izitoast/css/iziToast.min.css') }}" />

    @stack('css')
</head>

<body>
    <div class="page page-center">
        <div class="container container-normal py-4">
            @yield('content')
        </div>
    </div>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/admin/vendor/tabler/tabler.min.js') }}" defer=""></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    {{-- iziToast JS --}}
    <script src="{{ asset('assets/admin/vendor/izitoast/js/iziToast.min.js') }}"></script>

    @include('admin.components.utils.izitoast')

    @stack('js')
</body>
</html>

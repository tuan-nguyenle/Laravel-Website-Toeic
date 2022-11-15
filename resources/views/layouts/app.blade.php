<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <!-- Fonts -->
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    {{-- style --}}
    <link href="{{ asset('themes/admin/css/style.min.css') }}" rel="stylesheet">
    @yield('css')
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app.5380b351.css') }}">
    <script src="{{ asset('build/assets/app.f3be8547.js') }}"></script> --}}
</head>

<body>
    <div id="app">
        {{-- @include('layouts.header') --}}
        <main class="py-4">
            @yield('content')
        </main>
        {{-- @include('layouts.footer') --}}
    </div>
    {{-- JS --}}
    <script src="{{ asset('themes/admin/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('themes/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/admin/js/app-style-switcher.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('themes/admin/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('themes/admin/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('themes/admin/js/custom.js') }}"></script>
    @yield('js')
</body>

</html>

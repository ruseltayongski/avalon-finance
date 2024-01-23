<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Avalon Finance') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/theme-switcher.js', 'resources/js/alpine.js'])

    <style>
        .loading-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #011523;
            z-index: 1000;
        }

        .avalon-logo {
            width: 40%;
        }       
    </style>

    @yield('css')
</head>
<body>
    @include('layouts._loading-container')
    <div id="app" x-data="{ isMobile: window.innerWidth <= 1024 }"
        x-init="() => {
            window.addEventListener('resize', () => {
                isMobile = window.innerWidth <= 1024;
            });
        }">
        {{-- @include('layouts._header') --}}
        @yield('content')
        @include('layouts._footer')
    </div>
    @include('layouts._themeSwitcher')
</body>
<script>
    window.addEventListener('load', function() {
        var loadingContainer = document.getElementById('loadingContainer');
        loadingContainer.style.display = 'none';
    });
</script>
@yield('js')
</html>

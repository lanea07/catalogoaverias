@props(['title'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Catalogo de Averías') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="/js/pre_render-scripts.js"></script>
        @vite(['resources/js/app.js', 'resources/sass/app.scss', 'resources/css/app.css'])
    </head>
    <body class="bg-secondary-subtle container d-flex align-items-center justify-content-center min-vh-100">
        <div class="rounded shadow bg-body-tertiary">
            <div class="py-5 d-flex align-items-center justify-content-center">
                    <x-application-logo height="80"/>
            </div>

            <div class="px-5 pb-5 rounded">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

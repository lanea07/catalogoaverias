<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/js/app.js', 'resources/sass/app.scss', 'resources/css/app.css'])
    </head>
    <body class="bg-secondary-subtle container d-flex align-items-center justify-content-center">
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

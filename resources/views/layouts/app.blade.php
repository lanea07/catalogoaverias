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

    <!-- Scripts -->
    <script src="/js/pre_render-scripts.js"></script>
    @vite(['resources/js/app.js', 'resources/sass/app.scss', 'resources/css/app.css'])
    @livewireStyles

</head>

<body class="d-flex flex-column overflow-hidden min-vh-100 vh-100">
    <x-bootstrap-default-svgs></x-bootstrap-default-svgs>
    @include('partials.navbar')
    @include('partials.offcanvas')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="ps-4 py-2 text-secondary">
            {{ $header }}
        </header>
    @endif

    <!-- Page Content -->
    <main class="flex-fill overflow-auto">
        {{ $slot }}
    </main>

    @include('partials.footer')

    @livewireScripts
    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="https://kit.fontawesome.com/a3c1770e9c.js" crossorigin="anonymous"></script>

</body>

</html>
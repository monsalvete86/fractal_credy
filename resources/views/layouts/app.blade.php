<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet"> 
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @trixassets
        <!-- <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css"> -->
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- <script src="https://unpkg.com/@popperjs/core@2"></script> -->
        <!-- <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script> -->
    </head>
    <body class="font-sans antialiased bg-white">
        <x-jet-banner />
        @livewire('navigation-menu')

        <!-- Page Heading -->
        <header class="d-flex py-1 bg-white shadow-sm border-bottom border-secondary">
            <div class="container">
                {{ $header }}
            </div>
        </header>
          
        <!-- Page Content -->
        <main class="container my-2 bg-light border-bottom rounded-top">
            {{ $slot }}
        </main>

        @stack('modals')

        @livewireScripts

        @stack('scripts')
        <footer id="footer" class="footer text-center col-12">
            <small>
                Powered By <a href="">FRACTAL AGENCIA DIGITAL</a>
            </small>
        </footer>
    </body>
</html>

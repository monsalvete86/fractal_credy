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
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @trixassets
        <!-- <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css"> -->
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <!-- <script src="https://unpkg.com/@popperjs/core@2"></script> -->
        <!-- <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script> -->
    </head>
    <body class="font-sans antialiased bg-light">
        <x-jet-banner />
        @livewire('navigation-menu')

        <!-- Page Heading -->
        <header class="d-flex py-3 bg-white shadow-sm border-bottom">
            <div class="container">
                {{ $header }}
            </div>
        </header>
          
        <!-- Page Content -->
        <main class="container my-5 card-body bg-white px-5 py-3 border-bottom rounded-top">
            {{ $slot }}
        </main>

        @stack('modals')

        @livewireScripts

        @stack('scripts')
    </body>
</html>

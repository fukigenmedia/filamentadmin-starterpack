<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') - {{ env('APP_NAME') }}</title>

        <!-- CORE -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/heropattern.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Icon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}" type="image/x-icon">

        <!-- Livewire Styles -->
        @livewireStyles

        <!-- Component Style -->
        @stack('styles')
    </head>

    <body class="@yield('body-class')">
        @yield('content')

        <!-- Livewire Styles -->
        @livewireScripts

        <!-- Component Script -->
        <script>console.log('DEVELOPED BY FUKIGEN MEDIA @fukigen.media')</script>
        @stack('scripts')
    </body>
</html>

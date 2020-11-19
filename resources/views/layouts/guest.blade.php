<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script type="text/javascript" src="{{ mix('js/app.js') }}" defer></script>
    
        <livewire:styles />
        @stack('styles')
    </head>
    <body class="font-body antialiased">
        <div class="min-h-screen bg-gray-100">
            {{ $slot }}
        </div>

        <livewire:scripts />
        @stack('scripts')
    </body>
</html>

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
            @include('layouts.partials.navigation')

            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        <livewire:scripts />
        @stack('scripts')
    </body>
</html>

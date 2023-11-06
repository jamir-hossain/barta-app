<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body 
        class="font-sans antialiased flex h-screen bg-gray-50 dark:bg-[#00000e]" 
    >
        <x-layout.sidebar />

        <div class="w-full h-full flex flex-col">
            <x-layout.navbar />
            
            <main class="h-full overflow-y-auto container p-6 mx-auto">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

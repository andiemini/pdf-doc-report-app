<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        {{--Icons--}}
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased h-screen bg-gray-200">
        <div class="bg-gray-100 flex">
        @include('layouts.sidebar')
            <div class="flex-auto">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow pt-4">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            <div x-data="{ sidebarOpen: false }" class="flex h-full bg-gray-200">

                    <!-- Page Content -->
                    <main class="container max-w-7xl mx-auto">
                        @yield('content')
                        @include('layouts.footer')
                    </main>

                </div>

            </div>

        </div>


    </body>
</html>

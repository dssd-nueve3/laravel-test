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
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

@livewireStyles

<!-- Scripts -->

    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- Font Awesome JS -->

    @include('includes.general.head')
</head>
<body class="font-sans antialiased">
<x-jet-banner/>

<div class="min-h-screen bg-gray-100">
@livewire('navigation-menu')
@if(Session::has('success')) <div class="bg-green-500 p-4 my-4 max-w-3xl rounded text-white mx-auto animate__animated animate__fadeOut animate__delay-2s">{{Session::get('success')}}</div>@endif
<!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
@endif

<!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

@stack('modals')
@stack('scripts')
@yield('scripts')

@livewireScripts
@include('includes.general.scripts')
</body>
</html>

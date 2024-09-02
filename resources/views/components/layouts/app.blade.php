<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Include your CSS files here -->
    <link rel="stylesheet" href="{{ asset('css/myedspace-theme.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
<header>

    <nav class="p-4 bg-gray-100">
        <div class="container flex items-center justify-between mx-auto">
            <a href="{{ route('tutors.index') }}" class="text-white">
                <img src="{{ asset('images/myedspace-logo.svg') }}" alt="Logo" class="h-10 m-5">
            </a>
        </div>

    </nav>
</header>

<main class="py-4 bg-gray-100">
    @yield('content')
</main>

<footer>
    <div class="container py-4 mx-auto text-center text-gray-500">
       <div class="float-center">
            <h3> Copyright © Myedspace Limited {{ now()->year }}.</h3>
            <p>
       </div>
    </div>
</footer>

@livewireScripts
</body>
</html>

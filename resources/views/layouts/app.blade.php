<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css'])
</head>

<body class="antialiased">
    <main id="app"
        class="items-top relative flex min-h-screen w-full flex-col items-center bg-slate-400 dark:bg-gray-900 sm:pt-0">

        <h1 class="p-4 font-bold">layout principal</h1>

        @yield('content')
    </main>

    @vite(['resources/js/app.js'])
</body>

</html>

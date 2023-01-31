<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css'])
</head>

<body class="antialiased">
    <div class="relative bg-white">
        <div class="mx-auto max-w-7xl px-6">
            <div
                class="flex items-center justify-between border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">

                <div class="flex justify-start">
                    <a href="/">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto sm:h-10"
                            src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                    </a>
                </div>

                <nav class="hidden space-x-10 md:flex">
                    <a class="text-base font-medium text-gray-500 hover:text-gray-900"
                        href="{{ route('users.index') }}">Usuários</a>
                    <a class="text-base font-medium text-gray-500 hover:text-gray-900"
                        href="{{ route('books.index') }}">Livros</a>
                    <a class="text-base font-medium text-gray-500 hover:text-gray-900"
                        href="{{ route('genres.index') }}">Gêneros</a>
                    <a class="text-base font-medium text-gray-500 hover:text-gray-900"
                        href="{{ route('loans.index') }}">Empréstimos</a>
                </nav>
            </div>

            @if ($message = Session::get('success'))
                <div class="mb-4 flex rounded-lg bg-green-100 p-4 text-sm text-green-700" role="alert">
                    <svg class="mr-3 inline h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium">Success!</span>
                        {{ $message }}
                    </div>
                </div>
            @endif

            <main
                class="items-top relative flex min-h-screen w-full flex-col items-center py-4 dark:bg-gray-900 sm:pt-0"
                id="app">

                @yield('content')

            </main>
        </div>
    </div>

    @vite(['resources/js/app.js'])
</body>

</html>

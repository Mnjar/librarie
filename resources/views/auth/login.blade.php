<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="bg-gray">
    <header class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <img src="{{ asset('assets/Logo.png')}}" alt="Librarie logo" class="w-10 h-10" width="40" height="40" />
                <span class="ml-2 text-xl font-bold text-purple-600">Librarie</span>
            </div>
            <nav class="hidden md:flex space-x-6 items-center">
                <a href="{{ route('home')}}" class="text-gray-600 hover:text-purple-600">Home</a>
                <a href="#" class="text-gray-600 hover:text-purple-600">@lang('home.about')</a>
                <a href="#" class="text-gray-600 hover:text-purple-600">@lang('home.vision')</a>
                <a href="#" class="text-gray-600 hover:text-purple-600">@lang('home.contact_us')</a>
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" type="button"
                        class="inline-flex items-center text-gray-600 hover:text-purple-600 focus:outline-none">
                        Languages
                        <svg class="ml-1 w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.23 7.97a.75.75 0 0 1 1.06 0L10 11.68l3.71-3.71a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.23 9.03a.75.75 0 0 1 0-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false"
                        x-transition:enter="transition ease-out duration-100 transform opacity-0 scale-95"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75 transform opacity-100 scale-100"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black/5 focus:outline-none z-10">
                        <div class="py-1">
                            <a href="locale/en"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">English</a>
                            <a href="locale/id"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Indonesia</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main class="pt-20 flex justify-center items-center min-h-screen">
        <div class="flex flex-col md:flex-row bg-white rounded-lg shadow-lg overflow-hidden max-w-4xl">
            <div class="bg-blue-600 text-white p-8 flex flex-col items-center justify-center md:w-1/2">
                <img alt="Logo" class="mb-4" height="100" src="{{ asset('assets/Logo.png') }}" width="100" />
                <h1 class="text-4xl font-bold">Welcome</h1>
                <h2 class="text-4xl font-bold">Back!</h2>
                <img alt="Illustration of a person reading a book while sitting on a stack of books" class="mt-8"
                    height="200"
                    src="https://storage.googleapis.com/a1aa/image/xtM9wDhlDybdB5gViZoz6fQ3e85VBlN673Q77SRa2MLF8F7TA.jpg"
                    width="200" />
            </div>
            <div class="p-8 md:w-1/2">
                <h2 class="text-2xl font-bold mb-2">@lang('login.welcome')</h2>
                <p class="text-gray-600 mb-6">@lang('login.login_message')</p>
                <!-- Display Error Messages -->
                @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2" for="email">
                            @lang('login.email') <span class="text-red-500">*</span>
                        </label>
                        <input
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            id="email" name="email" required type="email" value="{{ old('email') }}" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2" for="password">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <input
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            id="password" name="password" required type="password" />
                        <a class="text-sm text-blue-600 float-right mt-1" href="{{ route('password.request') }}">@lang('login.forgor_password')</a>
                    </div>
                    <button
                        class="w-full bg-orange-500 text-white py-2 rounded-lg font-bold hover:bg-orange-600 transition duration-300"
                        type="submit">
                        Login
                    </button>
                </form>
                <p class="text-center text-gray-600 mt-6">
                    @lang('login.dont_have_account')
                    <a class="text-blue-600 font-bold" href="{{ route('register') }}">@lang('login.register')</a>
                </p>
                <p class="text-center text-gray-600 mt-6">
                    <a class="text-blue-600 font-bold" href="{{ route('admin.login') }}">@lang('login.login_as_admin')</a>
                </p>
            </div>
        </div>
    </main>
</body>


</html>

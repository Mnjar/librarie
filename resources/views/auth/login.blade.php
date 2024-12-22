<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-blue-600 flex items-center justify-center min-h-screen">
    <div class="flex flex-col md:flex-row bg-white rounded-lg shadow-lg overflow-hidden max-w-4xl">
        <div class="bg-blue-600 text-white p-8 flex flex-col items-center justify-center md:w-1/2">
            <img alt="Logo" class="mb-4" height="100" src="{{asset('assets/Logo.png')}}" width="100"/>
            <h1 class="text-4xl font-bold">Welcome</h1>
            <h2 class="text-4xl font-bold">Back!</h2>
            <img alt="Illustration of a person reading a book while sitting on a stack of books" class="mt-8" height="200" src="https://storage.googleapis.com/a1aa/image/xtM9wDhlDybdB5gViZoz6fQ3e85VBlN673Q77SRa2MLF8F7TA.jpg" width="200"/>
        </div>
        <div class="p-8 md:w-1/2">
            <h2 class="text-2xl font-bold mb-2">Hello! Welcome back.</h2>
            <p class="text-gray-600 mb-6">Login with the data you entered during Registration.</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="email">
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                           id="email" name="email" required type="email" value="{{ old('email') }}"/>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="password">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                           id="password" name="password" required type="password"/>
                    <a class="text-sm text-blue-600 float-right mt-1" href="{{ route('password.request') }}">Forgot Password?</a>
                </div>
                <button class="w-full bg-orange-500 text-white py-2 rounded-lg font-bold hover:bg-orange-600 transition duration-300" type="submit">
                    Login Now
                </button>
            </form>
            <p class="text-center text-gray-600 mt-6">
                Don't have an Account?
                <a class="text-blue-600 font-bold" href="{{ route('register')}}">REGISTER</a>
            </p>
        </div>
    </div>
</body>
</html>

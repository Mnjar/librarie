<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Sign Up Page
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="bg-blue-600 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg flex flex-col md:flex-row w-full max-w-4xl">
        <div class="p-8 md:w-1/2">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">SIGN UP</h2>
                <a class="text-sm text-gray-500" href="{{ route('login')}}">
                    Already have an account?
                    <span class="text-blue-600">LOGIN</span>
                </a>
            </div>
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
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Full Name
                        <span class="text-red-500">*</span>
                    </label>
                    <input
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                        type="text" name="name" value="{{ old('name') }}" required />
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Email Address
                        <span class="text-red-500">*</span>
                    </label>
                    <input
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                        type="email" name="email" value="{{ old('email') }}" required />
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">User Name
                        <span class="text-red-500">*</span>
                    </label>
                    <input
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                        type="text" name="username" value="{{ old('username') }}" required />
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Password
                        <span class="text-red-500">*</span>
                    </label>
                    <input
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                        type="password" name="password" required />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Confirm Password
                        <span class="text-red-500">*</span>
                    </label>
                    <input
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                        type="password" name="password_confirmation" required />
                </div>
                <button class="w-full bg-orange-500 text-white py-2 rounded-md hover:bg-orange-600" type="submit">
                    Sign Up
                </button>
            </form>
        </div>
        <div class="bg-blue-600 text-white p-8 md:w-1/2 flex flex-col justify-center items-center">
            <img alt="Logo" class="mb-4" height="100" src="{{asset('assets/Logo.png')}}" width="100" />
            <h2 class="text-3xl font-bold mb-2">Explore the World</h2>
            <h3 class="text-xl mb-4">with
                <span class="font-bold">BOOKS</span>
            </h3>
            <img alt="Illustration of a person reading a book under a tree" class="mt-4" height="200"
                src="https://storage.googleapis.com/a1aa/image/VAee3WvxmVnm1kZ7rW6krQCqwnR1xLE63UszmLilbhb30F7TA.jpg"
                width="200" />
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="bg-gray flex items-center justify-center min-h-screen">
    <div class="flex flex-col md:flex-row bg-white rounded-lg shadow-lg overflow-hidden max-w-4xl">
        <div class="bg-blue-600 text-white p-8 flex flex-col items-center justify-center md:w-1/2">
            <img alt="Logo" class="mb-4" height="100" src="{{ asset('assets/Logo.png') }}" width="100" />
            <h1 class="text-4xl font-bold">Admin Login</h1>
            <h2 class="text-2xl font-bold">Please log in to access the admin dashboard.</h2>
        </div>
        <div class="p-8 md:w-1/2">
            <h2 class="text-2xl font-bold mb-2">Hello Admin!</h2>
            <p class="text-gray-600 mb-6">Login with your admin credentials.</p>
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
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="email">
                        Email Address <span class="text-red-500">*</span>
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
                </div>
                <button
                    class="w-full bg-orange-500 text-white py-2 rounded-lg font-bold hover:bg-orange-600 transition duration-300"
                    type="submit">
                    Login as Admin
                </button>
            </form>
        </div>
    </div>
</body>

</html>

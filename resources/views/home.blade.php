<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Librarie</title>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>

</head>

<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <img src="{{ asset('assets/Logo.png') }}" alt="Librarie logo" class="w-10 h-10" width="40"
                    height="40" />
                <span class="ml-2 text-xl font-bold text-purple-600">Librarie</span>
            </div>
            <nav class="hidden md:flex space-x-6 items-center">
                <a href="home.html" class="text-gray-600 hover:text-purple-600">Home</a>
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

            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-purple-600">Login</a>
                <a href="{{ route('register') }}" class="bg-orange-500 text-white px-4 py-2 rounded-full">Sign Up</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-white py-16 w-full">
        <div class="container mx-auto px-4 text-center md:text-left flex flex-col md:flex-row md:justify-between">
            <div class="flex justify-center mt-8 md:hidden">
                <img src="https://storage.googleapis.com/a1aa/image/Nmk5TOZYXJZYLhzR9I1N3HUM2KTqSLKLMeF3oiNUB0Ht2i9JA.jpg"
                    alt="Books on a mobile screen" class="w-1/3" width="200" height="200" />
            </div>
            <div class="flex items-center">
                <div style="max-width: 40rem">
                    <h1 class="text-4xl font-bold text-purple-600">@lang('home.welcome')</h1>
                    <p class="text-gray-600 mt-4">
                        @lang('home.description')
                    </p>
                    {{-- <button class="bg-orange-500 text-white px-6 py-3 rounded-full mt-6">Get Started For Free</button> --}}
                    <div class="mt-8 hidden md:block">
                        <p class="text-gray-600">@lang('home.contact_us')</p>
                        <p class="text-gray-600">@lang('home.address')</p>
                        <p class="text-gray-600">Email: hello@librarie.com</p>
                        <div class="flex justify-center space-x-4 mt-4">
                            <a href="#" class="text-gray-600 hover:text-purple-600"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-gray-600 hover:text-purple-600"><i
                                    class="fab fa-twitter"></i></a>
                            <a href="#" class="text-gray-600 hover:text-purple-600"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="#" class="text-gray-600 hover:text-purple-600"><i
                                    class="fab fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="justify-center mt-8 hidden md:flex">
                <img src="https://storage.googleapis.com/a1aa/image/Nmk5TOZYXJZYLhzR9I1N3HUM2KTqSLKLMeF3oiNUB0Ht2i9JA.jpg"
                    alt="Books on a mobile screen" class="w-full" style="max-width: 40rem" width="200"
                    height="200" />
            </div>
            <div class="mt-8 block md:hidden">
                <p class="text-gray-600">@lang('home.contact_us')</p>
                <p class="text-gray-600">@lang('home.address')</p>
                <p class="text-gray-600">@lang('home.email')</p>
                <div class="flex justify-center space-x-4 mt-4">
                    <a href="#" class="text-gray-600 hover:text-purple-600"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-600 hover:text-purple-600"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-600 hover:text-purple-600"><i
                            class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-600 hover:text-purple-600"><i class="fab fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </section>

    {{-- <!-- Top Trending Books -->
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-center text-purple-600">TOP TRENDING BOOKS</h2>
            <div class="flex justify-center space-x-4 mt-8">
                @foreach ($books as $book)
                    <div class="text-center">
                        <img src="{{ $book->image }}" alt="Book cover of '{{ $book->title }}'"
                            class="w-32 h-40 mx-auto" width="150" height="200" />
                        <p class="text-gray-600 mt-2">{{ $book->title }}</p>
                        <p class="text-gray-600">{{ $book->author }}</p>
                        <div class="space-x-2">
                            <a href="#" class="text-green-500">Borrow</a>
                            <a href="#" class="text-orange-500">Add to Cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}

    {{-- <!-- Browse Genres -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-center text-purple-600">BROWSE GENRES</h2>
            <div class="flex justify-center space-x-4 mt-8 flex-wrap">
                @foreach ($categories as $category)
                    <button class="bg-orange-500 text-white px-4 py-2 rounded-full my-4">{{ $category->name }}</button>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="#" class="text-gray-600">See All</a>
            </div>
        </div>
    </section> --}}


    <!-- Librarie Meetup -->
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-center text-purple-600">LIBRARIE MEETUP</h2>
            <div class="flex flex-col md:flex-row justify-center items-center mt-8">
                <div class="text-center md:w-1/2">
                    <p class="text-gray-600">
                        @lang('home.meetup_description')
                    </p>
                    <div class="flex justify-center space-x-8 mt-4">
                        <div class="text-center">
                            <p class="text-2xl font-bold text-purple-600">1M+</p>
                            <p class="text-gray-600">@lang('home.books_collections')</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-purple-600">50K+</p>
                            <p class="text-gray-600">@lang('home.club_members')</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-purple-600">4,972</p>
                            <p class="text-gray-600">@lang('home.groups_created')</p>
                        </div>
                    </div>
                    <button class="bg-orange-500 text-white px-6 py-3 rounded-full mt-6">@lang('home.join_now')</button>
                </div>
                <div class="mt-8 md:mt-0 md:w-1/2">
                    <img src="https://storage.googleapis.com/a1aa/image/rF1hjo561PqHPlD6IlSEDkCcy2ZfjGQlbBJ5jPhRxVqx2i9JA.jpg"
                        alt="Books in a library" class="w-full h-auto" width="400" height="300" />
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Subscription -->
    <section class="bg-purple-600 py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold text-white">@lang('home.newsletter')</h2>
            <p class="text-white mt-2">@lang('home.newsletter_description')</p>
            <div class="flex justify-center mt-6">
                <input type="email" placeholder="Type your email here"
                    class="border rounded-full px-4 py-2 w-1/2" />
                <button class="bg-orange-500 text-white px-6 py-2 rounded-full ml-2">Subscribe</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-100 py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                {{-- <div class="text-center md:text-left">
                    <img src="https://storage.googleapis.com/a1aa/image/6SDe9BkhkS3edk3k5tlGvGXGUv2mkRiGZlz2YnuZz8zgtF7TA.jpg"
                        alt="Librarie logo" class="w-10 h-10 mx-auto md:mx-0" width="40" height="40" />
                    <p class="text-gray-600 mt-2">
                        Librarie is an e-library website that consists of all genres of books from around the world.
                    </p>
                </div> --}}
                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-8 mt-8 md:mt-0">
                    <!-- Quick Links -->
                    <div class="text-center md:text-left">
                        <h3 class="text-gray-600 font-bold">Quick Links</h3>
                        <ul class="text-gray-600 mt-2 space-y-2">
                            <li><a href="#" class="hover:text-purple-600">Home</a></li>
                            <li><a href="#" class="hover:text-purple-600">About Us</a></li>
                            <li><a href="#" class="hover:text-purple-600">Shop</a></li>
                            <li><a href="#" class="hover:text-purple-600">Authors</a></li>
                            <li><a href="#" class="hover:text-purple-600">Help</a></li>
                        </ul>
                    </div>
                    <!-- Customer Area -->
                    <div class="text-center md:text-left">
                        <h3 class="text-gray-600 font-bold">Customer Area</h3>
                        <ul class="text-gray-600 mt-2 space-y-2">
                            <li><a href="#" class="hover:text-purple-600">My Account</a></li>
                            <li><a href="#" class="hover:text-purple-600">Tracking List</a></li>
                            <li><a href="#" class="hover:text-purple-600">Privacy Policy</a></li>
                            <li><a href="#" class="hover:text-purple-600">FAQ</a></li>
                            <li><a href="#" class="hover:text-purple-600">Terms</a></li>
                        </ul>
                    </div>
                    <!-- Social Medias -->
                    <div class="text-center md:text-left">
                        <h3 class="text-gray-600 font-bold">Social Medias</h3>
                        <ul class="text-gray-600 mt-2 space-y-2">
                            <li><a href="#" class="hover:text-purple-600"><i class="fab fa-facebook-f"></i>
                                    Facebook</a></li>
                            <li><a href="#" class="hover:text-purple-600"><i class="fab fa-twitter"></i>
                                    Twitter</a></li>
                            <li><a href="#" class="hover:text-purple-600"><i class="fab fa-instagram"></i>
                                    Instagram</a></li>
                            <li><a href="#" class="hover:text-purple-600"><i class="fab fa-envelope"></i>
                                    Email</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
  <!-- Header -->
  {{-- <header class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <div class="flex items-center">
        <img src="{{ asset("assets/Logo.png") }}" alt="Librarie logo" class="w-10 h-10" width="40" height="40" />
        <span class="ml-2 text-xl font-bold text-purple-600">Librarie</span>
      </div>
      <nav class="hidden md:flex space-x-6">
        <a href="home.html" class="text-gray-600 hover:text-purple-600">Home</a>
        <a href="#" class="text-gray-600 hover:text-purple-600">About</a>
        <a href="#" class="text-gray-600 hover:text-purple-600">Vision</a>
        <a href="#" class="text-gray-600 hover:text-purple-600">Contact Us</a>
      </nav>
      <div class="flex items-center space-x-4">
        <input type="text" placeholder="search" class="border rounded-full px-4 py-1" />
        <a href="login.html" class="text-gray-600 hover:text-purple-600">Login</a>
        <a href="singup.html" class="bg-orange-500 text-white px-4 py-2 rounded-full">Sign Up</a>
      </div>
    </div>
  </header> --}}
  <x-navbar>
    
  </x-navbar>

  <!-- Hero Section -->
  <section class="bg-white py-16 w-full">
    <div class="container mx-auto px-4 text-center md:text-left flex flex-col md:flex-row md:justify-between">
      <div class="flex justify-center mt-8 md:hidden">
        <img src="https://storage.googleapis.com/a1aa/image/Nmk5TOZYXJZYLhzR9I1N3HUM2KTqSLKLMeF3oiNUB0Ht2i9JA.jpg" alt="Books on a mobile screen" class="w-1/3" width="200" height="200" />
      </div>
      <div class="flex items-center">
        <div style="max-width: 40rem">
          <h1 class="text-4xl font-bold text-purple-600">Welcome To Librarie</h1>
          <p class="text-gray-600 mt-4">
            Track Your Borrowed Books and Manage Your Library. Discover New Books to Borrow and Explore Your Interests.
            Browse a Wide Selection of Digital and Physical Books. Borrow and Return Books Easily, Anytime, Anywhere.
          </p>
          <button class="bg-orange-500 text-white px-6 py-3 rounded-full mt-6">Get Started For Free</button>
          <div class="mt-8 hidden md:block">
            <p class="text-gray-600">Contact us:</p>
            <p class="text-gray-600">Address: Jakarta, Indonesia</p>
            <p class="text-gray-600">Email: hello@librarie.com</p>
            <div class="flex justify-center space-x-4 mt-4">
              <a href="#" class="text-gray-600 hover:text-purple-600"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="text-gray-600 hover:text-purple-600"><i class="fab fa-twitter"></i></a>
              <a href="#" class="text-gray-600 hover:text-purple-600"><i class="fab fa-instagram"></i></a>
              <a href="#" class="text-gray-600 hover:text-purple-600"><i class="fab fa-envelope"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="justify-center mt-8 hidden md:flex">
        <img src="https://storage.googleapis.com/a1aa/image/Nmk5TOZYXJZYLhzR9I1N3HUM2KTqSLKLMeF3oiNUB0Ht2i9JA.jpg" alt="Books on a mobile screen" class="w-full" style="max-width: 40rem" width="200" height="200" />
      </div>
      <div class="mt-8 block md:hidden">
        <p class="text-gray-600">Contact us:</p>
        <p class="text-gray-600">Address: Jakarta, Indonesia</p>
        <p class="text-gray-600">Email: hello@librarie.com</p>
        <div class="flex justify-center space-x-4 mt-4">
          <a href="#" class="text-gray-600 hover:text-purple-600"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-gray-600 hover:text-purple-600"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-gray-600 hover:text-purple-600"><i class="fab fa-instagram"></i></a>
          <a href="#" class="text-gray-600 hover:text-purple-600"><i class="fab fa-envelope"></i></a>
        </div>
      </div>
    </div>
  </section>

  <!-- Top Trending Books -->
  <section class="bg-gray-100 py-16">
    <div class="container mx-auto px-4">
      <h2 class="text-2xl font-bold text-center text-purple-600">TOP TRENDING BOOKS</h2>
      <div class="flex justify-center space-x-4 mt-8">
        <!-- Book 1 -->
        <div class="text-center">
          <img src="https://storage.googleapis.com/a1aa/image/IP05NZ5XT6ZRFVHiZaRLdKg4Htx1hg1EYu7MqgPf3ee4aL2nA.jpg" alt="Book cover of 'What I learned...'" class="w-32 h-40 mx-auto" width="150" height="200" />
          <p class="text-gray-600 mt-2">What I learned...</p>
          <p class="text-gray-600">LE Bowman</p>
          <div class="space-x-2">
            <a href="#" class="text-green-500">Borrow</a>
            <a href="#" class="text-orange-500">Add to Cart</a>
          </div>
        </div>
        <!-- Additional books repeated with similar structure -->
        <!-- Book 2 -->
        <div class="text-center">
          <img src="https://storage.googleapis.com/a1aa/image/xX2siae3G0R0HKikRPzQVz4gZfK9EcWZGQGANROWEWteaL2nA.jpg" alt="Book cover of 'Made to Stick'" class="w-32 h-40 mx-auto" width="150" height="200" />
          <p class="text-gray-600 mt-2">Made to Stick</p>
          <p class="text-gray-600">Chip Heath &amp; Dan Heath</p>
          <div class="space-x-2">
            <a href="#" class="text-green-500">Borrow</a>
            <a href="#" class="text-orange-500">Add to Cart</a>
          </div>
        </div>
        <!-- Book 3 -->
        <div class="text-center">
          <img src="https://storage.googleapis.com/a1aa/image/VeiMLdf67Dh1sUFs4xf4rg3eZaKIrwnEnDfwq5sDRRlsrtYfE.jpg" alt="Book cover of 'Atomic Habits'" class="w-32 h-40 mx-auto" width="150" height="200" />
          <p class="text-gray-600 mt-2">Atomic Habits</p>
          <p class="text-gray-600">James Clear</p>
          <div class="space-x-2">
            <a href="#" class="text-green-500">Borrow</a>
            <a href="#" class="text-orange-500">Add to Cart</a>
          </div>
        </div>
        <!-- Book 4 -->
        <div class="text-center">
          <img src="https://storage.googleapis.com/a1aa/image/e8jpClvmmWyGQi15jdYp0Z8SzVq1qMycefLZBE7RKzf91WsPB.jpg" alt="Book cover of 'Muscle'" class="w-32 h-40 mx-auto" width="150" height="200" />
          <p class="text-gray-600 mt-2">Muscle</p>
          <p class="text-gray-600">Alan Trotter</p>
          <div class="space-x-2">
            <a href="#" class="text-green-500">Borrow</a>
            <a href="#" class="text-orange-500">Add to Cart</a>
          </div>
        </div>
        <!-- Book 5 -->
        <div class="text-center">
          <img src="https://storage.googleapis.com/a1aa/image/CeEvXkIeJCtMk0hxXziiuK92hATRMXf3TeuuJhsFUowK2WsPB.jpg" alt="Book cover of 'Happiness by Design'" class="w-32 h-40 mx-auto" width="150" height="200" />
          <p class="text-gray-600 mt-2">Happiness by Design</p>
          <p class="text-gray-600">Paul Dolan</p>
          <div class="space-x-2">
            <a href="#" class="text-green-500">Borrow</a>
            <a href="#" class="text-orange-500">Add to Cart</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Browse Genres -->
  <section class="bg-white py-16">
    <div class="container mx-auto px-4">
      <h2 class="text-2xl font-bold text-center text-purple-600">BROWSE GENRES</h2>
      <div class="flex justify-center space-x-4 mt-8 flex-wrap">
        <button class="bg-orange-500 text-white px-4 py-2 rounded-full my-4">Adventure</button>
        <button class="bg-orange-500 text-white px-4 py-2 rounded-full my-4">Biography</button>
        <button class="bg-orange-500 text-white px-4 py-2 rounded-full my-4">Thriller</button>
        <button class="bg-orange-500 text-white px-4 py-2 rounded-full my-4">Love</button>
        <button class="bg-orange-500 text-white px-4 py-2 rounded-full my-4">Fiction</button>
        <button class="bg-orange-500 text-white px-4 py-2 rounded-full my-4">Science Fiction</button>
        <button class="bg-orange-500 text-white px-4 py-2 rounded-full my-4">History</button>
        <button class="bg-orange-500 text-white px-4 py-2 rounded-full my-4">Adult</button>
      </div>
      <div class="text-center mt-4">
        <a href="#" class="text-gray-600">See All</a>
      </div>
    </div>
  </section>

  <!-- Librarie Meetup -->
  <section class="bg-gray-100 py-16">
    <div class="container mx-auto px-4">
      <h2 class="text-2xl font-bold text-center text-purple-600">LIBRARIE MEETUP</h2>
      <div class="flex flex-col md:flex-row justify-center items-center mt-8">
        <div class="text-center md:w-1/2">
          <p class="text-gray-600">
            Meet Kindred Book Lovers In A Local Meetup Book Club! Fiction Or Non Fiction, Paperback Or Hardcover, You
            Like? Read A New Book Every Month.
          </p>
          <div class="flex justify-center space-x-8 mt-4">
            <div class="text-center">
              <p class="text-2xl font-bold text-purple-600">1M+</p>
              <p class="text-gray-600">Books Collections</p>
            </div>
            <div class="text-center">
              <p class="text-2xl font-bold text-purple-600">50K+</p>
              <p class="text-gray-600">Club Members</p>
            </div>
            <div class="text-center">
              <p class="text-2xl font-bold text-purple-600">4,972</p>
              <p class="text-gray-600">Groups Created</p>
            </div>
          </div>
          <button class="bg-orange-500 text-white px-6 py-3 rounded-full mt-6">Join Now</button>
        </div>
        <div class="mt-8 md:mt-0 md:w-1/2">
          <img src="https://storage.googleapis.com/a1aa/image/rF1hjo561PqHPlD6IlSEDkCcy2ZfjGQlbBJ5jPhRxVqx2i9JA.jpg" alt="Books in a library" class="w-full h-auto" width="400" height="300" />
        </div>
      </div>
    </div>
  </section>

  <!-- Newsletter Subscription -->
  <section class="bg-purple-600 py-16">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-2xl font-bold text-white">Subscribe to Our Newsletter</h2>
      <p class="text-white mt-2">Newest Books Updates</p>
      <div class="flex justify-center mt-6">
        <input type="email" placeholder="Type your email here" class="border rounded-full px-4 py-2 w-1/2" />
        <button class="bg-orange-500 text-white px-6 py-2 rounded-full ml-2">Subscribe</button>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-100 py-16">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row justify-between items-center">
        <div class="text-center md:text-left">
          <img src="https://storage.googleapis.com/a1aa/image/6SDe9BkhkS3edk3k5tlGvGXGUv2mkRiGZlz2YnuZz8zgtF7TA.jpg" alt="Librarie logo" class="w-10 h-10 mx-auto md:mx-0" width="40" height="40" />
          <p class="text-gray-600 mt-2">
            Librarie is an e-library website that consists of all genres of books from around the world.
          </p>
        </div>
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
              <li><a href="#" class="hover:text-purple-600"><i class="fab fa-facebook-f"></i> Facebook</a></li>
              <li><a href="#" class="hover:text-purple-600"><i class="fab fa-twitter"></i> Twitter</a></li>
              <li><a href="#" class="hover:text-purple-600"><i class="fab fa-instagram"></i> Instagram</a></li>
              <li><a href="#" class="hover:text-purple-600"><i class="fab fa-envelope"></i> Email</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
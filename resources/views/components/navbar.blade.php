<nav id="header" class="fixed w-full z-50 top-0 bg-white shadow">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
      <div class="pl-4 flex items-center">
        <img src="{{ asset("assets/Logo.png") }}" alt="" class="w-10 h-10">
        <a class="toggleColour text-purple-800 no-underline hover:no-underline font-bold text-2xl lg:text-4xl ml-3" href="#">
          Librarie
        </a>
      </div>
      <div class="block lg:hidden pr-4">
        <button id="nav-toggle" class="flex items-center p-1 text-purple-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
          <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </svg>
        </button>
      </div>
      <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
        <ul class="list-reset lg:flex justify-end flex-1 items-center">
          <li class="mr-3">
            <a class="inline-block py-2 px-4 text-black font no-underline" href="#">home</a>
          </li>
          <li class="mr-3">
            <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#">About Us</a>
          </li>
          <li class="mr-3">
            <a class="inline-block text-indigo-800 font-bold no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#">login</a>
          </li>
        </ul>
        <button
          id="navAction"
          class="mx-auto lg:mx-0 hover:underline bg-indigo-800 text-white font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
        >
          Sign Up
        </button>
      </div>
    </div>
    <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
</nav>
<script>
const navToggle = document.getElementById("nav-toggle");
const navContent = document.getElementById("nav-content");

// Function to toggle the visibility of the navbar
navToggle.addEventListener("click", () => {
  // Toggle the 'hidden' class on the nav content
  navContent.classList.toggle("hidden");
});
</script>
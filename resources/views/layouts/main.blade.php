<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex">
    <!-- Sidebar -->
    {{-- <div class="bg-indigo-100 w-1/5 min-h-screen p-4">
     <div class="flex items-center mb-8">
      <img alt="Library Logo" class="w-10 h-10 mr-2" height="40" src="{{ Logo.png }}" width="40"/>
      <h1 class="text-xl font-bold text-indigo-600">Librarie</h1>
     </div>
     <nav>
      <ul>
       <li class="mb-4 flex items-center text-orange-500">
        <i class="fas fa-tachometer-alt mr-2"></i>
        <a href="dashboard.html">Dashboard</a>
       </li>
       <li class="mb-4 flex items-center text-gray-600">
        <i class="fas fa-th-large mr-2"></i>
        <a href="category.html">Categories</a>
       </li>
       <li class="mb-4 flex items-center text-gray-600">
        <i class="fas fa-heart mr-2"></i>
        <a href="favorite.html">Favourites</a>
       </li>
       <li class="mb-4 flex items-center text-gray-600">
        <i class="fas fa-star mr-2"></i>
        <a href="finest.html">Finest</a>
       </li>
       <li class="mb-4 flex items-center text-gray-600">
        <i class="fas fa-calendar-alt mr-2"></i>
        <a href="reservetion.html">Reservation</a>
       </li>
       <li class="mb-4 flex items-center text-gray-600">
        <i class="fas fa-history mr-2"></i>
        <a href="history.html">History</a>
       </li>
       <li class="mb-4 flex items-center text-gray-600">
        <i class="fas fa-cog mr-2"></i>
        <a href="setting.html">Settings</a>
       </li>
       <li class="mb-4 flex items-center text-gray-600">
        <i class="fas fa-sign-out-alt mr-2"></i>
        <a href="home.html">Logout</a>
       </li>
      </ul>
     </nav>
    </div> --}}
    <nav class="fixed top-0 z-50 w-full bg-white border-gray-200 dark:bg-purple-600 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
                <a href="#" class="flex ms-2 md:me-24">
                    <img src="{{ asset("assets/Logo.png") }}" class="h-8 me-3" alt="FlowBite Logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Librarie</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex flex-col ms-3 w-48">
                <div class="w-full flex justify-end">
                    <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                    </button>
                </div>
                <div class="z-50 hidden fixed my-11 text-base list-none bg-white divide-y divide-gray-100 rounded shadow-lg dark:bg-purple-800 dark:divide-gray-600" id="dropdown-user">
                    <div class="px-4 py-3" role="none">
                    <p class="text-sm text-gray-900 dark:text-white" role="none">
                        Mousa Ayesh
                    </p>
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                        mousa.ayesh@binus.ac.id
                    </p>
                    </div>
                    <ul class="py-1" role="none">
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Profile</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                    </li>
                    </ul>
                </div>
            </div>
            </div>
        </div>
    </div>
    </nav>
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-white dark:border-gray-700" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-white">
           <ul class="space-y-2 font-medium">
              <li>
                 <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 group hover:text-white">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                       <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                       <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                    </svg>
                    <span class="ms-3 flex-1 whitespace-nowrap">Dashboard</span>
                 </a>
              </li>
              <li>
                 <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 group hover:text-white">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                       <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Categories</span>
                 </a>
              </li>
              <li>
                 <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 group hover:text-white" style="width: 8.5rem">
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xml:space="preserve"><path fill="currentColor" d="m440 360 62-213H119.373L94.734 40H10v32h59.266L136 361.818V440h304v-32H168v-48z"/><circle fill="currentColor" cx="168" cy="455" r="47"/><circle fill="currentColor" cx="168" cy="455" r="20"/><circle fill="currentColor" cx="366.286" cy="455" r="47"/><circle fill="currentColor" cx="366.286" cy="455" r="20" aria-hidden="true"/>
                   </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Reservation</span>
                 </a>
              </li>
              <li>
                 <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 group hover:text-white" style="width: 6.5rem">
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M16 1a14.86 14.86 0 0 0-9.33 3.26L6 4.83V2a1 1 0 0 0-2 0v5a1 1 0 0 0 1 1h5a1 1 0 0 0 0-2H7.71l.23-.2A12.86 12.86 0 0 1 16 3 13 13 0 1 1 3 16a1 1 0 0 0-2 0A15 15 0 1 0 16 1z" style="fill:currentColor "/><path d="m19.79 21.21-4.5-4.5A1 1 0 0 1 15 16V7a1 1 0 0 1 2 0v8.59l4.21 4.2a1 1 0 0 1-1.42 1.42z" style="fill:currentColor"/></svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">History</span>
                 </a>
              </li>
              
           </ul>
        </div>
     </aside>
    <!-- Main Content -->
    @yield('content')
    <!-- Right Sidebar -->
    {{-- <div class="bg-white w-1/4 min-h-screen p-6 hidden lg:block">
     <div class="flex items-center mb-6">
      <img alt="User Avatar" class="w-10 h-10 rounded-full mr-2" height="40" src="https://storage.googleapis.com/a1aa/image/Zf9JeMS2Q1htTEADHBDIXT6ZCpcrG7WQ9tSeAeEFgWyKwYsPB.jpg" width="40"/>
      <div>
       <p class="text-sm font-bold">Kelompok 2</p>
       <p class="text-xs text-gray-500">Books this week</p>
       <div class="flex items-center">
        <span class="text-sm font-bold text-blue-600">3/5</span>
        <i class="fas fa-book-open text-blue-600 ml-2"></i>
       </div>
      </div>
     </div>
     <div class="bg-orange-100 p-4 rounded-lg mb-6">
      <h3 class="text-lg font-bold mb-2">Book Details</h3>
      <div class="flex items-center mb-4">
       <img alt="Rich Dad Poor Dad book cover" class="w-1/3 h-auto mr-4" height="150" src="https://storage.googleapis.com/a1aa/image/R57JqDx7LKb2HJqZeuLfyj45kpItNx3TJPflxToBby8wXM2nA.jpg" width="100"/>
       <div>
        <p class="text-sm font-bold">Rich Dad Poor Dad</p>
        <p class="text-sm text-gray-500">Robert Kiyosaki</p>
        <div class="flex items-center text-yellow-500">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
        </div>
       </div>
      </div>
      <p class="text-sm text-gray-600 mb-4">“Winners are not afraid of losing. But losers are. Failure is part of the process of success. People who avoid failure also avoid success.”</p>
      <button class="bg-orange-500 text-white px-4 py-2 rounded-lg">Read Now</button>
     </div>
    </div> --}}
    <script>
        // Handle sidebar toggle
        const sidebarToggleButton = document.querySelector('[data-drawer-toggle="logo-sidebar"]');
        const sidebar = document.getElementById('logo-sidebar');
        
        sidebarToggleButton.addEventListener('click', () => {
          sidebar.classList.toggle('-translate-x-full'); // Hide sidebar if it is visible, and vice versa
        });
      
        // Handle user dropdown toggle
        const dropdownButton = document.querySelector('[data-dropdown-toggle="dropdown-user"]');
        const dropdownMenu = document.getElementById('dropdown-user');
        
        dropdownButton.addEventListener('click', () => {
          dropdownMenu.classList.toggle('hidden'); // Toggle visibili   ty of the dropdown menu
        });
      
        // Close the dropdown when clicking anywhere outside the dropdown
        document.addEventListener('click', (event) => {
          if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden'); // Hide dropdown if the click was outside
          }
        });
      
        // Dark Mode Toggle (optional)
        const darkModeToggle = document.querySelector('#dark-mode-toggle');
        
        darkModeToggle.addEventListener('click', () => {
          document.documentElement.classList.toggle('dark'); // Toggle dark mode class on <html>
        });
    </script>
   </body>
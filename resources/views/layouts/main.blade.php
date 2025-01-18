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
    <nav class="fixed top-0 z-50 w-full bg-white border-gray-200 dark:bg-purple-600 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="#" class="flex ms-2 md:me-24">
                        <img src="{{ asset('assets/Logo.png') }}" class="h-8 me-3" alt="FlowBite Logo" />
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Librarie</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex flex-col ms-3 w-48">
                        <div class="w-full flex justify-end">
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                    alt="user photo">
                            </button>
                        </div>
                        <div class="w-48 z-50 hidden fixed my-11 text-base list-none bg-white divide-y divide-gray-100 rounded shadow-lg dark:bg-purple-800 dark:divide-gray-600"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                @if (Auth::user())
                                    <p class="text-sm text-gray-900 dark:text-white" role="none">
                                        {{ Auth::user()->name }}
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300"
                                        role="none">
                                        {{ Auth::user()->email }}
                                @endif

                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                {{-- <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Profile</a>
                                </li> --}}
                                <li>
                                    <a href="locale/en" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">English</a>
                                </li>
                                <li>
                                    <a href="locale/id" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Indonesia</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                            Sign out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-purple-600 sm:translate-x-0 dark:bg-white"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-white">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 group hover:text-white">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3 flex-1 whitespace-nowrap">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 group hover:text-white">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">{{ __("messages.category") }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reservationPage')}}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 group hover:text-white"
                        style="width: 8.5rem">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xml:space="preserve">
                            <path fill="currentColor"
                                d="m440 360 62-213H119.373L94.734 40H10v32h59.266L136 361.818V440h304v-32H168v-48z" />
                            <circle fill="currentColor" cx="168" cy="455" r="47" />
                            <circle fill="currentColor" cx="168" cy="455" r="20" />
                            <circle fill="currentColor" cx="366.286" cy="455" r="47" />
                            <circle fill="currentColor" cx="366.286" cy="455" r="20" aria-hidden="true" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">{{ __("messages.reservation") }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('historyPage')}}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 group hover:text-white"
                        style="width: 6.5rem">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <path
                                d="M16 1a14.86 14.86 0 0 0-9.33 3.26L6 4.83V2a1 1 0 0 0-2 0v5a1 1 0 0 0 1 1h5a1 1 0 0 0 0-2H7.71l.23-.2A12.86 12.86 0 0 1 16 3 13 13 0 1 1 3 16a1 1 0 0 0-2 0A15 15 0 1 0 16 1z"
                                style="fill:currentColor " />
                            <path
                                d="m19.79 21.21-4.5-4.5A1 1 0 0 1 15 16V7a1 1 0 0 1 2 0v8.59l4.21 4.2a1 1 0 0 1-1.42 1.42z"
                                style="fill:currentColor" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">{{ __("messages.history") }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('finesIndex')}}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 group hover:text-white"
                        style="width: 6.5rem">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: currentColor
                                    }
                                </style>
                            </defs>
                            <g id="icons_without_caption" data-name="icons without caption">
                                <g id="MONEY_MAKING" data-name="MONEY MAKING">
                                    <path class="cls-1"
                                        d="M103.08 202.59H80l-4.15-9.28a37.42 37.42 0 0 1-4.92-2.78l-10.09 1.27-12-19.75 5.79-8.37a36.51 36.51 0 0 1-.22-4c0-1.06 0-2.12.14-3.19l-6-8.23 11.53-20 10.12 1a37 37 0 0 1 5.64-3.26l4.16-9.27h23.09l4.15 9.28a36.87 36.87 0 0 1 4.92 2.77l10.1-1.26 12 19.74-5.79 8.38a37.16 37.16 0 0 1 .23 4c0 1 0 2.11-.14 3.18l6 8.23-11.52 20-10.12-1a37.4 37.4 0 0 1-5.63 3.26zm-20.17-4.5h17.25l3.67-8.18.79-.35a32.89 32.89 0 0 0 6.28-3.64l.7-.52 8.93.91 8.61-15-5.27-7.26.09-.86a32.39 32.39 0 0 0-.1-7.88l-.11-.86 5.11-7.39-9-14.75-8.86 1.15-.71-.5a32.26 32.26 0 0 0-5.66-3.19l-.8-.35-3.67-8.19H82.91l-3.67 8.19-.8.35a32.42 32.42 0 0 0-6.28 3.63l-.7.52-8.93-.92-8.61 15 5.27 7.26-.09.86a33.25 33.25 0 0 0-.19 3.58 32.9 32.9 0 0 0 .29 4.3l.11.86-5.11 7.38 9 14.76 8.91-1.12.71.5a32.85 32.85 0 0 0 5.67 3.2l.79.35zm8.63-18.3a20.13 20.13 0 1 1 20.13-20.12 20.15 20.15 0 0 1-20.13 20.12zm0-35.76a15.63 15.63 0 1 0 15.63 15.63A15.65 15.65 0 0 0 91.54 144zM152.29 125.5h-15.18l-2.66-5.94a23.91 23.91 0 0 1-2.76-1.56l-6.46.81-7.88-13 3.71-5.36c-.08-.82-.12-1.59-.12-2.36 0-.59 0-1.18.07-1.81L117.17 91l7.58-13.16 6.48.66a24 24 0 0 1 3.22-1.86l2.66-5.94h15.18l2.65 5.94a23.43 23.43 0 0 1 2.77 1.56l6.46-.81 7.87 13-3.7 5.35a22.85 22.85 0 0 1 .12 2.36c0 .6 0 1.21-.07 1.82l3.83 5.27-7.58 13.15-6.48-.66a23.86 23.86 0 0 1-3.22 1.87zm-12.59-4h10l2.22-5 .71-.31a19.92 19.92 0 0 0 3.81-2.21l.62-.46 5.42.55 5-8.66-3.2-4.41.09-.77a19.71 19.71 0 0 0 .12-2.16 19.35 19.35 0 0 0-.18-2.61l-.1-.77 3.1-4.48-5.21-8.51-5.4.68-.63-.44a19.43 19.43 0 0 0-3.44-1.94l-.71-.31-2.22-5h-10l-2.23 5-.71.31a19.87 19.87 0 0 0-3.76 2.2l-.62.46-5.42-.55-5 8.67 3.2 4.4-.08.76a21.16 21.16 0 0 0-.12 2.17 20.77 20.77 0 0 0 .18 2.63l.1.76-3.13 4.5 5.19 8.55 5.41-.68.63.44a20 20 0 0 0 3.43 1.94l.71.31zm5-10.23a13.16 13.16 0 1 1 13.16-13.16 13.17 13.17 0 0 1-13.16 13.16zm0-22.32a9.16 9.16 0 1 0 9.16 9.15 9.16 9.16 0 0 0-9.16-9.1zM110.49 66l-3 3.93-.36.48-8.95 11.7L95 79.69l7.33-9.62a49.37 49.37 0 0 0-47 31.81l-3.74-1.43a53.39 53.39 0 0 1 52.49-34.33l-12.49-9.53L94 53.41zM179 188a28.85 28.85 0 0 1-4.49-.35 28.49 28.49 0 0 1 4.4-56.65 28.87 28.87 0 0 1 4.49.35A28.49 28.49 0 0 1 179 188zm-.06-53a24.49 24.49 0 0 0-3.8 48.68 24.8 24.8 0 0 0 3.86.3 24.49 24.49 0 0 0 3.8-48.68 24.8 24.8 0 0 0-3.89-.3z" />
                                    <path class="cls-1"
                                        d="M187.93 165.41c0 3.95-2.78 6.72-7.48 7.1v4.68h-2.59v-4.72a13.49 13.49 0 0 1-7.91-3.8l2-2.42a11 11 0 0 0 7.46 3.21c2.85 0 5-1.42 5-3.85 0-2.78-2.23-3.7-5.8-4.82-4.23-1.36-8.08-2.68-8.08-7.29 0-3.76 2.63-6.61 7.35-6.84v-4.89h2.59v5.06a15.82 15.82 0 0 1 6.59 2.81l-1.94 2.4a12 12 0 0 0-6.52-2.29c-2.7 0-4.59 1.27-4.59 3.53 0 2.42 2.34 3.31 5.57 4.36 4.76 1.51 8.37 2.78 8.37 7.74z" />
                                </g>
                            </g>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">{{ __("messages.finest") }}</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>
    <!-- Main Content -->
    @yield('content')
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

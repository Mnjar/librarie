<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
        <x-navbar>
        </x-navbar>
        <!--Hero-->
        <div class="pt-36">
          <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Left Col-->
            <div class="flex flex-col w-full md:w-2/5 justify-center items-center text-center md:text-left sm:text-center md:items-start">
              <p class="tracking-loose w-full text-black text-opacity-50">Anywhere and Everywhere</p>
              <h1 class="my-4 text-5xl font-bold leading-tight text-indigo-800">
                Welcome to Librarie
              </h1>
              <p class="leading-normal text-2xl mb-8 text-black">
                Track Your Borrowed Books and Manage Your Library <br>
                Discover New Books To Borrow and Explore Your Interests.
              </p>
              <div class="flex justify-center md:justify-start w-full">
                <button class="text-white p-5 border bg-orange-500 rounded-lg">
                  Get Started For Free
                </button>
              </div>
            </div>
            <!--Right Col-->
            <div class="w-full md:w-3/5 py-6 text-center justify-end hidden md:flex pt-14">
              <img class="w-full md:w-4/5 z-20 bg-slate-400" src="https://images.unsplash.com/photo-1605721911519-3dfeb3be25e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" />
            </div>
          </div>
        </div>
        <section class="bg-white py-14">
          <div class="container max-w-6xl mx-auto m-8">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-indigo-800">
              Top Trending Books
            </h2>
            <div class="w-full mb-4">
              <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex flex-wrap justify-center">
              <a href="#" class="block m-3 w-60">
                <img
                  alt=""
                  src="https://images.unsplash.com/photo-1605721911519-3dfeb3be25e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                  class="h-64 w-full object-cover sm:h-80 lg:h-64"
                />
              
                <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl">Lorem, ipsum dolor.</h3>
              
                <p class="mt-2 max-w-sm text-gray-700">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni reiciendis sequi ipsam incidunt.
                </p>
              </a>
              <a href="#" class="block m-3 w-60">
                <img
                  alt=""
                  src="https://images.unsplash.com/photo-1605721911519-3dfeb3be25e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                  class="h-64 w-full object-cover sm:h-80 lg:h-64"
                />
              
                <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl">Lorem, ipsum dolor.</h3>
              
                <p class="mt-2 max-w-sm text-gray-700">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni reiciendis sequi ipsam incidunt.
                </p>
              </a>
              <a href="#" class="block m-3 w-60">
                <img
                  alt=""
                  src="https://images.unsplash.com/photo-1605721911519-3dfeb3be25e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                  class="h-64 w-full object-cover sm:h-80 lg:h-64"
                />
              
                <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl">Lorem, ipsum dolor.</h3>
              
                <p class="mt-2 max-w-sm text-gray-700">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni reiciendis sequi ipsam incidunt.
                </p>
              </a>
              <a href="#" class="block m-3 w-60">
                <img
                  alt=""
                  src="https://images.unsplash.com/photo-1605721911519-3dfeb3be25e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                  class="h-64 w-full object-cover sm:h-80 lg:h-64"
                />
              
                <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl">Lorem, ipsum dolor.</h3>
              
                <p class="mt-2 max-w-sm text-gray-700">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni reiciendis sequi ipsam incidunt.
                </p>
              </a>
              
    
            </div>
          </div>
        </section>
        <section class="bg-white py-8">
          <div class="container mx-auto flex flex-wrap pt-4 pb-12">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center md:text-start text-gray-800">
              Browse Genre
            </h2>
            <div class="flex flex-wrap justify-center w-full mt-10">
              <!-- Border -->
  
              <a
              class="inline-block rounded border border-current px-8 py-3 text-lg font-medium text-indigo-600 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:text-indigo-500 mx-24 my-3 text-center w-36"
              href="#"
              >
              Adventure
              </a>
              <!-- Border -->
  
              <a
              class="inline-block rounded border border-current px-8 py-3 text-lg font-medium text-indigo-600 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:text-indigo-500 mx-24 my-3 text-center w-36"
              href="#"
              >
              Biography
              </a>
              <!-- Border -->
  
              <a
              class="inline-block rounded border border-current px-8 py-3 text-lg font-medium text-indigo-600 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:text-indigo-500 mx-24 my-3 text-center w-36"
              href="#"
              >
              Thriller
              </a>
              <a
              class="inline-block rounded border border-current px-8 py-3 text-lg font-medium text-indigo-600 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:text-indigo-500 mx-24 my-3 text-center w-36"
              href="#"
              >
              Love
              </a>
              <!-- Border -->
  
              <a
              class="inline-block rounded border border-current px-8 py-3 text-lg font-medium text-indigo-600 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:text-indigo-500 mx-24 my-3 text-center w-36"
              href="#"
              >
              Fiction 
              </a>
              <!-- Border -->
  
              <a
              class="inline-block rounded border border-current px-8 py-3 text-lg font-medium text-indigo-600 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:text-indigo-500 mx-24 my-3 text-center w-36"
              href="#"
              >
              Science
              </a>
              <a
              class="inline-block rounded border border-current px-8 py-3 text-lg font-medium text-indigo-600 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:text-indigo-500 mx-24 my-3 text-center w-36"
              href="#"
              >
              History
              </a>
              <a
              class="inline-block rounded border border-current px-8 py-3 text-lg font-medium text-indigo-600 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:text-indigo-500 mx-24 my-3 w-36 text-center"
              href="#"
              >
              Adult
              </a>
            </div>
            <div class="w-full mb-4 flex justify-center text-lg hover:underline md:justify-end">
              <a href="#" class="border rounded-md w-24 text-center h-10 items-center border-indigo-500 bg-indigo-600 flex align-middle justify-center md:border-none md:bg-white md:text-indigo-500">see all</a>
            </div>
            
          </div>
        </section>
        {{-- <section class="bg-gray-100 py-8">
          <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
              Pricing
            </h2>
            <div class="w-full mb-4">
              <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 sm:my-4">
              <div class="flex flex-col w-5/6 lg:w-1/4 mx-auto lg:mx-0 rounded-none lg:rounded-l-lg bg-white mt-4">
                <div class="flex-1 bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
                  <div class="p-8 text-3xl font-bold text-center border-b-4">
                    Free
                  </div>
                  <ul class="w-full text-center text-sm">
                    <li class="border-b py-4">Thing</li>
                    <li class="border-b py-4">Thing</li>
                    <li class="border-b py-4">Thing</li>
                  </ul>
                </div>
                <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                  <div class="w-full pt-6 text-3xl text-gray-600 font-bold text-center">
                    £0
                    <span class="text-base">for one user</span>
                  </div>
                  <div class="flex items-center justify-center">
                    <button class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                      Sign Up
                    </button>
                  </div>
                </div>
              </div>
              <div class="flex flex-col w-5/6 lg:w-1/3 mx-auto lg:mx-0 rounded-lg bg-white mt-4 sm:-mt-6 shadow-lg z-10">
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                  <div class="w-full p-8 text-3xl font-bold text-center">Basic</div>
                  <div class="h-1 w-full gradient my-0 py-0 rounded-t"></div>
                  <ul class="w-full text-center text-base font-bold">
                    <li class="border-b py-4">Thing</li>
                    <li class="border-b py-4">Thing</li>
                    <li class="border-b py-4">Thing</li>
                    <li class="border-b py-4">Thing</li>
                  </ul>
                </div>
                <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                  <div class="w-full pt-6 text-4xl font-bold text-center">
                    £x.99
                    <span class="text-base">/ per user</span>
                  </div>
                  <div class="flex items-center justify-center">
                    <button class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                      Sign Up
                    </button>
                  </div>
                </div>
              </div>
              <div class="flex flex-col w-5/6 lg:w-1/4 mx-auto lg:mx-0 rounded-none lg:rounded-l-lg bg-white mt-4">
                <div class="flex-1 bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
                  <div class="p-8 text-3xl font-bold text-center border-b-4">
                    Pro
                  </div>
                  <ul class="w-full text-center text-sm">
                    <li class="border-b py-4">Thing</li>
                    <li class="border-b py-4">Thing</li>
                    <li class="border-b py-4">Thing</li>
                  </ul>
                </div>
                <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                  <div class="w-full pt-6 text-3xl text-gray-600 font-bold text-center">
                    £x.99
                    <span class="text-base">/ per user</span>
                  </div>
                  <div class="flex items-center justify-center">
                    <button class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                      Sign Up
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section> --}}
        <!-- Change the colour #f8fafc to match the previous section colour -->
        <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
              <g class="wave" fill="#FFFFFF">
                <path
                  d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
                ></path>
              </g>
              <g transform="translate(1.000000, 15.000000)" fill="#000000">
                <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                  <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                  <path
                    d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                    opacity="0.100000001"
                  ></path>
                  <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
                </g>
              </g>
            </g>
          </g>
        </svg>
        <!--Footer-->
        <x-footer>
        </x-footer>
        <!-- jQuery if you need it
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      -->
        {{-- <script>
          var scrollpos = window.scrollY;
          var header = document.getElementById("header");
          var navcontent = document.getElementById("nav-content");
          var navaction = document.getElementById("navAction");
          var brandname = document.getElementById("brandname");
          var toToggle = document.querySelectorAll(".toggleColour");
    
          document.addEventListener("scroll", function () {
            /*Apply classes for slide in bar*/
            scrollpos = window.scrollY;
    
            if (scrollpos > 10) {
              header.classList.add("bg-white");
              navaction.classList.remove("bg-white");
              navaction.classList.add("gradient");
              navaction.classList.remove("text-gray-800");
            //   navaction.classList.add("text-white");
              //Use to switch toggleColour colours
              for (var i = 0; i < toToggle.length; i++) {
                // toToggle[i].classList.add("text-gray-800");
                // toToggle[i].classList.remove("text-white");
              }
              header.classList.add("shadow");
              navcontent.classList.remove("bg-gray-100");
              navcontent.classList.add("bg-white");
            } else {
              header.classList.remove("bg-white");
              navaction.classList.remove("gradient");
              navaction.classList.add("bg-white");
              navaction.classList.remove("text-white");
              navaction.classList.add("text-gray-800");
              //Use to switch toggleColour colours
              for (var i = 0; i < toToggle.length; i++) {
                toToggle[i].classList.add("text-white");
                toToggle[i].classList.remove("text-gray-800");
              }
    
              // header.classList.remove("shadow");
              navcontent.classList.remove("bg-white");
              navcontent.classList.add("bg-gray-100");
            }
          });
        </script> --}}
        <script>
          /*Toggle dropdown list*/
          /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/
    
          var navMenuDiv = document.getElementById("nav-content");
          var navMenu = document.getElementById("nav-toggle");
    
          document.onclick = check;
          function check(e) {
            var target = (e && e.target) || (event && event.srcElement);
    
            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
              // click NOT on the menu
              if (checkParent(target, navMenu)) {
                // click on the link
                if (navMenuDiv.classList.contains("hidden")) {
                  navMenuDiv.classList.remove("hidden");
                } else {
                  navMenuDiv.classList.add("hidden");
                }
              } else {
                // click both outside link and outside menu, hide menu
                navMenuDiv.classList.add("hidden");
              }
            }
          }
          function checkParent(t, elm) {
            while (t.parentNode) {
              if (t == elm) {
                return true;
              }
              t = t.parentNode;
            }
            return false;
          }
        </script>
      </body>
</body>
</html>
<nav class="bg-primaryDarken border-b border-gray-200 fixed z-30 w-full">
    <div class="px-3 py-0 lg:px-5 lg:pl-3">
       <div class="flex items-center justify-between">
          <div class="flex items-center justify-start">
             <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="lg:hidden mr-2 text-gray-600 hover:text-primaryDarken cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
                <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                   <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
                <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                   <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
             </button>
             <a href="/dashboard" class="text-xl font-bold flex items-center lg:ml-2.5">
             {{-- <img src="img/logo.png" class="h-12 mr-2" alt="Si Damar Logo"> --}}
             <span class="font-bold text-white text-3xl flex-1 font-sans p-3 rounded-xl">SI DAMAR</span>
             </a>
             {{-- <form action="#" method="GET" class="hidden lg:block lg:pl-48">
                <label for="topbar-search" class="sr-only">Search</label>
                <div class="mt-1 relative lg:w-64">
                   <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                      <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                         <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                      </svg>
                   </div>
                   <input type="text" name="email" id="topbar-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primaryDarken focus:border-primaryDarken block w-full pl-10 p-2.5" placeholder="Search">
                </div>
             </form> --}}
          </div>
          <div class="flex items-center">
             {{-- <button id="toggleSidebarMobileSearch" type="button" class="lg:hidden text-gray-500 hover:text-gray-900 hover:bg-gray-100 p-2 rounded-lg">
                <span class="sr-only">Search</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                   <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
             </button> --}}
             <span class="text-white mr-3">Hai, {{auth()->user()->name}}</span>

             
         <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer hover:bg-primaryLighten" src="/docs/images/people/profile-picture-5.jpg" alt="User dropdown">

         <!-- Dropdown menu -->
         <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
               <div>Bonnie Green</div>
               <div class="font-medium truncate">name@flowbite.com</div>
            </div>
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
               <li>
               <a href="/" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Home</a>
               </li>
               {{-- <li>
               <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
               </li> --}}
               <li>
               <a href="/posts" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Blog</a>
               </li>
            </ul>
            <div class="py-1">
               <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
            </div>
         </div>


             {{-- <a href="#" class="w-2 hidden aspect-square sm:inline-flex ml-5 text-white bg-primary hover:bg-primaryLighten focus:ring-4 focus:ring-red-200 font-medium rounded-full text-sm px-5 py-2.5 text-center items-center mr-3">
                <img src="img/logo.png" alt="">
             </a> --}}

             {{-- <form action="/logout" method="POST">
               @csrf
               <button type="submit" class="text-white px-3">
                 <i class="bi bi-box-arrow-right"></i>Logout <span data-feather="log-out"></span>
               </button>
             </form> --}}
          </div>
       </div>
    </div>
 </nav>
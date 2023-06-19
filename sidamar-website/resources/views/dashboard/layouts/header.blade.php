<nav class="fixed z-30 w-full">
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
               <img src="img/logo.png" class="h-10" alt="Si Damar Logo">
               <span class="font-bold text-white text-3xl flex-1 font-montserrat p-3 rounded-xl">SI DAMAR</span>
             </a>
      
                   </div>
          <div class="flex items-end">
             <span class="mr-3">Hai, {{auth()->user()->name}}</span>
          </div>
         <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer hover:bg-primaryDarken" src="/img/logo2.png" alt="User dropdown">

         <!-- Dropdown menu -->
         <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
               <div>{{auth()->user()->name}}</div>
               <div class="font-medium truncate">{{auth()->user()->email}}</div>
            </div>
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
               <li>
               <a href="/" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Home</a>
               </li>
               <li>
               <a href="/blog" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Blog</a>
               </li>
            </ul>
            <form action="/logout" method="POST">
            @csrf
            <div class="py-1">
               <button type="submit" class="block pl-4 pr-24 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</button>
            </div>
            </form>
         </div>

          </div>
       </div>
    </div>
 </nav>
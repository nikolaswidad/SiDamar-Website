
{{-- navbar lama --}}
  <nav class=" hidden relative bg-white border-b-2 border-gray-100 font-family-karla">
      <div class="mx-auto max-w-7xl px-6">
        <div class="flex items-center justify-between py-0 md:justify-start md:space-x-10">
          <div class="flex flex-wrap justify-start lg:w-0 lg:flex-1">
            <a href="./#home" class="relative">
              <img class="block h-16 w-auto sm:h-20 align-middle flex-1 mb-2 mt-2" src="/img/logo.png" alt="Logo Si Damar">
              {{-- <span class="  flex-1">Si Damar</span> --}}
            </a>
          </div>
          {{-- <div class="-my-2 -mr-2 md:hidden">
            <button type="button" class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
              <span class="sr-only">Open menu</span>
              <!-- Heroicon name: outline/bars-3 -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
            </button>
          </div> --}}
          <nav class="hidden space-x-10 md:flex">
            <a href="./#home" class="text-base font-medium text-gray-500 hover:text-gray-900">Home</a>
            <a href="/about" class="text-base font-medium text-gray-500 hover:text-gray-900">About</a>
            <a href="./#activity" class="text-base font-medium text-gray-500 hover:text-gray-900">Activity<a>
            <a href="/donation" class="text-base font-medium text-gray-500 hover:text-gray-900">Donation</a>
            <a href="/merchandise" class="text-base font-medium text-gray-500 hover:text-gray-900">Merchandise</a>
            <a href="/blog" class="text-base font-medium text-gray-500 hover:text-gray-900">Blog</a>
            <a href="/arsipFilm" class="text-base font-medium text-gray-500 hover:text-gray-900">Arsip Film</a>
          </nav>
          @if (Auth::check())
            {{-- tidak memunculkan button login --}}
          @else
            <div class="items-center justify-end md:flex md:flex-1 lg:w-0">
              <a href="/login" class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-primary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-primaryLighten">Login</a>
            </div>
          @endif
        </div>
        <div class="-my-2 -mr-2 md:hidden">
          <button type="button" class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
            <span class="sr-only">Open menu</span>
            <!-- Heroicon name: outline/bars-3 -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </button>
        </div>
        <nav class="hidden space-x-10 md:flex">
          <a href="./#home" class="text-base font-medium text-gray-500 hover:text-gray-900">Home</a>
          <a href="./#about" class="text-base font-medium text-gray-500 hover:text-gray-900">About</a>
          <a href="./#activity" class="text-base font-medium text-gray-500 hover:text-gray-900">Activity</a>
          <a href="/donation" class="text-base font-medium text-gray-500 hover:text-gray-900">Donation</a>
          <a href="/merchandise" class="text-base font-medium text-gray-500 hover:text-gray-900">Merchandise</a>
          <a href="/blog" class="text-base font-medium text-gray-500 hover:text-gray-900">Blog</a>
        </nav>
        <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
          <a href="/login" class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-primary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-primaryLighten">Login</a>
        </div>

      </div>

  </nav>
{{-- navbar lama --}}

<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
      <a href="/" class="flex items-center">
          <img class="block h-16 w-auto sm:h-20 align-middle flex-1 mb-2 mt-2" src="/img/logo.png" alt="Logo Si Damar">
      </a>
      <div class="flex items-center md:order-2 ">
          @if (Auth::check())
            <a href="/dashboard" class="mr-3 text-md hover:text-red-500">Hai, {{ Auth::user()->name }}</a>
            <img class="w-10 h-10 rounded-full hover:bg-primaryDarken" src="/img/logo2.png" alt="User dropdown">
            <form action="/logout" method="POST">
              @csrf
              <div class="py-1">
                 <button type="submit" class="block font-karla ml-4 px-4 py-2 text-md bg-red-600 rounded-lg text-white hover:bg-red-800 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</button>
              </div>
            </form>
          @else
            <a href="/login" class="text-white bg-primary hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-md px-4 py-2 md:relative md:px-5 md:py-2.5 mr-1 md:mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-red-800">Login</a>
          @endif
          <button data-collapse-toggle="mega-menu" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mega-menu" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
          </button>
      </div>
      <div id="mega-menu" class="items-center justify-between hidden w-full lg:flex md:w-auto md:order-1">
          <ul class="flex flex-col mt-4 font-medium md:flex-row md:space-x-8 md:mt-0">
              <li>
                  <a href="/" class="block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-red-600 md:p-0 dark:text-blue-500 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700 {{ Request::is('/') ? 'text-red-600' : '' }}" aria-current="page">Home</a>
              </li>
              <li>
                  <a href="/about" class="block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-red-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700 {{ Request::is('about') ? 'text-red-600' : '' }}">About</a>
              </li>
              <li>
                  <a href="./#activity" class="block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-red-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Activity</a>
              </li>
              <li>
                  <a href="/donatur" class="block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-red-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Donation</a>
              </li>
              <li>
                  <a href="/merch" class="block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-red-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Merchandise</a>
              </li>
              <li>
                  <a href="/blog" class="block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-red-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700 {{ Request::is('blog') ? 'text-red-600' : '' }}">Blog</a>
              </li>
              <li>
                  <a href="/arsipFilm" class="block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-red-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700 {{ Request::is('arsipFilm') ? 'text-red-600' : '' }}">Arsip Film</a>
              </li>
          </ul>
      </div>
  </div>
</nav>


@extends('layouts.main')

@section('container')
    {{-- CAROUSEL BARU FIX --}}
    <div id="default-carousel" class="relative w-full h-96 overflow-hidden rounded-lg" data-carousel="slide">
        <!-- Carousel wrapper -->
        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/carousel/4.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://source.unsplash.com/1920x580?movie" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://source.unsplash.com/1920x580?theatre" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://source.unsplash.com/1920x580?popcorn" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://source.unsplash.com/1920x580?film" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <div class="relative h-56 overflow-hidden rounded-lg lg:h-full">
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
    {{-- CAROUSEL 2 END --}}
  
    {{-- Our Partner --}}
    <div class="mb-5">
        <p class="font-bold py-5 text-gray-800 uppercase hover:text-gray-700 text-4xl text-center">
            Our <span class="text-transparent bg-gradient-to-r from-primary to-orange-400 bg-clip-text">Projects</span>
        </p>
        {{-- make in coloum --}}
    
        <div class="container px-6 mx-auto flex md:flex-wrap gap-6 justify-evenly">
            <div class="rounded-lg mb-10 shadow-lg overflow-hidden sm:mb-0 w-40 md:w-52 lg:w-72 hover:scale-105 duration-300">
                <img src="/our_project/1.jpg" alt="picture1" class="w-full">
            </div>
            <div class="rounded-lg mb-10 shadow-lg overflow-hidden sm:mb-0 w-40 md:w-52 lg:w-72 hover:scale-105 duration-300">
                <img src="/our_project/2.png" alt="picture2" class="w-full">
            </div>
            <div class="rounded-lg mb-10 shadow-lg overflow-hidden sm:mb-0 w-40 md:w-52 lg:w-72 hover:scale-105 duration-300">
                <img src="/our_project/3.png" alt="picture3" class="w-full">
            </div>
            <div class="rounded-lg mb-10 shadow-lg overflow-hidden sm:mb-0 w-40 md:w-52 lg:w-72 hover:scale-105 duration-300">
                <img src="/our_project/4.png" alt="picture4" class="w-full">
            </div>           
                      
        </div>
    </div>


{{-- Our Partner --}}
    {{-- <div class="py-5 mb-10">
        <p class="font-bold py-5 text-gray-800 uppercase hover:text-gray-700 text-4xl text-center">
            Our <span class="text-transparent bg-gradient-to-r from-primary to-orange-400 bg-clip-text">Partner</span>
        </p> --}}
        {{-- make in coloum --}}
    
        {{-- <div class="container px-6 mx-auto flex md:flex-wrap gap-6 justify-evenly">
            <img class="w-24 h-24 md:w-32 md:h-32 object-cover rounded-full" src="https://source.unsplash.com/1200x200?movie" alt="Image 1">
            <img class="w-24 h-24 md:w-32 md:h-32 object-cover rounded-full" src="https://source.unsplash.com/1200x200?film" alt="Image 2">
            <img class="w-24 h-24 md:w-32 md:h-32 object-cover rounded-full" src="https://source.unsplash.com/1200x200?theatre" alt="Image 3">
            <img class="w-24 h-24 md:w-32 md:h-32 object-cover rounded-full" src="https://source.unsplash.com/1200x200?theatre" alt="Image 3">
            <img class="w-24 h-24 md:w-32 md:h-32 object-cover rounded-full" src="https://source.unsplash.com/1200x200?theatre" alt="Image 3">
            <img class="w-24 h-24 md:w-32 md:h-32 object-cover rounded-full" src="https://source.unsplash.com/1200x200?theatre" alt="Image 3">
            <img class="w-24 h-24 md:w-32 md:h-32 object-cover rounded-full" src="https://source.unsplash.com/1200x200?theatre" alt="Image 3">
            <img class="w-24 h-24 md:w-32 md:h-32 object-cover rounded-full" src="https://source.unsplash.com/1200x200?theatre" alt="Image 3">
        </div> --}}
        {{-- <div class="container items-center flex md:flex-wrap gap-6 justify-evenly">
            <div class="grid grid-cols-4 sm:grid-cols-3 md:grid-cols-4 lg:flex gap-4 lg:flex-wrap justify-center">
                <div>
                    <img class="object-cover h-16 w-16 sm:h-24 sm:w-24 md:h-28 md:w-h-28 lg:h-36 lg:w-h-36 rounded-full" src="https://source.unsplash.com/1200x200?movie" alt="Image 1">
                </div>
                <div>
                    <img class="object-cover h-16 w-16 sm:h-24 sm:w-24 md:h-28 md:w-h-28 lg:h-36 lg:w-h-36 rounded-full" src="https://source.unsplash.com/1200x200?film" alt="Image 2">
                </div>
                <div>
                    <img class="object-cover h-16 w-16 sm:h-24 sm:w-24 md:h-28 md:w-h-28 lg:h-36 lg:w-h-36 rounded-full" src="https://source.unsplash.com/1200x200?theatre" alt="Image 3">
                </div>
                <div>
                    <img class="object-cover h-16 w-16 sm:h-24 sm:w-24 md:h-28 md:w-h-28 lg:h-36 lg:w-h-36 rounded-full" src="https://source.unsplash.com/1200x200?theatre" alt="Image 4">
                </div>
                <div>
                    <img class="object-cover h-16 w-16 sm:h-24 sm:w-24 md:h-28 md:w-h-28 lg:h-36 lg:w-h-36 rounded-full" src="https://source.unsplash.com/1200x200?theatre" alt="Image 5">
                </div>
                <div>
                    <img class="object-cover h-16 w-16 sm:h-24 sm:w-24 md:h-28 md:w-h-28 lg:h-36 lg:w-h-36 rounded-full" src="https://source.unsplash.com/1200x200?theatre" alt="Image 6">
                </div>
                <div>
                    <img class="object-cover h-16 w-16 sm:h-24 sm:w-24 md:h-28 md:w-h-28 lg:h-36 lg:w-h-36 rounded-full" src="https://source.unsplash.com/1200x200?theatre" alt="Image 7">
                </div>
                <div>
                    <img class="object-cover h-16 w-16 sm:h-24 sm:w-24 md:h-28 md:w-h-28 lg:h-36 lg:w-h-36 rounded-full" src="https://source.unsplash.com/1200x200?theatre" alt="Image 7">
                </div>
            </div>
        </div> --}}
          
          
    {{-- </div> --}}

    @include('layouts.footer')    
@endsection
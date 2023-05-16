@extends('layouts.main')

@section('container')
    {{-- caraousel kurang js nya --}}
    {{-- <div class="container m-auto">
        <div id="carouselExampleControls" class="carousel slide relative" data-bs-ride="carousel">
            <div class="carousel-inner relative w-full overflow-hidden">
                <div class="carousel-item active relative float-left w-full">
                    <img
                    src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp"
                    class="block w-full"
                    alt="Wild Landscape"
                    />
                </div>
                <div class="carousel-item relative float-left w-full">
                    <img
                    src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp"
                    class="block w-full"
                    alt="Camera"
                    />
                </div>
                <div class="carousel-item relative float-left w-full">
                    <img
                    src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp"
                    class="block w-full"
                    alt="Exotic Fruits"
                    />
                </div>
            </div>
            <button class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button
                class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
                type="button"
                data-bs-target="#carouselExampleControls"
                data-bs-slide="next"
                >
                <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div> --}}
    {{-- end carousel --}}

    {{-- carousel baru --}}
    {{-- <div class="max-h-10 w-96">

        <div id="default-carousel" class="relative" data-carousel="static">
         
            <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
               
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <span class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl ">Primer Slide</span>
                    <img src="https://flowbite.com/docs/images/carousel/carousel-1.svg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
               
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://flowbite.com/docs/images/carousel/carousel-2.svg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
               
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://flowbite.com/docs/images/carousel/carousel-3.svg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
            </div>
            
            
            <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            </div>
           
            <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    <span class="hidden">Anterior</span>
                </span>
            </button>
            <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 0 group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="hidden">Siguiente</span>
                </span>
            </button>
        </div>
        <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
    </div> --}}
    {{-- end carousel baru --}}

    {{-- CAROUSEL 2 --}}
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


{{-- Our Project --}}
    <div class="py-5 mb-10">
        <p class="font-bold py-5 text-gray-800 uppercase hover:text-gray-700 text-4xl text-center">
            Our <span class="text-transparent bg-gradient-to-r from-primary to-orange-400 bg-clip-text">Partner</span>
        </p>
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
        <div class="container items-center flex md:flex-wrap gap-6 justify-evenly">
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
        </div>
          
          
    </div>

    @include('layouts.footer')    
@endsection
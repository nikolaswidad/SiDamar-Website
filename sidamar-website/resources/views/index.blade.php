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
    <div id="indicators-carousel" class="relative w-full" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
             <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <img src="/carousel/1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://source.unsplash.com/1920x1080?movie" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://source.unsplash.com/1920x1080?movie" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://source.unsplash.com/1920x1080?movie" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://source.unsplash.com/1920x1080?movie" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
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

{{-- end carousel baru --}}
{{-- Visi dan Misi --}}
    {{-- <div class="py-5 my-5 rounded-lg shadow-lg border-slate-200 border-2">
        <p class="font-bold mb-5 text-gray-800 uppercase hover:text-gray-700 text-4xl text-center">
            Our <span class="text-transparent bg-gradient-to-r from-primary to-orange-400 bg-clip-text">Vision</span>
        </p>
        <p class="text-center mx-auto px-10 text-lg">
            Mewadahi dan Merangkul Sineas Muda
        </p>

    </div> --}}
    

  
{{-- Our Project --}}
    <div class="py-5">
        <p class="font-bold py-5 text-gray-800 uppercase hover:text-gray-700 text-4xl text-center">
            Our <span class="text-transparent bg-gradient-to-r from-primary to-orange-400 bg-clip-text">Projects</span>
        </p>
        {{-- make in coloum --}}
        <div class="container px-6 mx-auto sm:flex sm:flex-wrap sm:gap-6 sm:justify-evenly">
            <div class="rounded-lg mb-10 shadow-lg overflow-hidden sm:mb-0 sm:w-64 md:w-80 lg:w-72 hover:scale-105 duration-300">
                <img src="/our_project/1.jpg" alt="picture1" class="w-full">
            </div>
            <div class="rounded-lg mb-10 shadow-lg overflow-hidden sm:mb-0 sm:w-64 md:w-80 lg:w-72 hover:scale-105 duration-300">
                <img src="/our_project/2.png" alt="picture2" class="w-full">
            </div>
            <div class="rounded-lg mb-10 shadow-lg overflow-hidden sm:mb-0 sm:w-64 md:w-80 lg:w-72 hover:scale-105 duration-300">
                <img src="/our_project/3.png" alt="picture3" class="w-full">
            </div>
            <div class="rounded-lg mb-10 shadow-lg overflow-hidden sm:mb-0 sm:w-64 md:w-80 lg:w-72 hover:scale-105 duration-300">
                <img src="/our_project/4.png" alt="picture4" class="w-full">
            </div>    
        </div>
    </div>


    @include('layouts.footer')    
@endsection
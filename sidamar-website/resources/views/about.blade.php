@extends('layouts.main')

@section('container')
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center mt-12 mb-7">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl">
                About Us
            </a>
            <p class="text-lg text-gray-600">
                Sineas Muda Semarang
            </p>
        </div>
    </header>

    <div class="h-72 overflow-hidden px-10">
        <img src="/about/1.jpg" alt="arsipFilm" class="shadow-lg sm:w-full sm:object-cover sm:h-52 lg:object-center lg:h-72">
    </div>

    <div class="my-5 pb-5 w-full flex justify-end">
        <p class="px-10 text-lg font-medium text-center">
            Si Damar (Sineas Muda Semarang) adalah komunitas bagi sineas muda di Semarang untuk mengembangkan dan meningkatkan skill di bidang kesenian terutama perfilman. Si Damar berdiri tanggal 30 Maret 2021 dan pada saat ini terdiri dari 55 anggota.
        </p>
    </div>
    
    <div class="mx-10 my-10 pb-10 boder-2 border-slate-400 shadow-lg rounded-lg">
        <p class="font-bold text-gray-800 uppercase hover:text-gray-700 text-3xl px-10 py-3">
            Our <span class="text-transparent bg-gradient-to-r from-primary to-orange-400 bg-clip-text">Vision</span>
        </p>
        <p class="px-10 text-lg">
            Mewadahi dan Merangkul Sineas Muda
        </p>
    </div>
    <div class="mx-10 my-10 pb-10 boder-2 border-slate-400 shadow-lg rounded-lg">
        <p class="font-bold text-gray-800 uppercase hover:text-gray-700 text-3xl px-10 py-3">
            Our <span class="text-transparent bg-gradient-to-r from-primary to-orange-400 bg-clip-text">Mission</span>
        </p>
        <div class="">
            <p class="px-10 text-lg">
                1. Memperkenalkan film-film pendek ke masyarakat
            </p>
            <p class="px-10 text-lg">
                2. Sarana edukasi dalam bidang perfilman
                
            </p>
            <p class="px-10 text-lg">
                3. Pengembangan pariwisata dan kebudayaan Kota Semarang
                
            </p>
            <p class="px-10 text-lg">
                4. Arsip film pendek semarang
            </p>
        </div>
        
    </div>
    
      
      
    

    @include('layouts.footer')
@endsection
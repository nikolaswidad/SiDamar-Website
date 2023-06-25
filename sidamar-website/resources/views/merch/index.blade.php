@extends('layouts.main')

@section('container')
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
                Merchandise
            </a>
            <p class="text-lg text-gray-600">
                Merchandise Official Sineas Muda Semarang
            </p>
            <a class="text-primary hover:text-red-700 hover:underline text-2xl font-semibold sm:text-4xl md:text-[40px]" href="/merch/create"">
                Klik Disini untuk Membeli!!
            </a>
        </div>
    </header>
    <div class="container mx-auto">
        {{-- <div  class="-mx-4 flex flex-wrap justify-center">
            <div class="w-full px-4">
                <div class="mx-auto mb-[60px] max-w-[510px] text-center lg:mb-1">
                    <span class="text-dark mb-2 sm:text-3xl  uppercase block text-lg font-semibold">
                        Merchandise
                    </span>
                    <a class="text-primary hover:text-red-700 hover:underline text-3xl font-semibold sm:text-4xl md:text-[40px]" href="/merch/create">
                        Klik disini untuk Membeli!!
                        
                    </a>
                    <p class="text-body-color text-base">
                        Si Damar menyediakan merchandise yang kekinian, selalu mengikuti trend, dan pastinya berbahan yang berkualitas
                      </p>
                </div>
            </div>
        </div> --}}
        <div class="-mx-4 flex flex-wrap justify-center">
                 
            @forelse($merch as $merch)
            <ul>
                <div class="w-full px-4 md:w-1/2 lg:w-1/3"> 
                <div class="mx-auto mb-10 max-w-[370px]">
                    <div class="mb-8 overflow-hidden rounded">
                        @if ($merch->image)
                            <div style="max-height: 500px; overflow:hidden">
                                <img src="{{ asset($merch->image) }}" alt="img" style="width: 300px height: 300px"  alt="{{ $merch->title }}">
                            </div>
                        @endif
                    </div>
                    <div>
                        <span class="bg-primary mb-5 inline-block rounded py-1 px-4 text-center text-lg font-semibold leading-loose text-white">
                        Rp {{ $merch->price }}
                        </span>
                        <h3><a
                            class="text-dark hover:text-primary mb-4 inline-block text-xl font-semibold sm:text-2xl lg:text-xl xl:text-2xl"
                            href="./merch/{{ $merch->id }}">{{ ucfirst($merch->title) }}</a>
                        </h3>
                        <p class="text-body-color text-base"> {{ $merch->desc}} </p>
                     </div>
                </div>          
            </ul>
                @empty
                <p class="text-warning">Merchandise tidak tersedia</p>
            @endforelse
            </div> 
        </div>
    </div>
    

    @include('layouts.footer')
@endsection
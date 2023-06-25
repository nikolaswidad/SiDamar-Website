@extends('layouts.main')

@section('container')
    <header class="w-full container mx-auto">
      <div class="flex flex-col items-center py-12">
          <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
              Donasi
          </a>
          <p class="text-lg text-gray-600">
              Event Sineas Muda Semarang
          </p>
          <a class="text-primary hover:text-red-700 hover:underline text-2xl font-semibold sm:text-4xl md:text-[40px]" href="/donatur/create"">
              Klik Disini untuk Berdonasi!!
          </a>
      </div>
    </header>

    {{-- <div class="container px-10 mx-auto w-full rounded-xl grid grid-cols-4">
      <div class="w-full">
        <img src="/login/1.jpg" alt="" class="w-full object-cover rounded-l-2xl">
      </div>
      <div class="pl-12 col-span-3">
          <h3 class="text-4xl font-bold leading-tight truncate">Layar Tancapp</h3>
          <p class="mt-2">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat veritatis recusandae corrupti ratione eveniet consectetur. Deserunt consectetur magni, quam ipsa voluptates tempore illum expedita facilis molestiae dolorum temporibus, aperiam autem dicta amet! Illo recusandae dolorum consectetur sapiente quam dolorem ratione soluta sint quidem beatae. Praesentium rem animi eos accusamus libero.
          </p>
      </div>
    </div> --}}


    <div class="container px-10 mx-auto w-full rounded-xl grid grid-cols-4">
      @foreach ($donation as $donate)
      <a href="./donatur/create">
        <div class="w-full mb-5">
          @if ($donate->image)
            <img class="inset-0 -left-96 border w-[300px] h-full rounded-l-2xl object-cover object-right" src="{{ asset($donate->image) }}" alt="img"  alt="{{ $donate->title }}">
          @endif
          {{-- <img src="/login/1.jpg" alt="" class="w-full object-cover rounded-l-2xl"> --}}
        </div>
      </a>
      <a href="./donatur/create" class="pl-8 pt-5 mb-5 col-span-3 hover:bg-gray-100">
        <div class="">
            <h3 class="text-3xl font-bold leading-tight truncate">{{ ucfirst($donate->title) }}</h3>
            <p class="mt-2">
              {{ $donate->body}}
            </p>
            <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2">
              {{ $donate->date}}
            </p>
        </div>
      </a>
      @endforeach
    </div>

   
    @include('layouts.footer')
@endsection


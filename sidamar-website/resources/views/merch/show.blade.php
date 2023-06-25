@extends('layouts.main')

@section('container')
    <div class="max-w-7xl">
      <div class="container mx-auto">  
      <div class="relative mx-auto max-w-screen-xl px-4 py-8">
        <div>
          <h1 class="text-3xl font-bold lg:text-4xl">{{ ucfirst($merch->title) }}</h1>
    
          <p class="mt-1 text-md text-gray-500">ID: ID-MERCH-20230{{ $merch->id }}</p>
        </div>
    
        <div class="grid lg:grid-cols-4 lg:items-start">
          <div class="lg:col-span-3">
            <div class="relative mt-4">
              
              @if ($merch->image)
                  <div class="h-full max-w-7xl flex justify-center">
                      <img src="{{ asset($merch->image) }}" alt="img" style="width:50%"  alt="{{ $merch->title }}">
                  </div>
              @endif
    
              
            </div>
          </div>
    
          
          <div class="lg:sticky lg:top-0">
              <form class="space-y-4  ">
                <fieldset>
                  <legend class="text-xl font-bold">Jenis Pembelian </legend>
      
                  <div class="mt-2 flex gap-1">
                      <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                          Preorder
                      </span>
                
              </div>
            </fieldset>
  
            
  
            <div>
              <p class="text-2xl font-bold">Rp {!! $merch->price !!}</p>
            </div>
  
            <div class="rounded border bg-gray-100 p-4">
              <p class="text-sm">
                <span class="block"> Pengiriman barang paling lambat 14 hari setelah pemesanan. </span>
  
                <a href="" class="mt-1 inline-block underline"> Selengkapnya </a>
              </p>
            </div>
            <legend class="text-lg font-bold">Deskripsi </legend>
            <p>
              {!! $merch->desc !!} <br> Si Damar menyediakan merchandise yang kekinian, selalu mengikuti trend, dan pastinya berbahan yang berkualitas
          </p>
          
          <div class="w-full flex gap-2">
            <a href="/merch/create" type="button" class="w-full rounded bg-red-700 hover:bg-red-800 px-6 py-4 text-sm font-bold text-center uppercase tracking-wide text-white">Beli Sekarang!</a>
          </div>
          <div class="w-full flex gap-2">
            <a href="/merch" type="button" class="w-full rounded border border-gray-300 bg-gray-100 px-6 py-4 text-sm text-center font-bold uppercase tracking-wide">Kembali</a>
          </div>

            </form>
          </div>
    
          <div class="lg:col-span-3">
            <div class="prose max-w-none">
              {{-- <p>
                  {!! $merch->desc !!} Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam totam
                eos iusto repellat blanditiis voluptate aspernatur, quae nemo
                exercitationem cum debitis! Sint consectetur laborum tempora
                repellat odit. Impedit quasi reprehenderit harum illum sequi
                provident soluta cum quisquam odit possimus? Officia illum saepe
                magnam nostrum, officiis placeat iure itaque cumque voluptate?
              </p> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('layouts.footer')
@endsection

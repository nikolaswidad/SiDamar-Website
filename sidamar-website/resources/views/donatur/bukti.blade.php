@extends('layouts.main')

@section('container')

    @if (session('success'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <div class="relative mx-auto max-w-screen-xl px-4 py-8 ">
        <div  class="-mx-4 flex flex-wrap justify-center">
            <div class="w-full px-4">
                <div class="mx-auto mb-1 max-w-[510px] text-center lg:mb-20">
                    <span class="text-primary mb-2 sm:text-3xl block text-lg font-semibold">
                        Terima Kasih!!
                    </span>
                    <p>Kamu telah berhasil berdonasi</p>
                </div>
            </div>
        </div>
      <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-2 md:gap-6">
          <div class="mt-5 md:col-span-2 md:mt-0">
            <form action="#" method="POST">
              <div class="overflow-hidden shadow sm:rounded-md">
                <div class="bg-white px-4 py-5 sm:p-6">
                  <h2 class="text-2xl font-bold lg:text-2xl text-center mb-2 mt-2">
                    @if ($donatur->donation && isset($donatur->donation->title))
                        {{ $donatur->donation->title }}
                    @endif
                  </h2>
                  <p class="text-xs text-center mb-5">Dibuat pada: {{ $donatur->created_at }}</p>
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">ID Donatur</label>
                      <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm" value="0002023-DTR-0{{ $donatur->id }}" disabled>
                    </div>
    
                    <div class="col-span-6 sm:col-span-3">
                      <label for="last-name" class="block text-sm font-medium text-gray-700">Nama Donatur</label>
                      <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm" value="{{ $donatur->name }}" disabled>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">Email</label>
                      <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"value="{{ $donatur->email }}" disabled>
                    </div>
    
                    <div class="col-span-6 sm:col-span-3">
                      <label for="last-name" class="block text-sm font-medium text-gray-700">Nomor Handphone</label>
                      <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"value="{{ $donatur->no_hp }}" disabled>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">Payment Method</label>
                      <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm uppercase"value="{{ $donatur->payment_type }}" disabled>
                    </div>
    
                    <div class="col-span-6 sm:col-span-3">
                      <label for="last-name" class="block text-sm font-medium text-gray-700">Total</label>
                      <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"value="{{ $donatur->total }}" disabled>
                    </div>
    
                    

                  </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 mb-5">
                  <a href="/donatur/"type="button" class="text-white rounded-lg bg-gray-400 hover:bg-gray-500 px-6 py-3 text-base text-center font-bold tracking-wide">Kembali</a>
                  <a href="/donatur/cetak/{{ $donatur->id }}"type="button" class=" text-white bg-red-700 hover:bg-red-800 font-bold rounded-lg text-base px-6 py-3 text-center">Cetak</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

@endsection

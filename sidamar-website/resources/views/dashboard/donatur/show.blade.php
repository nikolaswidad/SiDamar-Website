@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-4xl font-semibold font-montserrat">Donatur Detail</h1>
    <hr class="bg-slate-200 mt-5 max-w-lg">
    
    @if (session('success'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <div class="max-w-3xl xl:max-w-7xl">
      <h2 class="font-montserrat text-2xl font-bold lg:text-2xl mb-3 mt-8">
        @if ($donatur->donation && isset($donatur->donation->title))
            {{ $donatur->donation->title }}
        @endif
      </h2>
      <p class="block text-orange-500 text-lg font-bold mb-2">*dilakukan pada: {{ $donatur->created_at }}</p>
      
      <div class="lg:grid lg:grid-cols-2 lg:gap-3">

        <div class="">
          <label for="first-name" class="block text-gray-700 text-lg font-bold mb-2">ID Donatur</label>
          <input type="text" name="first-name" id="first-name" autocomplete="given-name" class=" mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm" value="0002023-DTR-0{{ $donatur->id }}" disabled>
        </div>

        <div class="">
          <label for="last-name" class="block text-gray-700 text-lg font-bold mb-2">Nama Donatur</label>
          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class=" mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm" value="{{ $donatur->name }}" disabled>
        </div>

        <div class="">
          <label for="first-name" class="block text-gray-700 text-lg font-bold mb-2">Email</label>
          <input type="text" name="first-name" id="first-name" autocomplete="given-name" class=" mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"value="{{ $donatur->email }}" disabled>
        </div>

        <div class="">
          <label for="last-name" class="block text-gray-700 text-lg font-bold mb-2">Nomor Handphone</label>
          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"value="{{ $donatur->no_hp }}" disabled>
        </div>

        <div class="">
          <label for="first-name" class="block text-gray-700 text-lg font-bold mb-2">Payment Method</label>
          <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm uppercase"value="{{ $donatur->payment_type }}" disabled>
        </div>

        <div class="">
          <label for="last-name" class="block text-gray-700 text-lg font-bold mb-2">Total</label>
          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"value="{{ $donatur->total }}" disabled>
        </div>

        <div class="">
          <label for="last-name" class="block text-gray-700 text-lg font-bold mb-2">Bukti Pembayaran</label>
          @if ($donatur->image)
              <div style="max-height: 500px; ">
                  <img src="{{ asset($donatur->image) }}" alt="img" alt="{{ $donatur->name }}" class="w-auto h-64">
              </div>
          @endif
        </div>

        <div class="flex justify-end lg:mt-64">
          <a href="/dashboard/donatur/"type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-3 rounded-lg mr-3">Kembali ke Daftar Donatur</a>
        </div>
      </div>
    </div>
    <div class="mb-16"></div>

@endsection

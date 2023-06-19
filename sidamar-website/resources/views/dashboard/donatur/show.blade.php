@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-4xl font-semibold font-montserrat">Donatur Detail</h1>
    <hr class="bg-slate-200 mt-5 max-w-lg">
    
    @if (session('success'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <div class="relative mx-auto max-w-7xl py-7 mr-9">
      <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="mt-5 md:col-span-2 md:mt-0">
            <form action="#" method="POST">
              <div class="overflow-hidden sm:rounded-md">
                <div class="">
                  <h2 class="font-montserrat text-2xl font-bold lg:text-2xl text-center mb-6 mt-2">
                    @if ($donatur->donation && isset($donatur->donation->title))
                        {{ $donatur->donation->title }}
                    @endif
                  </h2>
                  <p class="block text-orange-500 text-lg font-bold mb-2">*Dipesan pada: {{ $donatur->created_at }}</p>
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label for="first-name" class="block text-gray-700 text-lg font-bold">ID Donatur</label>
                      <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm" value="0002023-DTR-0{{ $donatur->id }}" disabled>
                    </div>
    
                    <div class="col-span-6 sm:col-span-3">
                      <label for="last-name" class="block text-gray-700 text-lg font-bold">Nama Donatur</label>
                      <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm" value="{{ $donatur->name }}" disabled>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="first-name" class="block text-gray-700 text-lg font-bold">Email</label>
                      <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"value="{{ $donatur->email }}" disabled>
                    </div>
    
                    <div class="col-span-6 sm:col-span-3">
                      <label for="last-name" class="block text-gray-700 text-lg font-bold">Nomor Handphone</label>
                      <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"value="{{ $donatur->no_hp }}" disabled>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="first-name" class="block text-gray-700 text-lg font-bold">Payment Method</label>
                      <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm uppercase"value="{{ $donatur->payment_type }}" disabled>
                    </div>
    
                    <div class="col-span-6 sm:col-span-3">
                      <label for="last-name" class="block text-gray-700 text-lg font-bold">Total</label>
                      <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"value="{{ $donatur->total }}" disabled>
                    </div>
    
                    <div class="col-span-6 sm:col-span-6">
                      <label for="last-name" class="block text-gray-700 text-lg font-bold">Bukti Pembayaran</label>
                      <div class="lg:col-span-6">
                        <div class="relative mt-4">
                          @if ($donatur->image)
                              <div style="max-height: 500px; ">
                                  <img src="{{ asset($donatur->image) }}" alt="img" alt="{{ $donatur->name }}">
                              </div>
                          @endif
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="flex justify-end">
                  <a href="/dashboard/donatur/"type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-3 rounded-lg mt-5 mr-3">Kembali</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="mb-16"></div>

@endsection

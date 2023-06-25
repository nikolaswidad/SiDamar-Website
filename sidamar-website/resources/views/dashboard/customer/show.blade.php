@extends('dashboard.layouts.main')

@section('container')
    <div class="max-w-7xl font-montserrat">
      <h1 class="text-4xl font-semibold font-montserrat">Detail Pembelian</h1>
      <hr class="bg-slate-200 mt-5 max-w-lg">
      
      @if (session('success'))
        <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
          {{ session('success') }}
        </div>
      @endif
  
        <h2 class="font-montserrat text-2xl font-bold lg:text-2xl mb-3 mt-8">
          @if ($customer->merch && isset($customer->merch->title))
              {{ $customer->merch->title }}
          @endif
        </h2>
        <p class="block text-orange-500 text-lg font-bold mb-2">*Dipesan pada: {{ $customer->created_at }}</p>
    
        <div class="lg:grid lg:grid-cols-2 lg:gap-3">
          <div class="">
            <label for="first-name" class="block text-gray-700 text-lg font-bold">ID customer</label>
            <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm" value="0002023-DTR-0{{ $customer->id }}" disabled>
          </div>

          <div class="">
            <label for="last-name" class="block text-gray-700 text-lg font-bold">Nama customer</label>
            <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm" value="{{ $customer->name }}" disabled>
          </div>

          <div class="">
            <label for="first-name" class="block text-gray-700 text-lg font-bold">Email</label>
            <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"value="{{ $customer->email }}" disabled>
          </div>

          <div class="">
            <label for="last-name" class="block text-gray-700 text-lg font-bold">Nomor Handphone</label>
            <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"value="{{ $customer->no_hp }}" disabled>
          </div>

          <div class="">
            <label for="first-name" class="block text-gray-700 text-lg font-bold">Payment Method</label>
            <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm uppercase"value="{{ $customer->payment_type }}" disabled>
          </div>

          <div class="">
            <label for="last-name" class="block text-gray-700 text-lg font-bold">Total</label>
            <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"value="{{ $customer->total }}" disabled>
          </div>

          <div class="">
            <label for="last-name" class="block text-gray-700 text-lg font-bold">Bukti Pembayaran</label>
            @if ($customer->image)
                <div style="max-height: 500px; ">
                    <img src="{{ asset($customer->image) }}" alt="img" alt="{{ $customer->name }}">
                </div>
            @endif
          </div>

          <div class="flex justify-end lg:mt-64">
            <a href="/dashboard/customer/"type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-3 rounded-lg mr-3">Kembali ke Daftar Pembelian</a>
          </div>

        </div>
        </div>

    </div>
    {{-- <div class="relative mx-auto max-w-screen-xl px-4 py-8">
      <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-2 md:gap-6">
          <div class="mt-5 md:col-span-2 md:mt-0">
            <form action="#" method="POST">
              <div class="overflow-hidden sm:rounded-md">
                <div class="">
                  <h2 class="text-2xl font-bold lg:text-2xl text-center mb-2 mt-2">
                    @if ($customer->merch && isset($customer->merch->title))
                        {{ $customer->merch->title }}
                    @endif
                  </h2>
                  <p class="block text-orange-500 text-lg font-bold mb-2">*Dipesan pada: {{ $customer->created_at }}</p>
                  <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-2">
                      <label for="first-name" class="block text-gray-700 text-lg font-bold">ID customer</label>
                      <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm" value="0002023-DTR-0{{ $customer->id }}" disabled>
                    </div>
    
                    <div class="col-span-2">
                      <label for="last-name" class="block text-gray-700 text-lg font-bold">Nama customer</label>
                      <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm" value="{{ $customer->name }}" disabled>
                    </div>

                    <div class="col-span-2">
                      <label for="first-name" class="block text-gray-700 text-lg font-bold">Email</label>
                      <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"value="{{ $customer->email }}" disabled>
                    </div>
    
                    <div class="col-span-2">
                      <label for="last-name" class="block text-gray-700 text-lg font-bold">Nomor Handphone</label>
                      <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"value="{{ $customer->no_hp }}" disabled>
                    </div>

                    <div class="col-span-2">
                      <label for="first-name" class="block text-gray-700 text-lg font-bold">Payment Method</label>
                      <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm uppercase"value="{{ $customer->payment_type }}" disabled>
                    </div>
    
                    <div class="col-span-2">
                      <label for="last-name" class="block text-gray-700 text-lg font-bold">Total</label>
                      <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"value="{{ $customer->total }}" disabled>
                    </div>
    
                    <div class="col-span-6 sm:col-span-6">
                      <label for="last-name" class="block text-gray-700 text-lg font-bold">Bukti Pembayaran</label>
                      <div class="lg:col-span-6">
                        <div class="relative mt-4">
                          @if ($customer->image)
                              <div style="max-height: 500px; ">
                                  <img src="{{ asset($customer->image) }}" alt="img" alt="{{ $customer->name }}">
                              </div>
                          @endif
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="flex justify-end">
                  <a href="/dashboard/customer/"type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-3 rounded-lg mt-5 mr-3">Kembali</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div> --}}

@endsection

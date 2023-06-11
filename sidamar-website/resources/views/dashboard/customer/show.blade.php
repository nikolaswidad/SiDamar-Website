@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-4xl font-semibold font-montserrat">Customer Detail</h1>
    <hr class="bg-slate-200 mt-5 max-w-lg">
    
    @if (session('success'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <div class="relative mx-auto max-w-screen-xl px-4 py-8">

      <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="mt-5 md:col-span-2 md:mt-0">
            <form action="#" method="POST">
              <div class="overflow-hidden shadow sm:rounded-md">
                <div class="bg-white px-4 py-5 sm:p-6">
                  <h2 class="text-2xl font-bold lg:text-2xl text-center mb-2 mt-2">
                    @if ($customer->merch && isset($customer->merch->title))
                        {{ $customer->merch->title }}
                    @endif
                  </h2>
                  <p class="text-xs text-center mb-5">Dipesan pada: {{ $customer->created_at }}</p>
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">ID customer</label>
                      <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm" value="0002023-DTR-0{{ $customer->id }}" disabled>
                    </div>
    
                    <div class="col-span-6 sm:col-span-3">
                      <label for="last-name" class="block text-sm font-medium text-gray-700">Nama customer</label>
                      <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm" value="{{ $customer->name }}" disabled>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">Email</label>
                      <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"value="{{ $customer->email }}" disabled>
                    </div>
    
                    <div class="col-span-6 sm:col-span-3">
                      <label for="last-name" class="block text-sm font-medium text-gray-700">Nomor Handphone</label>
                      <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"value="{{ $customer->no_hp }}" disabled>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">Payment Method</label>
                      <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm uppercase"value="{{ $customer->payment_type }}" disabled>
                    </div>
    
                    <div class="col-span-6 sm:col-span-3">
                      <label for="last-name" class="block text-sm font-medium text-gray-700">Total</label>
                      <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"value="{{ $customer->total }}" disabled>
                    </div>
    
                    <div class="col-span-6 sm:col-span-6">
                      <label for="last-name" class="block text-sm font-medium text-gray-700">Bukti Pembayaran</label>
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
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                  <a href="/dashboard/customer/"type="button" class="mt-2 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline ">Back</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

@endsection

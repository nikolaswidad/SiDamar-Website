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
      <div>
        <h1 class="text-2xl font-bold lg:text-4xl">
          @if ($customer->merch && isset($customer->merch->title))
              {{ $customer->merch->title }}
          @endif
        </h1>
  
        <p class="mt-1 text-sm text-gray-500">SKU: #012345</p>
      </div>
  
      <div class="grid gap-5 lg:grid-cols-4 lg:items-start">
        <div class="lg:col-span-2">
          <div class="relative mt-4">
            @if ($customer->image)
                <div style="max-height: 500px; ">
                    <img src="{{ asset($customer->image) }}" alt="img" alt="{{ $customer->name }}">
                </div>
            @endif
  
            
          </div>
        </div>
  
        
        <div class="lg:sticky lg:top-0">
            <form class="space-y-4 lg:pt-8">
              <fieldset>
                <legend class="text-lg font-bold">Nama Customer</legend>
    
                <div class="mt-2 flex flex-wrap gap-1">
                    <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                        {{ $customer->name }}
                    </span>
                </div>
              </fieldset>

              <fieldset>
                <legend class="text-lg font-bold">Email</legend>
    
                <div class="mt-2 flex flex-wrap gap-1">
                    <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                        {{ $customer->email }}
                    </span>
                </div>
              </fieldset>

              <fieldset>
                <legend class="text-lg font-bold">Phonel</legend>
    
                <div class="mt-2 flex flex-wrap gap-1">
                    <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                        {{ $customer->no_hp }}
                    </span>
                </div>
              </fieldset>

              <fieldset>
                <legend class="text-lg font-bold">Alamat</legend>
    
                <div class="mt-2 flex flex-wrap gap-1">
                    <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                        {{ $customer->address }}
                    </span>
                </div>
              </fieldset>

              <fieldset>
                <legend class="text-lg font-bold">Tipe Pembayaran</legend>
    
                <div class="mt-2 flex flex-wrap gap-1">
                    <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                        {{ $customer->payment_type }}
                    </span>
                </div>
              </fieldset>

              <fieldset>
                <legend class="text-lg font-bold">Total</legend>
    
                <div class="mt-2 flex flex-wrap gap-1">
                    <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                        {{ $customer->total }}
                    </span>
                </div>
              </fieldset>

            <a href="/dashboard/customer/"
              type="button"
              class="w-full rounded border border-gray-300 bg-gray-100 px-6 py-3 text-sm text-center font-bold uppercase tracking-wide"
            >
              Back
        </a>
          </form>
        </div>
  
       </div>
      </div>
    </div>
    
@endsection

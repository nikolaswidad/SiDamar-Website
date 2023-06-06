@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-4xl font-semibold font-montserrat">Donatur Detail</h1>
    <hr class="bg-slate-200 mt-5 max-w-lg">
    
    @if (session('success'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <div class="relative mx-auto max-w-screen-xl px-4 py-8">
      <div>
        <h1 class="text-2xl font-bold lg:text-4xl">
            @if ($donatur->donation && isset($donatur->donation->title))
                {{ $donatur->donation->title }}
            @endif
        </h1>
  
        <p class="mt-1 text-sm text-gray-500">SKU: #012345</p>
      </div>
  
      <div class="grid gap-5 lg:grid-cols-4 lg:items-start">
        <div class="lg:col-span-2">
          <div class="relative mt-4">
            @if ($donatur->image)
                <div style="max-height: 500px; ">
                    <img src="{{ asset($donatur->image) }}" alt="img" alt="{{ $donatur->name }}">
                </div>
            @endif
  
            
          </div>
        </div>
  
        
        <div class="lg:sticky lg:top-0">
            <form class="space-y-4 lg:pt-8">
              <fieldset>
                <legend class="text-lg font-bold">Nama Donatur</legend>
    
                <div class="mt-2 flex flex-wrap gap-1">
                    <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                        {{ $donatur->name }}
                    </span>
                </div>
              </fieldset>

              <fieldset>
                <legend class="text-lg font-bold">Email</legend>
    
                <div class="mt-2 flex flex-wrap gap-1">
                    <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                        {{ $donatur->email }}
                    </span>
                </div>
              </fieldset>

              <fieldset>
                <legend class="text-lg font-bold">Phonel</legend>
    
                <div class="mt-2 flex flex-wrap gap-1">
                    <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                        {{ $donatur->no_hp }}
                    </span>
                </div>
              </fieldset>

             

              <fieldset>
                <legend class="text-lg font-bold">Tipe Pembayaran</legend>
    
                <div class="mt-2 flex flex-wrap gap-1">
                    <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                        {{ $donatur->payment_type }}
                    </span>
                </div>
              </fieldset>

              <fieldset>
                <legend class="text-lg font-bold">Total</legend>
    
                <div class="mt-2 flex flex-wrap gap-1">
                    <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                        {{ $donatur->total }}
                    </span>
                </div>
              </fieldset>

            <a href="/dashboard/donatur/"
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

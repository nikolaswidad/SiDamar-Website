@extends('dashboard.layouts.main')

@section('container')
<h1 class="text-4xl font-semibold font-montserrat">Buat Bulan Pembayaran Kas</h1>

<div class="max-w-5xl">
    <hr class="bg-slate-200 mt-5 max-w-3xl">
      <form action="/dashboard/bulan_kas/" method="post" class="max-w-3xl mt-8 mb-8 font-montserrat">
        @csrf
                
        {{-- Input Bulan type dropdown with cool tailwind style --}}
        <div class="mb-4">
            <label for="bulan" class="block text-gray-700 text-lg font-bold mb-2">Bulan</label>
            <select name="bulan" id="bulan" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5">
                {{-- disable option shows data from database --}}
                <option value="{{ $bulanKas->bulan }}" disabled>{{ $bulanKas->bulan }}</option>
            </select>
            {{-- <input type="text" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5"> --}}

            @error('bulan')
                <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
            @enderror

            {{-- field tahun berdasarkan tahun saat ini --}}
            <label for="tahun" class="block text-gray-700 text-lg font-bold mb-2">Tahun</label>
            <select name="tahun" id="tahun" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5">
                <option value="">Pilih Tahun</option>
                @for ($i = now()->year; $i >= now()->year - 10; $i--)
                    <option value="{{ $i }}" {{ old('tahun') == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
                {{-- @for ($i = now()->year; $i >= now()->year - 10; $i--)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor --}}
            </select>

            @error('tahun')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror

            
          </form>
          
          
          <div class="flex justify-end max-w-full">
              <button type="submit" class="bg-primary hover:bg-red-700 text-white font-bold p-3 rounded-lg mt-5">Buat Bulan</button>
          </div>

          {{-- every input must be unique --}}
          @if (session()->has('error'))
              <div class="text-red-500 text-sm mt-2">{{ session('error') }}</div>
          @endif

          {{-- success message --}}
          @if (session()->has('success'))
              <div class="text-green-500 text-sm mt-2">{{ session('success') }}</div>
          @endif

</div>
@endsection
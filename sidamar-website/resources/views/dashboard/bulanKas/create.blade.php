@extends('dashboard.layouts.main')

@section('container')

<div class="max-w-5xl">
    <h1 class="text-4xl font-semibold font-montserrat">Buat Bulan Pembayaran Kas</h1>
    <hr class="bg-slate-200 mt-5 max-w-3xl">
      <form action="/dashboard/bulanKas/" method="post" class="max-w-3xl mt-8 mb-8 font-montserrat">
        @csrf
                
        {{-- Input Bulan type dropdown with cool tailwind style --}}
        <div class="mb-4">
            <label for="bulan" class="block text-gray-700 text-lg font-bold mb-2">Bulan</label>
            <select name="bulan" id="bulan" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5">
                {{-- select old value if any --}}
                <option value="">Pilih Bulan</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
            </select>

            @error('bulan')
                <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
            @enderror
            
            <div class="hidden">
                <label for="user" class="block text-gray-700 text-lg font-bold mb-2">UserID</label>
                <input type="text" name="user_id" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Link Presskit Film" value="{{ auth()->user()->id }}">
            </div>

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
              <a href="/dashboard/bulanKas" class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-3 rounded-lg mt-5 mr-3">Kembali</a>
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
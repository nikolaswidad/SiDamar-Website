@extends('dashboard.layouts.main')

@section('container')
<h1 class="text-4xl font-semibold font-montserrat">Buat Bulan Pembayaran Kas</h1>

<div class="max-w-5xl">
    <hr class="bg-slate-200 mt-5 max-w-3xl">
    


      <form action="/dashboard/bulanKas/{{ $bulanKas->id }}" method="post" class="max-w-3xl mt-8 mb-8 font-montserrat">
        @method('put')
        @csrf
        {{-- Input Bulan type dropdown with cool tailwind style --}}
        <div class="mb-4">
            <label for="bulan" class="block text-gray-700 text-lg font-bold mb-2">Bulan</label>
            <select name="bulan" id="bulan" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5">
                {{-- selected value from the database and display other options --}}
                <option value="Januari" {{ $bulanKas->bulan == 'Januari' ? 'selected' : '' }}>Januari</option>
                <option value="Februari" {{ $bulanKas->bulan == 'Februari' ? 'selected' : '' }}>Februari</option>
                <option value="Maret" {{ $bulanKas->bulan == 'Maret' ? 'selected' : '' }}>Maret</option>
                <option value="April" {{ $bulanKas->bulan == 'April' ? 'selected' : '' }}>April</option>
                <option value="Mei" {{ $bulanKas->bulan == 'Mei' ? 'selected' : '' }}>Mei</option>
                <option value="Juni" {{ $bulanKas->bulan == 'Juni' ? 'selected' : '' }}>Juni</option>
                <option value="Juli" {{ $bulanKas->bulan == 'Juli' ? 'selected' : '' }}>Juli</option>
                <option value="Agustus" {{ $bulanKas->bulan == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                <option value="September" {{ $bulanKas->bulan == 'September' ? 'selected' : '' }}>September</option>
                <option value="Oktober" {{ $bulanKas->bulan == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                <option value="November" {{ $bulanKas->bulan == 'November' ? 'selected' : '' }}>November</option>
                <option value="Desember" {{ $bulanKas->bulan == 'Desember' ? 'selected' : '' }}>Desember</option>
            </select>

            {{-- @error('bulan')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror --}}

            {{-- field tahun berdasarkan tahun saat ini --}}
            <label for="tahun" class="block text-gray-700 text-lg font-bold mb-2">Tahun</label>
            <select name="tahun" id="tahun" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5">
                {{-- selected value from the database and display other options --}}
                {{-- <option value="{{ $bulanKas->tahun }}" {{ $bulanKas->tahun == date('Y') ? 'selected' : '' }}>{{ $bulanKas->tahun }}</option> --}}
                {{-- display other option without the selected option --}}
                @for ($i = now()->year; $i >= now()->year - 10; $i--)
                    <option value="{{ $i }}" {{ $bulanKas->tahun == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>

            <div class="flex justify-end max-w-full">
                  <a href="/dashboard/bulanKas" class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-3 rounded-lg mt-5 mr-3">Kembali</a>
                  <button type="submit" class="bg-primary hover:bg-red-700 text-white font-bold p-3 rounded-lg mt-5">Update Bulan</button>
            </div>
          </form>
          
          

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
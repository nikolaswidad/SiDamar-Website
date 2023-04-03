@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-4xl font-semibold font-montserrat">Arsip Film</h1>
    <hr class="bg-slate-200 mt-5 max-w-lg">
    
    @if (session('success'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 bg-red-700 rounded-xl" role="alert">
      {{ session('error') }}
    </div>
    @endif

    {{-- Tabel Lama --}}
    <div class="max-w-7xl">
      {{-- if is_admin == 1 --}}
      @if (Auth::user()->is_admin == 1)
        <div class="flex justify-end">
          <a href="/dashboard/arsipFilm/create" class="p-3 bg-primary rounded-lg text-white font-semibold hover:bg-red-700 mt-5 mb-5">Buat Arsip Film Baru</a>
        </div>
      @endif
        <div class="flex flex-col font-montserrat">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full">
                    <thead class="border-b">
                      <tr>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Judul Film</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Tahun Produksi</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Durasi</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Kategori</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Action</th>
                      </tr>
                    </thead>
                    @foreach ($arsipFilm as $film)
                        <tr class="border-b">
                            {{-- check user status in pembayaran kas, if != success display it --}}
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $film->judul_film }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $film->tahun_produksi }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $film->durasi }} Menit</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $film->kategori }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">
                                {{-- Link presskit --}}
                                <a href="{{ $film->link_film }}" class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 text-sm rounded-lg">Link</a>
                                {{-- Link edit --}}
                                <a href="/dashboard/arsipFilm/{{ $film->id }}/edit" class="bg-orange-400 hover:bg-orange-600 text-white text-sm p-2 rounded-lg">Edit</a>
                                {{-- Link delete --}}
                                <form action="/dashboard/arsipFilm/{{ $film->id }}" method="post" class="inline-block">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="bg-primary hover:bg-red-700 text-white text-sm p-2 rounded-lg" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

@endsection
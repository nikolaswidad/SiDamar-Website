@extends('dashboard.layouts.main')

@section('container')

{{-- Tabel Lama --}}
  <div class="max-w-5xl">

    <h1 class="text-4xl font-semibold font-montserrat">Arsip Film</h1>
    <hr class="bg-slate-200 mt-5 max-w-sm">
    <div class="max-w-7xl">
        
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
  
        <div class="grid grid-cols-2">
          <div class="flex justify-start">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none py-2">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
              </div>
              <input type="text" id="table-search" class="mt-5 block p-3 pl-10 text-md text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Arsip Film...">
            </div>
          </div>
  
          {{-- if is_admin == 1 --}}
          @if (Auth::user()->is_admin == 1)
            <div class="flex justify-end">
              <a href="/dashboard/arsipFilm/create" class="p-3 bg-primary rounded-lg text-white font-semibold hover:bg-red-700 mt-5 mb-5">Buat Arsip Film Baru</a>
            </div>
          @endif
  
        </div>
  
          <div class="flex flex-col font-montserrat">
              <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="overflow-hidden">
                    <table class="max-w-full">
                      <thead class="border-b">
                        <tr>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Judul Film</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Tahun Produksi</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/6">Durasi</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Kategori</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Action</th>
                        </tr>
                      </thead>
                      <tbody id="film-table">
                        @foreach ($arsipFilm as $film)
                            <tr class="border-b">
                                {{-- check user status in pembayaran kas, if != success display it --}}
                                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
                                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $film->judul_film }}</td>
                                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $film->tahun_produksi }}</td>
                                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $film->durasi }} Menit</td>
                                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $film->kategori }}</td>
                                <td class="text-lg text-gray-900 px-6 py-4 text-left flex gap-2">
                                    {{-- Link presskit --}}
                                    <a href="{{ $film->link_film }}" class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 text-sm font-semibold rounded-lg">Link</a>
                                    {{-- Link edit --}}
                                    <a href="/dashboard/arsipFilm/{{ $film->id }}/edit" class="bg-orange-400 hover:bg-orange-600 text-white text-sm font-semibold p-2 rounded-lg">Edit</a>
                                    {{-- Link delete --}}
                                    <form action="/dashboard/arsipFilm/{{ $film->id }}" method="post" class="inline-block">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="bg-primary hover:bg-red-700 text-white text-sm font-semibold p-2 rounded-lg" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {

    var searchInput = document.getElementById("table-search");
    searchInput.addEventListener("input", searchTable);

    function searchTable() {
        var input = searchInput.value.toLowerCase();
        var table = document.getElementById("film-table");
        var rows = table.getElementsByTagName("tr");

        for (var i = 0; i < rows.length; i++) {
            var rowData = rows[i].textContent.toLowerCase();

            if (rowData.includes(input)) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }

      // Make the table header sticky
      var tableContainer = document.querySelector(".table-container");
      tableContainer.addEventListener("scroll", function() {
        var tableHeader = document.querySelector("kas-table thead");
        tableHeader.style.transform = "translateY(" + tableContainer.scrollTop + "px)";
    });
  });
  </script>
                  

@endsection
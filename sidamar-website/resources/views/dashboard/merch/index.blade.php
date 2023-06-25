@extends('dashboard.layouts.main')

@section('container')
    <div class="max-w-7xl font-montserrat">
      <h1 class="text-4xl font-semibold font-montserrat">Merchandise</h1>
      <hr class="bg-slate-200 mt-5 mb-9 max-w-lg">
      
      @if (session('success'))
      <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 mb-5 bg-green-500 rounded-xl" role="alert">
        {{ session('success') }}
      </div>
      @endif

      <a href="/dashboard/merch/create">
        <button type="button" class="bg-red-600 text-white px-5 py-2.5 mr-2 mb-4 rounded-lg text-md font-bold float-right">+ Tambahkan Merch</button>
      </a>

      <div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative max-w-3xl">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none py-2">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
          </div>
          <input type="text" id="table-search" class="mb-5 block p-3 pl-10 text-md text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Merchandise...">
        </div>
      </div>

      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
        <thead class="border-b">
          <tr>
            <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No</th>
            <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Gambar</th>
            <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/6">Nama</th>
            <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/6">Deskripsi</th>
            <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Harga</th>
            <th scope="col" class="text-lg font-bold text-gray-900 py-4 text-center">Action</th>
          </tr>
        </thead>
        <tbody id="merch-table">
        @foreach ($merch as $mer)
            <tr class="border-b">
                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
                <td class="text-lg text-gray-900 px-6 py-4 text-left">
                  @if ($mer->image)
                    <div style="max-height: 350px; overflow:hidden">
                      <img src="{{ asset($mer->image) }}" alt="img" style="width: 100px" alt="{{ $mer->title }}">
                    </div>
                  @endif</td>

                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $mer->title}}</td>
                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $mer->desc }}</td>
                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $mer->price }}</td>
                <td class="text-lg text-gray-900 px-6 py-4 text-center">
                  <form action="/dashboard/merch/{{ $mer['id'] }}" method="POST" class="inline-block">
                    @csrf
                    @method('delete')
                    <a href="/dashboard/merch/{{ $mer->id }}/edit"><button type="button" class="bg-orange-400 hover:bg-orange-700 text-white text-sm font-semibold p-2 rounded-lg">Edit</button></a>
                    <button type="submit" class="bg-primary text-white p-2 rounded-lg text-sm font-semibold">Delete</button>
                  </form>
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
      @empty($merch)
        <div class="px-6 py-8 whitespace-nowrap">
            <div class="font-semibold mb-5 text-2xl text-center text-gray-500">- Tidak Ada Data Donatur -</div>
        </div>
      @endempty
      <div id="no-event-data" class="hidden px-6 py-6 whitespace-nowrap">
          <div class="font-semibold mb-5 text-2xl text-center text-gray-500">Donatur tidak ditemukan</div>
      </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
        document.addEventListener("DOMContentLoaded", function() {

        var searchInput = document.getElementById("table-search");
        searchInput.addEventListener("input", searchTable);

        function searchTable() {
            var input = searchInput.value.toLowerCase();
            var table = document.getElementById("merch-table");
            var rows = table.getElementsByTagName("tr");
            var noEventDataDiv = document.getElementById("no-event-data");

            var hasResults = false;

            for (var i = 0; i < rows.length; i++) {
                var rowData = rows[i].textContent.toLowerCase();

                if (rowData.includes(input)) {
                    rows[i].style.display = "";
                    hasResults = true;
                } else {
                    //h1 Tidak ada event

                    rows[i].style.display = "none";
                }
            }

            if (hasResults) {
            noEventDataDiv.style.display = "none";
            } else {
                noEventDataDiv.style.display = "block";
            }
        }

        // Make the table header sticky
        var tableContainer = document.querySelector(".table-container");
        tableContainer.addEventListener("scroll", function() {
            var tableHeader = document.querySelector("merch-table thead");
            tableHeader.style.transform = "translateY(" + tableContainer.scrollTop + "px)";
            });
        });
      </script>   
      
    </div>
    <div class="mb-24"></div>
@endsection
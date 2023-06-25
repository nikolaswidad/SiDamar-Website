@extends('dashboard.layouts.main')

@section('container')
  <div class="max-w-7xl font-montserrat">
    <h1 class="text-4xl font-semibold font-montserrat">Donasi</h1>
    <hr class="bg-slate-200 mt-5 mb-9 max-w-lg">
    
    @if (session('success'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 mb-5  bg-green-500 rounded-xl" role="alert">
      {{ session('success') }}
    </div>
    @endif
        
    <a href="/dashboard/donation/create">
      <button type="button" class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 mr-2 mb-5 rounded-lg text-md font-bold float-right">+ Tambahkan Donasi Event</button>
    </a>

    <div>
      <label for="table-search" class="sr-only">Search</label>
      <div class="absolute flex items-center pl-3 pointer-events-none py-4">
        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
      </div>
      <input type="text" id="table-search" class="block p-3 pl-10 text-md text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Donasi Event...">
    </div>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
      <thead class="border-b">
        <tr>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Gambar</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/6">Nama Acara</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-center">Keterangan</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/6">Tanggal</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/6">Action</th>
        </tr>
      </thead>
      <tbody id="donation-table">
        @foreach ($donation as $don)
          <tr class="border-b">
            <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>

            <td class="text-base text-gray-900 px-6 py-4 text-left">
              @if ($don->image)
                <div style="max-height: 350px; overflow:hidden">
                  <img src="{{ asset($don->image) }}" alt="img" style="width: 100px" alt="{{ $don->title }}">
                </div>
              @endif</td>

            <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $don->title }}</td>

            <td class="text-base text-gray-900 px-6 py-4 text-left">
              <div class="flex justify-center">
                <button data-tooltip-target="tooltip-light" data-tooltip-style="light" type="button" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center">Detail</button>
                <div id="tooltip-light" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-base text-gray-900 bg-white border border-gray-200 rounded-xl shadow-lg opacity-0 tooltip">
                    {{ $don->body }}
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
              </div>
            </td>

            <td class="text-base text-gray-900 px-6 py-4 text-left">{{ Carbon\Carbon::parse($don->date)->format('Y-m-d') }}</td>

            <td class="text-base text-gray-900 px-6 py-4 text-center">
              <form action="/dashboard/donation/{{ $don['id'] }}" method="POST" class="inline-block">
                @csrf
                @method('delete')
                <a href="/dashboard/donation/{{ $don->id }}/edit"><button type="button" class="bg-orange-400 hover:bg-orange-700 text-white text-sm font-semibold p-2 rounded-lg">Edit</button></a>
                <button type="submit" class="bg-primary hover:bg-red-700 text-white p-2 rounded-lg text-sm font-semibold">Hapus</button>
              </form>
            </td>

            </tr>
        @endforeach
      </tbody>
    </table>
    @empty($donation)
        <div class="px-6 py-8 whitespace-nowrap">
            <div class="font-semibold mb-5 text-2xl text-center text-gray-500">- Tidak Ada Film -</div>
        </div>
    @endempty
    <div id="no-event-data" class="hidden px-6 py-4 whitespace-nowrap">
        <div class="font-semibold mb-5 text-2xl text-center text-gray-500">Event Donasi tidak ditemukan</div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

        var searchInput = document.getElementById("table-search");
        searchInput.addEventListener("input", searchTable);

        function searchTable() {
            var input = searchInput.value.toLowerCase();
            var table = document.getElementById("donation-table");
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
                var tableHeader = document.querySelector("donation-table thead");
                tableHeader.style.transform = "translateY(" + tableContainer.scrollTop + "px)";
            });
        });

        function showBukti(bukti_pembayaran) {
            var modal = document.getElementById("myModal");
            var modalImg = document.getElementById("img01");
            var span = document.getElementsByClassName("close")[0];
    
            modal.style.display = "block";
            modalImg.src = "/bukti_pembayaran/" + bukti_pembayaran;
    
            span.onclick = function() {
                modal.style.display = "none";
            }
    
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }
    </script>
    
  </div>
  <div class="mb-16"></div>
@endsection
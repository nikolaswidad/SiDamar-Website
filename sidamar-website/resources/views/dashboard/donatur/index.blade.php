@extends('dashboard.layouts.main')

@section('container')
  <div class="max-w-5xl font-montserrat">
    <h1 class="text-4xl font-semibold font-montserrat">Donatur</h1>
    <hr class="bg-slate-200 mt-5 mb-9 max-w-lg">
    
    @if (session('success'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 mb-5 bg-green-500 rounded-xl" role="alert">
      {{ session('success') }}
    </div>
    @endif

    {{-- Tabel Lama --}}
    <div>
      <label for="table-search" class="sr-only">Search</label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none py-2">
          <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </div>
        <input type="text" id="table-search" class="mb-5 block p-3 pl-10 text-md text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Donatur...">
      </div>
    </div>

    <table class="min-w-full">
      <thead class="border-b">
        <tr>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">ID</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Nama</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No HP</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Email</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Event</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Total</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Metode Pembayaran</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Bukti</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/2">Action</th>
        </tr>
      </thead>
      <tbody id="donation-table">
      @foreach ($donatur as $donate => $don)
        <tr class="border-b">
            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
            <td class="text-lg text-gray-900 px-6 py-4 text-left">0002023-DTR-0{{ $don->id }}</td>    
            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $don->name }}</td>
            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $don->no_hp }}</td>
            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $don->email }}</td>
            <td class="text-lg text-gray-900 px-6 py-4 text-left">
              @if ($don->donation && isset($don->donation->title))
                  {{ $don->donation->title }}
              @endif
            </td>
            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $don->total }}</td>
            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $don->payment_type }}</td>

            <td class="text-lg text-gray-900 px-6 py-4 text-left">
                @if ($don->image)
              <div style="max-height: 350px; overflow:hidden">
                <img src="{{ asset($don->image) }}" alt="img" style="width: 100px" alt="{{ $don->name }}">
              </div>
            @endif</td>
            <td class="text-lg text-gray-900 px-6 py-10 text-left flex gap-2">
              <a href="/dashboard/donatur/{{ $don->id }}" class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 text-sm font-semibold rounded-lg inline">Detail</a>
              <form action="/dashboard/donatur/{{ $don['id'] }}" method="POST" class="inline-block">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="bg-primary hover:bg-red-700 text-white p-2 rounded-lg text-sm font-semibold inline" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            </td>
        </tr>
      @endforeach
      </tbody>
  </table>
                
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function() {

      var searchInput = document.getElementById("table-search");
      searchInput.addEventListener("input", searchTable);

      function searchTable() {
          var input = searchInput.value.toLowerCase();
          var table = document.getElementById("donation-table");
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
          var tableHeader = document.querySelector("donation-table thead");
          tableHeader.style.transform = "translateY(" + tableContainer.scrollTop + "px)";
      });
    });
    </script>
  </div>
@endsection
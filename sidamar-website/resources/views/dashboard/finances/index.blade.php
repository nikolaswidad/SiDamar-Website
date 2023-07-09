@php
$total_cashin = 0;
$total_cashout = 0;
$total = 0;
$balance = 0;
@endphp

@extends('dashboard.layouts.main')

@section('container')
    <div class="max-w-7xl font-montserrat">
      <h1 class="text-4xl font-semibold font-montserrat">Transaksi Keuangan SI DAMAR</h1>
      <hr class="bg-slate-200 mt-5 mb-9 max-w-lg">
      
      @if (session('success'))
      <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 mb-5 bg-green-500 rounded-xl" role="alert">
        {{ session('success') }}
      </div>
      @endif
  
      <a href="/dashboard/finances/create"><button type="button" class="p-3 bg-primary rounded-lg text-white font-semibold hover:bg-red-700 float-right mb-5">+ Tambahkan Report</button></a>
  
      <div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative max-w-3xl">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none py-2">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
          </div>
          <input type="text" id="table-search" class="mb-5 block p-3 pl-10 text-md text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Report...">
        </div>
      </div>
  
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
        <thead class="border-b">
          <tr>
            <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/12">No</th>
            <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Keperluan</th>
            <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/3">Tanggal</th>
            <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">CashIn</th>
            <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">CashOut</th>
            <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Keterangan</th>
            <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-center w-full">Action</th>
          </tr>
        </thead>
        <tbody  id="finances-table">
        @foreach ($finance as $fin)
  
            <tr class="border-b">
                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $fin->keperluan}}</td>
                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ Carbon\Carbon::parse($fin->tanggal)->format('Y-m-d') }}</td>
                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $fin->cashin }}</td>
                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $fin->cashout }}</td>
                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $fin->keterangan }}</td>
  
                <td class="text-lg text-gray-900 px-6 py-4 text-center">
                <form action="/dashboard/finances/{{ $fin['id'] }}" method="POST">
                  @csrf
                  @method('delete')
                  <a href="/dashboard/finances/{{ $fin->id }}/edit"><button type="button" class="bg-orange-400 hover:bg-orange-700 text-white text-sm p-2 px-3 rounded-lg font-semibold">Edit</button></a>
                  <button type="submit" class="bg-primary hover:bg-red-700 text-white p-2 px-3 rounded-lg text-sm font-semibold">Hapus</button>
                </form>
              </td>
            </tr>
            @php
              $total_cashin += $fin['cashin'];
              $total_cashout += $fin['cashout'];
            @endphp
        @endforeach
        @php
              $total = $total_cashin - $total_cashout;
        @endphp
        <tr>
          <td class="text-lg text-gray-900 px-6 py-4 text-left"> </td>
                <td class="text-lg text-gray-900 px-6 py-4 text-left"><b>Total</b>  </td>
                <td class="text-lg text-gray-900 px-6 py-4 text-left"></td>
                <td class="text-lg text-gray-900 px-6 py-4 text-left"><b>{{ $total_cashin }}</b></td>
                <td class="text-lg text-gray-900 px-6 py-4 text-left"><b>{{ $total_cashout }}</b></td>
                <td class="text-lg text-gray-900 px-6 py-4 text-left"><b>{{ $total }}</b></td>
        </tr>
        </tbody>
    </table>
    </div>
    @empty($finance)
      <div class="px-6 py-8 whitespace-nowrap">
          <div class="font-semibold mb-5 text-2xl text-center text-gray-500">- Tidak Ada Report -</div>
      </div>
    @endempty
    <div id="no-event-data" class="hidden px-6 py-4 whitespace-nowrap">
        <div class="font-semibold mb-5 text-2xl text-center text-gray-500">Report tidak ditemukan</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function() {

      var searchInput = document.getElementById("table-search");
      searchInput.addEventListener("input", searchTable);

      function searchTable() {
          var input = searchInput.value.toLowerCase();
          var table = document.getElementById("finances-table");
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
          var tableHeader = document.querySelector("finances-table thead");
          tableHeader.style.transform = "translateY(" + tableContainer.scrollTop + "px)";
      });
      });
    </script>
@endsection
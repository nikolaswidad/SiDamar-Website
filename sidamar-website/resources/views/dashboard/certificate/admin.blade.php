@extends('dashboard.layouts.main')

@section('container')
   <h1 class="text-4xl font-semibold font-montserrat">Daftar Sertifikat</h1>
   <hr class="bg-slate-200 mt-5 mb-9 max-w-lg">

   @if (Session::has('success'))
    <div class="max-w-full font-montserrat text-xl text-white p-5 mt-5 mb-5 bg-green-500 rounded-xl" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <label for="table-search" class="sr-only">Search</label>
    <div class="relative">
      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none py-2">
        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
      </div>
      <input type="text" id="table-search" class="mb-5 block p-3 pl-10 text-md text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Sertfikat...">
    </div>

    <div class="container mx-auto">
    <div class="relative overflow-x-auto sm:rounded-lg">
               <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-sm text-gray-700 bg-gray-50 border-b dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                     <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Approve</th>
                     <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Reject</th>
                     <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Nama Event</th>
                     <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/6">Tanggal</th>
                     <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Nama</th>
                     <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Status</th>
                     <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Print</th>
                    </tr>
                  </thead>
                  
                  <tbody id="sertif-table">
                  @php $no = 1 @endphp
                  @foreach ($certif as $cf => $hasil)
                   <tr class="border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                     <td class="text-lg text-gray-900 px-6 py-4 text-left">
                      <a href="{{ url('dashboard/statuscertificate/approved/'.$hasil->id) }}">
                        {{-- <img src="{{ asset('img/CheckCircle.svg') }}" width="30px" height="30px" type="image/svg+xml"> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
              
                      </a>
                    </td>
                    <td class="text-lg text-gray-900 px-6 py-4 text-left">
                      <a href="{{ url('dashboard/statuscertificate/rejected/'.$hasil->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                      </a>
                    </td>
                    <td class="text-lg text-gray-900 px-6 py-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $hasil->events->title }}</td>
                    <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $hasil->events->date }}</td>
                    <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $hasil->user->name }}</td>
                     <td class="text-lg text-gray-900 px-6 py-4 text-left">
                      <span class="px-2 font-semibold
                        @if ($hasil->cstatus->id == 1)
                        bg-orange-400 text-white px-1.5 py-2 text-sm rounded-lg text-center inline-flex
                        @elseif ($hasil->cstatus->id == 3)
                        bg-red-600 text-white px-1.5 py-2 text-sm rounded-lg text-center inline-flex
                        @else
                        bg-green-400 text-white px-1.5 py-2 text-sm rounded-lg text-center inline-flex 
                        @endif
                            last:mr-0 mr-1">
                        {{ $hasil->cstatus->name }}
                      </span>
                    </td> 
                    <td class="text-lg text-gray-900 px-6 py-4 text-left">
                      <form id="form-print" action="{{ route('buat') }}" method="POST" target="blank_">
                        @csrf
                        <input type="hidden" name="tanggal" value="{{ $hasil->events->date }}">
                        <input type="hidden" name="nama" value="{{ $hasil->user->name }}">
                        <input type="hidden" name="judul" value="{{ $hasil->events->title }}">
                        <input type="hidden" name="manager" value="{{ $hasil->events->event_manager }}">
                        <button type="submit"
                        class="bg-lime-500 text-white p-2 px-4 py-2 rounded-lg text-sm" ><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg></button>
                      </form>
                      </td>
                     
                   </tr>
                  @endforeach           
                  </tbody>
                </table> 
          </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {

    var searchInput = document.getElementById("table-search");
    searchInput.addEventListener("input", searchTable);

    function searchTable() {
        var input = searchInput.value.toLowerCase();
        var table = document.getElementById("sertif-table");
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
        var tableHeader = document.querySelector("sertif-table thead");
        tableHeader.style.transform = "translateY(" + tableContainer.scrollTop + "px)";
    });
  });
  </script>
  <div class="mb-16"></div>
@endsection
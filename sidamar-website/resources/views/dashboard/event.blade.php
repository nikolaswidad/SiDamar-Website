@extends('dashboard.layouts.main')

@section('container')

    <div class="max-w-7xl font-montserrat">
        <h1 class="font-bold mb-5 text-4xl">Event</h1>
        <hr class="bg-slate-200 mt-5 max-w-lg">
       
        @if (Session::has('success'))
            <div class="max-w-full font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
                {{ session('success') }}
            </div>
        @endif
            
        <div class="flex justify-start">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none py-2">
                <svg class="w-5 h-5 mt-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="table-search" class="mt-5 block p-3 pl-10 text-md text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Event...">
            </div>
        </div>
        
    
        <div class="relative overflow-x-auto sm:rounded-lg mt-3">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Event</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Kategori</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Waktu & Tanggal</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Lokasi</th>
                    </tr>
                </thead>
                <tbody id="event-table">
                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                        @foreach ($events as $event)
                        <tr class="border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
                            <th scope="row" class="px-6 py-4 text-lg font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="{{ route('events.show', $event->id) }}" class="hover:text-primary">
                                    {{ $event->title }}</td>
                                  </a>                        
                            </th>
                            <td class="px-6 py-4 text-lg ">{{ $event->category }}</td>
                            <td class="px-6 py-4 text-md ">
                                {{ \Carbon\Carbon::parse($event->time)->format('H:i') }} | {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-lg ">
                                <a href="{{ $event->url }}" target="_blank" class="text-primary hover:text-primaryLighten">
                                {{ $event->location }}
                                </a>
                            </td>
                        </tr>
                      @endforeach     
                    </tr>
                </tbody>
            </table>
            @empty($events)
            <div class="px-6 py-4 whitespace-nowrap">
                <div class="font-semibold mb-5 text-2xl text-center text-gray-500">-- Tidak ada event --</div>
            </div>
            @endempty
            <div id="no-event-data" class="hidden px-6 py-4 whitespace-nowrap">
                <div class="font-semibold mb-5 text-2xl text-center text-gray-500">Event tidak ditemukan</div>
            </div>
    
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {

            var searchInput = document.getElementById("table-search");
            searchInput.addEventListener("input", searchTable);

            function searchTable() {
                var input = searchInput.value.toLowerCase();
                var table = document.getElementById("event-table");
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
                var tableHeader = document.querySelector("event-table thead");
                tableHeader.style.transform = "translateY(" + tableContainer.scrollTop + "px)";
            });
        });
        </script> 
        
    
        
           
       <div class="mb-24"></div>
    </div>   
@endsection
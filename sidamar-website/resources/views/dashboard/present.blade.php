@extends('dashboard.layouts.main')

<?php include(app_path('Helpers/present_helpers.php')); ?>

@section('container')
    @php
    //get type
    @endphp
    <div class="max-w-7xl font-montserrat">
        <h1 class="text-4xl font-semibold font-montserrat">Riwayat Presensi</h1>
        <hr class="bg-slate-200 mt-5 max-w-lg">
        
        <div class="flex justify-start">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none py-2">
                <svg class="w-5 h-5 mt-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
              </div>
              <input type="text" id="table-search" class="mt-5 block p-3 pl-10 text-md text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Presensi...">
            </div>
          </div>

        <div class="flex flex-shrink lg:flex-col font-montserrat">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="w-full text-lg text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">
                                        No
                                    </th>
                                    <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">
                                        Acara
                                    </th>
                                    <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">
                                        Status
                                    </th>
                                    <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">
                                        Terakhir Update
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="present-table">
                                @foreach ($eventData as $eventId => $event)
                                    <tr class="border-b border-gray-200">
                                        <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 text-lg whitespace-no-wrap">
                                            <div class="flex items-center">
                                                <div>
                                                    <div class="text-lg font-medium leading-5 text-gray-900">
                                                        {{ $event['title'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="flex items-center">
                                                @if (ucfirst($event['type']) == 'Sakit')
                                                    <div class="bg-yellow-400 text-white p-2 text-center text-base font-semibold rounded-lg">Sakit</div>
                                                @elseif (ucfirst($event['type']) == 'Izin')
                                                    <div class="bg-orange-400 text-white text-center text-base font-semibold p-2 px-4 rounded-lg">Izin</div>
                                                @elseif (ucfirst($event['type']) == 'Hadir')
                                                    <div class="bg-green-400 text-white text-center text-base font-semibold p-2 rounded-lg">Hadir</div>
                                                @elseif (ucfirst($event['type']) == 'Tidak Hadir')
                                                    <div class="bg-red-600 text-white text-center text-base font-semibold p-2 px-3.5 rounded-lg">Alfa</div>
                                                @endif
                                                {{-- <div class="{{ presentColorClass($event['type'])['color'] }} text-lg">
                                                    {{ ucfirst($event['type']) }}
                                                </div> --}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-lg leading-5 text-gray-500">
                                                {{ $event['updated_at'] }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @empty($event)
                <div class="px-6 py-4 whitespace-nowrap">
                    <div class="font-semibold mb-5 text-2xl text-center text-gray-500">-- Tidak ada Presensi --</div>
                </div>
            @endempty
            <div id="no-event-data" class="hidden px-6 py-4 whitespace-nowrap">
                <div class="font-semibold mb-5 text-2xl text-center text-gray-500">-- Tidak ada Presensi --</div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {

            var searchInput = document.getElementById("table-search");
            searchInput.addEventListener("input", searchTable);

            function searchTable() {
                var input = searchInput.value.toLowerCase();
                var table = document.getElementById("present-table");
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
                //delete style hidden
                noEventDataDiv.style.display = "none";
                } else {
                    noEventDataDiv.style.display = "block";
                }
            }

            // Make the table header sticky
            var tableContainer = document.querySelector(".table-container");
            tableContainer.addEventListener("scroll", function() {
                var tableHeader = document.querySelector("present-table thead");
                tableHeader.style.transform = "translateY(" + tableContainer.scrollTop + "px)";
            });
        });
        </script> 
    </div>
@endsection

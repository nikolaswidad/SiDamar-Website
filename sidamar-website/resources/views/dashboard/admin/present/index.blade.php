@extends('dashboard.layouts.main')

@section('container')
    <div class="max-w-5xl font-montserrat">
        <h1 class="font-bold mb-5 text-4xl">Presensi</h1>
        <hr class="bg-slate-200 mt-5 max-w-lg">

    <div class="relative overflow-x-auto sm:rounded-lg mt-8">
        <div class="flex items-center justify-between">
            <label for="table-search" class="sr-only">Search</label>
            <div>
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" id="table-search" class="mb-5 block p-3 pl-10 text-md text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Event...">
                </div>
              </div>
        </div>

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-min">No</th>
                    <th scope="col" class="text-base font-bold text-gray-900 px-6 py-4 text-left w-1/12">
                        Acara
                    </th>
                    <th scope="col" class="text-base font-bold text-gray-900 py-4 text-left">
                        Kategori
                    </th>
                    <th scope="col" class="text-base font-bold text-gray-900 px-4 py-4 text-left w-fit">
                        Hadir
                    </th>
                    <th scope="col" class="text-base font-bold text-gray-900 px-4 py-4 text-left">
                        Izin
                    </th>
                    <th scope="col" class="text-base font-bold text-gray-900 px-4 py-4 text-left">
                        Sakit
                    </th>
                    <th scope="col" class="text-base font-bold text-gray-900 px-4 py-4 text-left">
                        Tidak Hadir
                    </th>
                    <th scope="col" class="text-base font-bold text-gray-900 px-6 py-4 text-left">
                        Date
                    </th>
                    <th scope="col" class="text-base font-bold text-gray-900 px-6 py-4 text-left w-1/12">
                        Lokasi
                    </th>
                    <th scope="col" class="text-base font-bold text-gray-900 py-4 text-left">
                        Action
                    </th>

                </tr>
            </thead>
            <tbody id="presensi-table">
                @foreach ($events as $event)
                <tr class="border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    @php
                        $hadir = 0;
                        $izin = 0;
                        $sakit = 0;
                        $alpa = 0;

                        foreach ($presents as $p) {
                            if ($p->type == 'hadir' && $p->event_id == $event->id) $hadir++;
                            if ($p->type == 'izin' && $p->event_id == $event->id) $izin++;
                            if ($p->type == 'sakit' && $p->event_id == $event->id) $sakit++;
                        }
                        $alpa = $users->count() - ($hadir + $izin + $sakit);
                    @endphp
                    <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
                    <th scope="row" class="text-base text-gray-900 px-6 py-4 text-left font-semibold">
                        {{-- <a href="{{ route('presents.edit', $event->id) }}" class="hover:text-primary">
                            {{ $event->title }}
                        </a> --}}
                        <a href="/dashboard/present/{{ $event->id }}" class="hover:text-primary">
                            {{ $event->title }}
                        </a>
                    </th>
                    <td class="text-base text-gray-900 py-4 text-left">
                        {{ $event->category }}
                    </td>
                    <td class="text-base text-gray-900 px-6 py-4 text-center font-semibold">
                        {{ $hadir }}
                    </td>
                    <td class="text-base text-gray-900 px-6 py-4 text-center font-semibold">
                        {{ $izin }}
                    </td>
                    <td class="text-base text-gray-900 px-6 py-4 text-center font-semibold">
                        {{ $sakit }}
                    </td>
                    <td class="text-base text-gray-900 px-6 py-4 text-center font-semibold">
                        {{ $alpa }}
                    </td>             
                    <td class="text-base text-gray-900 py-4 text-left">
                        {{-- {{ \Carbon\Carbon::parse($event->date)->format('d-m-Y') }} --}}
                        {{ \Carbon\Carbon::parse($event->date)->isoFormat('D MMM YYYY') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $event->location }}
                    </td>
                    <td class="py-4">
                        <a href="/dashboard/present/{{ $event->id }}" class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 text-sm font-semibold rounded-lg">
                            Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @empty($event)
       <div class="px-6 py-8 whitespace-nowrap">
           <div class="font-semibold mb-5 text-2xl text-center text-gray-500">- Tidak Ada Presensi -</div>
       </div>
    @endempty
    <div id="no-event-data" class="hidden px-6 py-4 whitespace-nowrap">
        <div class="font-semibold mb-5 text-2xl text-center text-gray-500">Presensi tidak ditemukan</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

        var searchInput = document.getElementById("table-search");
        searchInput.addEventListener("input", searchTable);

        function searchTable() {
            var input = searchInput.value.toLowerCase();
            var table = document.getElementById("presensi-table");
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
            var tableHeader = document.querySelector("presensi-table thead");
            tableHeader.style.transform = "translateY(" + tableContainer.scrollTop + "px)";
        });
    });
    </script> 
    <div class="mb-20"></div>
    </div>

    
@endsection
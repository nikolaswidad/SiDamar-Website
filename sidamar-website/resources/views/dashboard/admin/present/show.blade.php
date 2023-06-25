@extends('dashboard.layouts.main')

@section('container')
    <div class="max-w-5xl font-montserrat">
        <h1 class="font-bold mb-5 text-4xl">{{ $event->category }} : {{ $event->title }}</h1>
        <hr class="bg-slate-200 mt-5 mb-5 max-w-lg"> 
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
            $total = $users->count();
            $alpa = $total - ($hadir + $izin + $sakit);
        @endphp

        {{-- <p>Hadir: {{ $hadir }}</p>
        <p>Izin: {{ $izin }}</p>
        <p>Sakit: {{ $sakit }}</p>
        <p>Tidak Hadir: {{ $alpa }}</p>
        <p>Total: {{ $users->count() }}</p> --}}

    <div class="card-group grid  grid-cols-2 lg:grid-cols-5">
        <div class="w-44 h-24 mb-4 mr-4">
            <div class="bg-white border-l-4 border-green-500 shadow h-full">
                <div class="p-4">
                    <div class="flex items-center">
                        <div class="mr-2">
                            <div class="text-lg font-bold text-green-500 uppercase mb-1">
                                Hadir
                            </div>
                            <div class="text-lg font-bold text-gray-800">{{ $hadir }}</div>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-44 h-24 mb-4 mr-4">
            <div class="bg-white border-l-4 border-blue-500 shadow h-full">
                <div class="p-4">
                    <div class="flex items-center">
                        <div class="mr-2">
                            <div class="text-lg font-bold text-blue-500 uppercase mb-1">
                                sakit
                            </div>
                            <div class="text-lg font-bold text-gray-800">{{ $sakit }}</div>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-44 h-24 mb-4 mr-4">
            <div class="bg-white border-l-4 border-blue-500 shadow h-full">
                <div class="p-4">
                    <div class="flex items-center">
                        <div class="mr-2">
                            <div class="text-lg font-bold text-blue-500 uppercase mb-1">
                                izin
                            </div>
                            <div class="text-lg font-bold text-gray-800">{{ $izin }}</div>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-44 h-24 mb-4 mr-4">
            <div class="bg-white border-l-4 border-red-500 shadow h-full">
                <div class="p-4">
                    <div class="flex items-center">
                        <div class="mr-2">
                            <div class="text-lg font-bold text-red-500 uppercase mb-1">
                                Tidak Hadir
                            </div>
                            <div class="text-lg font-bold text-gray-800">{{ $alpa }}</div>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-44 h-24 mb-4 mr-4">
            <div class="bg-white border-l-4 border-slate-500 shadow h-full">
                <div class="p-4">
                    <div class="flex items-center">
                        <div class="mr-2">
                            <div class="text-lg font-bold text-slate-500 uppercase mb-1">
                                Total
                            </div>
                            <div class="text-lg font-bold text-gray-800">{{ $total }}</div>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative mt-5 mb-4">
        <label for="table-search" class="sr-only">Search</label>
        <input type="text" id="table-search" class="block w-full p-3 pl-10 text-md text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Pengguna...">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
            </svg>
        </div>
    </div>

    <div class="relative overflow-x-auto" id="events-table">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="text-lg text-gray-900 px-6 py-4">
                        Nama
                    </th>
                    <th scope="col" class="text-lg text-gray-900 px-6 py-4">
                        Status
                    </th>
                    <th scope="col" class="text-lg text-gray-900 px-6 py-4 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody id="present-table">
                @foreach ($users as $user)
                <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-lg font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->name }}
                    </th>
                    @php
                    $colorDefault = 'bg-white border border-gray-300 focus:outline-none focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700';

                    $colorHadir = 'text-white bg-green-500 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800';
                    $hoverHadir = 'hover:bg-green-600 hover:text-white focus:ring-green-200';

                    $colorSakit = 'text-white bg-blue-500  focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800';
                    $hoverSakit = 'hover:text-white hover:bg-blue-800 focus:blue-300 focus:ring-blue-300';

                    // $colorIzin = 'text-white bg-yellow-300 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900';
                    // $hoverIzin = 'hover:text-white hover:bg-yellow-300 focus:ring-yellow-300';
                    $colorIzin = 'text-white bg-blue-500 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-blue-500 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900';
                    $hoverIzin = 'hover:text-white hover:bg-blue-500 focus:ring-blue-500';

                    $colorNo = 'text-white bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900';
                    $hoverNo = 'hover:text-white hover:bg-red-700 focus:ring-red-300';

                    $fillHadir = 'stroke-green-500';
                    // $fillIzin = 'stroke-yellow-300';
                    $fillIzin = 'stroke-blue-500';
                    $fillSakit = 'stroke-blue-500';
                    $fillNo = 'stroke-red-500';

                    $fillColor = '';
                            
                    @endphp

                    <td class="px-8 py-4">
                        @if ($presents->isEmpty())
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 22 22" id="x"><g fill="none" fill-rule="evenodd" stroke="#ef4444" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" transform="translate(1 1)"><circle cx="10" cy="10" r="10"></circle><path d="M13 7l-6 6M7 7l6 6"></path></g></svg>
                        @else
                        @php
                            $foundType = false;
                            $type = '';


                            foreach ($presents as $present) {
                                if ($present->user_id == $user->id) {
                                    $type = $present->type;
                                    $foundType = true;
                                    break;
                                }
                            }

                            if (!$foundType) {
                                $type = 'tidak_hadir'; // Set the default type when user not found in presents
                            }

                            // Determine the color class based on the type
                            if ($type == 'tidak hadir') {
                                $colorClass = $colorNo;
                                $fillColor = $fillNo;
                            } else {
                                if ($type == 'hadir') {
                                    $colorClass = $colorHadir;
                                    $fillColor = $fillHadir;
                                } elseif ($type == 'izin') {
                                    $colorClass = $colorIzin;
                                    $fillColor = $fillIzin;
                                } elseif ($type == 'sakit') {
                                    $colorClass = $colorSakit;
                                    $fillColor = $fillSakit;
                                }
                            }

                            $svgCheck = '<div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#16a34a" fill="" class="w-7 h-7 ' . $fillColor . '">
                                            <path  stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg></div>';
                            $svgX = '<div><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 22 22" id="x"><g fill="none" fill-rule="evenodd" stroke="#ef4444" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" transform="translate(1 1)"><circle cx="10" cy="10" r="10"></circle><path d="M13 7l-6 6M7 7l6 6"></path></g></svg></div>';

                            if ($type == 'tidak_hadir') {
                                $svgIcon = $svgX;
                            } else {
                                $svgIcon = $svgCheck;
                            }
                        @endphp

                        <div class="flex flex-row">
                            {{-- <span class="{{ $colorClass }}">
                                {{ \Illuminate\Support\Str::title(\Illuminate\Support\Str::of($type)->replace('_', ' ')) }}
                            </span> --}}
                            {!! $svgIcon !!}
                            {{-- <div>
                                {!! $svgCheck !!}
                            </div> --}}
                        </div>
                        @endif
                        @foreach ($presents as $present)
                            @if ($present->user_id == $user->id)
                                {{-- @php
                                $type = $present->type;
                                    if ($type == 'hadir') {
                                        $fillColor = $fillHadir;
                                    } elseif ($type == 'izin') {
                                        $fillColor = $fillIzin;
                                    } elseif ($type == 'sakit') {
                                        $fillColor = $fillSakit;
                                    }   
                                @endphp  --}}
                                {{-- <svg   xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#16a34a" fill="" class="w-6 h-6 {{ $fillColor }}">
                                    <path  stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>       --}}
                                {{-- {{ \Illuminate\Support\Str::title(\Illuminate\Support\Str::of($present->type)->replace('_', ' ')) }} --}}
                                    
                             @endif
                        @endforeach
                    </td>

                    <td class="px-6 py-4 flex justify-center gap-2">
                        <form action="/dashboard/present/{{ $event->id }}?u={{ $user->id }}&t=hadir" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white p-2 px-4 text-sm font-semibold rounded-lg">Hadir</button>
                        </form>
                        <form action="/dashboard/present/{{ $event->id }}?u={{ $user->id }}&t=sakit" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="bg-orange-400 hover:bg-orange-700 text-white p-2 px-4 text-sm font-semibold rounded-lg"">Sakit</button>
                        </form>
                        <form action="/dashboard/present/{{ $event->id }}?u={{ $user->id }}&t=izin" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 px-4 text-sm font-semibold rounded-lg">Izin</button>
                        </form>
                        <form action="/dashboard/present/delete/{{ $event->id }}/{{ $user->id }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="{{ $fillNo }}{{ $hoverNo }}{{ $colorDefault }}">
                                <div class="group-hover:text-white">
                                    <svg class="w-3.5 h-3.5 text-gray-900 hover:text-white transition duration-75 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd" d="M15.312 11.424a5.5 5.5 0 01-9.201 2.466l-.312-.311h2.433a.75.75 0 000-1.5H3.989a.75.75 0 00-.75.75v4.242a.75.75 0 001.5 0v-2.43l.31.31a7 7 0 0011.712-3.138.75.75 0 00-1.449-.39zm1.23-3.723a.75.75 0 00.219-.53V2.929a.75.75 0 00-1.5 0V5.36l-.31-.31A7 7 0 003.239 8.188a.75.75 0 101.448.389A5.5 5.5 0 0113.89 6.11l.311.31h-2.432a.75.75 0 000 1.5h4.243a.75.75 0 00.53-.219z"></path>
                                      </svg>
                                </div>
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        <div id="no-event-data" class="hidden px-6 py-4 whitespace-nowrap">
            <div class="font-semibold mb-5 text-2xl text-center text-gray-500">-- Pengguna tidak ditemukan --</div>
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
    <div class="mb-20"></div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    </div>
@endsection
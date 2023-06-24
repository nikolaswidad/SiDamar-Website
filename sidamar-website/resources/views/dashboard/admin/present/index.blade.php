@extends('dashboard.layouts.main')

@section('container')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex items-center justify-between pb-4">
            <div>
                <h1 class="text-lg font-semibold text-gray-700 p-4">List Presensi</h1>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Cari apa saja">
            </div>
        </div>
        <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Acara
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hadir
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Izin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sakit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tidak Hadir
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Location
                    </th>        
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
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

                        $colorDefault = 'bg-white border border-gray-300 focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 ';

                        $colorGreen = 'text-white bg-green-500 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800';
                        $hoverGreen = 'hover:bg-green-600 hover:text-white focus:ring-green-200';

                        $colorBlue = 'text-white bg-blue-500  focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800';
                        $hoverBlue = 'hover:text-white hover:bg-blue-800 focus:blue-300 focus:ring-blue-300';

                    @endphp
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{-- <a href="{{ route('presents.edit', $event->id) }}" class="hover:text-primary">
                            {{ $event->title }}
                        </a> --}}

                        {{-- bisa --}}
                        <a href="/dashboard/present/{{ $event->id }}" class="{{ $colorDefault }}{{ $hoverBlue }}">
                            {{ $event->title }}
                        </a>
                    </th>
                    <td class="px-6 py-4">
                        {{ $event->categories->category }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $hadir }}
                    </td>  
                    <td class="px-6 py-4">
                        {{ $izin }}
                    </td>  
                    <td class="px-6 py-4">
                        {{ $sakit }}
                    </td>  
                    <td class="px-6 py-4">
                        {{ $alpa }}
                    </td>  
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($event->date)->isoFormat('D MMM YYYY') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $event->location }}
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script>
        // Get the input element
        const searchInput = document.getElementById('table-search');
    
        // Add event listener for input change
        searchInput.addEventListener('input', function() {
            const filter = searchInput.value.toLowerCase();
            const tableRows = document.querySelectorAll('tbody tr');
    
            tableRows.forEach(function(row) {
                const title = row.querySelector('th').textContent.toLowerCase();
    
                if (title.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>

    
@endsection
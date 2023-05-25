@extends('dashboard.layouts.main')

@section('container')
    <h1>Presensi:</h1>

    <h1 class="text-slate-500 font-semibold">{{ $event->title }}</h1>

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

    <p>Hadir: {{ $hadir }}</p>
    <p>Izin: {{ $izin }}</p>
    <p>Sakit: {{ $sakit }}</p>
    <p>Tidak Hadir: {{ $alpa }}</p>

    <div class="relative mb-4">
        <label for="table-search" class="sr-only">Search</label>
        <input type="text" id="table-search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for name">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
            </svg>
        </div>
    </div>

    <div class="relative overflow-x-auto" id="events-table">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keterangan
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->name }}
                    </th>
                    <td class="px-10 py-4">
                        @foreach ($presents as $present)
                            @if ($present->user_id == $user->id)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#16a34a" fill="" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>      
                                {{-- {{ \Illuminate\Support\Str::title(\Illuminate\Support\Str::of($present->type)->replace('_', ' ')) }} --}}
                                    
                             @endif
                        @endforeach
                    </td>
                    <td class="px-6 py-4">
                        @php
                            $colorDefault = 'text-gray-900 bg-white border border-gray-300 focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700';

                            $colorGreen = 'text-white bg-green-500 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800';

                            $colorBlue = 'text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800';

                            $colorYellow = 'text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900';

                            $colorRed = 'text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900';
                        @endphp
                        @if ($presents->isEmpty())
                        <span class="{{ $colorDefault }}">Default Value</span>
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
                            if ($type == 'hadir') {
                                $colorClass = $colorGreen;
                            } elseif ($type == 'izin') {
                                $colorClass = $colorBlue;
                            } elseif ($type == 'sakit') {
                                $colorClass = $colorYellow;
                            } else {
                                $colorClass = $colorRed;
                            }
                        @endphp

                        <span class="{{ $colorClass }}">
                            {{ \Illuminate\Support\Str::title(\Illuminate\Support\Str::of($type)->replace('_', ' ')) }}
                        </span>
                        @endif
                    
                        <!-- Rest of the form elements -->
                    </td>
                    <td class="px-6 py-4">
                        <form action="/dashboard/present/{{ $event->id }}?u={{ $user->id }}&t=hadir" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="{{ $colorDefault }} hover:bg-green-600 hover:text-white focus:ring-green-200">Hadir</button>
                        </form>
                        <form action="/dashboard/present/{{ $event->id }}?u={{ $user->id }}&t=izin" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Izin</button>
                        </form>
                        <form action="/dashboard/present/{{ $event->id }}?u={{ $user->id }}&t=sakit" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Sakit</button>
                        </form>
                        <form action="/dashboard/present/delete/{{ $event->id }}/{{ $user->id }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Reset</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mb-96"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('#table-search');
            const rows = document.querySelectorAll('tbody tr');

            searchInput.addEventListener('input', function(event) {
                const searchValue = event.target.value.toLowerCase();

                rows.forEach(row => {
                    const name = row.querySelector('th').textContent.toLowerCase();

                    if (name.includes(searchValue)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
@extends('dashboard.layouts.main')

@section('container')
    <h1>Presensi : </h1>

    <h1 class="text-slate-500 font-semibold">{{ $event->title }}</h1>
    </a>

    <?php
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
    ?>



    <p>Hadir : {{ $hadir }}</p>
    <p>izin : {{ $izin }}</p>
    <p>sakit : {{ $sakit }}</p>
    <p>Tidak Hadir : {{ $alpa }}</p>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-white border-b dark:bg-gray-700 dark:text-gray-400">
        <tr>
        <th scope="col" class="px-6 py-3">No</th>
        <th scope="col" class="px-6 py-3">Nama</th>
        <th scope="col" class="px-6 py-3">Kehadiran</th>
        <th scope="col" class="px-6 py-3">Tipe</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                <td class="px-6 py-4">{{ $user->name }}</td>
                <td class="px-6 py-4">
                    @foreach ($presents as $present)
                        @if ($present->user_id == $user->id)
                            {{-- {{ $present->type }} --}}
                            {{ \Illuminate\Support\Str::title(\Illuminate\Support\Str::of($present->type)->replace('_', ' ')) }}
                        @endif
                    @endforeach
                </td>
                <td class="px-6 py-4">
                    <form action="/dashboard/present/{{ $event->id }}?u={{ $user->id }}&t=hadir" method="POST">
                        @csrf
                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 ">Hadir</button>
                    </form>
                    <form action="/dashboard/present/{{ $event->id }}?u={{ $user->id }}&t=izin" method="POST">
                        @csrf
                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 ">Izin</button>
                    </form>
                    <form action="/dashboard/present/{{ $event->id }}?u={{ $user->id }}&t=sakit" method="POST">
                        @csrf
                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 ">Sakit</button>
                    </form>
                    <form action="/dashboard/present/delete/{{ $event->id }}/{{ $user->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline ">Reset</button>
                    </form>
                </td>
            </tr>
        @endforeach           
    </tbody>
    </table> 
    
    <div class="mb-96"></div>
@endsection
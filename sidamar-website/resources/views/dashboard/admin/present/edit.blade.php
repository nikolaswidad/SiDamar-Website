@extends('dashboard.layouts.main')

@section('container')

    <h1>Presensi {{ $event->title }}</h1>


    </a>
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
                <td class="px-6 py-4">{{ $user->name }}</td>
                <td class="px-6 py-4">
                    <form action="" method="POST">
                    @csrf
                    @method('delete')

                    <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 ">Hadir</button>
                    <button type="button" class="text-white bg-gradient-to-r from-blue-100 via-blue-100 to-blue-100 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 ">Ijin</button>
                    <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 ">Sakit</button>
                    <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline ">Reset</button>
                    </form>
                </td>
                {{-- <td class="px-6 py-4">
                    <form action="{{ route('posts.destroy', $present->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route('posts.edit', $present->id) }}"><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 ">Edit</button></a>
                    <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline ">Delete</button>
                    </form>
                </td> --}}
            </tr>
        @endforeach           
    </tbody>
    </table> 
    {{-- {{ $eventss->links() }} --}}
    
    <div class="mb-96"></div>
@endsection
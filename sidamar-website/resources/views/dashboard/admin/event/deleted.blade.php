@extends('dashboard.layouts.main')

@section('container')
   <h1 class="font-bold mb-5 text-4xl">Event Deleted</h1>

   @if (Session::has('success'))
      <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">{{ Session('success') }}</span>
      </div>
    @endif

   </a>
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
         <thead class="text-xs text-gray-700 uppercase bg-white border-b dark:bg-gray-700 dark:text-gray-400">
           <tr>
            <th scope="col" class="px-6 py-3">No</th>
            <th scope="col" class="px-6 py-3">Judul</th>
            <th scope="col" class="px-6 py-3">Kategori</th>
            <th scope="col" class="px-6 py-3">Deskripsi</th>
            <th scope="col" class="px-6 py-3">Tanggal</th>
            <th scope="col" class="px-6 py-3">Waktu</th>
            <th scope="col" class="px-6 py-3">Tanggal Pemberitahuan</th>
            <th scope="col" class="px-6 py-3">Lokasi</th>
            <th scope="col" class="px-6 py-3">Google Maps</th>
            <th scope="col" class="px-6 py-3">Action</th>
           </tr>
         </thead>
         
         <tbody>
        @foreach ($events as $event)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4">{{ $loop->iteration }}</td>
            <td class="px-6 py-4">{{ $event->title }}</td>
            <td class="px-6 py-4">{{ $event->category->name }}</td>
            <td class="px-6 py-4">{{ $event->description }}</td>
            <td class="px-6 py-4">{{ $event->date }}</td>
            <td class="px-6 py-4">{{ $event->time }}</td>
            <td class="px-6 py-4">{{ $event->date_notification }}</td>
            <td class="px-6 py-4">{{ $event->location }}</td>
            <td class="px-6 py-4 text-primary hover:text-primaryDarken"><a href="{{ $event->url }}" target="_blank">{{ $event->url }}</a></td>
            {{-- <td class="px-6 py-4">
              <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                @csrf
                @method('delete')
                <a href="{{ route('events.edit', $event->id) }}"><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 ">Edit</button></a>
                <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline ">Delete</button>
              </form>
            </td> --}}
            <td class="px-6 py-4">
              <form action="{{ route('events.kill', $event->id) }}" method="POST">
                @csrf
                @method('delete')
                <a href="{{ route('events.restore', $event->id) }}"><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 ">Restore</button></a>
                <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline"onclick="return confirm('Hapus permanen?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach           
         </tbody>
       </table> 
       {{-- {{ $eventss->links() }} --}}
       
   <div class="mb-96"></div>
@endsection
@extends('dashboard.layouts.main')

@section('container')
    <div class="max-w-5xl font-montserrat">
      <h1 class="text-4xl font-semibold font-montserrat">Event Terhapus</h1>
      <hr class="bg-slate-200 mt-5 max-w-3xl">
      
      @if (Session::has('success'))
        <div class="max-w-full font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
          <span class="font-medium">{{ Session('success') }}</span>
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
     </a>
        <table class="w-full mt-8 text-sm text-left text-gray-500 dark:text-gray-400">
           <thead class="text-xs text-gray-700 border-b dark:bg-gray-700 dark:text-gray-400">
             <tr>
              <th scope="col" class="text-base text-gray-900 px-6 py-4">No</th>
              <th scope="col" class="text-base text-gray-900 px-6 py-4">Event</th>
              <th scope="col" class="text-base text-gray-900 px-6 py-4">Kategori</th>
              <th scope="col" class="text-base text-gray-900 px-6 py-4">Tanggal</th>
              <th scope="col" class="text-base text-gray-900 px-6 py-4">Waktu</th>
              <th scope="col" class="text-base text-gray-900 px-6 py-4">Google Maps</th>
              <th scope="col" class="text-base text-gray-900 px-6 py-4">Action</th>
             </tr>
           </thead>
           
           <tbody id="delete-table">
          @foreach ($events as $event)
            <tr class="border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
              <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $event->title }}</td>
              <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $event->category }}</td>
              <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $event->date }}</td>
              <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $event->time }}</td>
              <td class="px-6 py-4 text-primary hover:text-primaryDarken">
                {{-- <a href="{{ $film->link_film }}" class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 text-sm font-semibold rounded-lg">Link</a> --}}
                <a href="{{ $event->url }}" class="bg-yellow-400 hover:bg-yellow-600 text-white p-2 px-4 text-sm font-semibold rounded-lg" target="_blank">Link</a></td>
              {{-- <td class="px-6 py-4">
                <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                  @csrf
                  @method('delete')
                  <a href="{{ route('events.edit', $event->id) }}"><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 ">Edit</button></a>
                  <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline ">Delete</button>
                </form>
              </td> --}}
              <td class="px-6 py-4">
                <form action="{{ route('events.kill', $event->id) }}" method="POST" class="inline-block">
                  @csrf
                  @method('delete')
                  <a href="{{ route('events.restore', $event->id) }}"><button type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-semibold rounded-lg text-sm px-4 py-2 text-center mr-1 ">Pulihkan</button></a>
                  <button type="submit" class="bg-primary hover:bg-red-700 text-white text-sm font-semibold p-2 rounded-lg"onclick="return confirm('Hapus Event Permanen?')">Hapus</button>
                </form>
              </td>
            </tr>
          @endforeach           
           </tbody>
         </table> 
         {{-- {{ $eventss->links() }} --}}
        @empty($event)
        <div class="px-6 py-4 whitespace-nowrap">
            <div class="font-semibold mt-5 text-2xl text-center text-gray-500">-- Tidak ada event terhapus--</div>
        </div>
        @endempty
        <div id="no-event-data" class="hidden px-6 py-4 whitespace-nowrap">
          <div class="font-semibold text-2xl text-center text-gray-500">Event tidak ditemukan</div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {

            var searchInput = document.getElementById("table-search");
            searchInput.addEventListener("input", searchTable);

            function searchTable() {
                var input = searchInput.value.toLowerCase();
                var table = document.getElementById("delete-table");
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
                var tableHeader = document.querySelector("delete-table thead");
                tableHeader.style.transform = "translateY(" + tableContainer.scrollTop + "px)";
            });
        });
        </script> 
     <div class="mb-20"></div>

    </div>
@endsection
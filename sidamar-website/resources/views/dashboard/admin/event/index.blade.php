
@extends('dashboard.layouts.main')

@section('container')
   <h1 class="font-bold mb-5 text-4xl">List Acara</h1>

   @if (Session::has('success'))
      <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">{{ Session('success') }}</span>
      </div>
    @endif

   {{-- <a href="{{ route('events.create') }}"><button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-4">+ Tambah Event</button></a>
   <a href="/dashboard/events/deleted"><button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 float-right mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash inline" viewBox="0 0 16 16">
    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
    </svg> Trash</button>
   </a>
    <div>
      <label for="table-search" class="sr-only">Search</label>
      <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
          </div>
          <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for event">
      </div>
    </div>

        <table id="events-table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                      <div class="flex items-center">
                        Event
                      </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                      <div class="flex items-center">
                          Category
                      </div>
                  </th>
                  
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Waktu
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Tanggal
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Lokasi
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    @foreach ($events as $event)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('events.show', $event->id) }}" class="hover:text-primary">
                                {{ $event->title }}</td>
                              </a>                        
                        </th>
                        <td class="px-6 py-4">{{ $event->categories->category }}</td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ $event->url }}" target="_blank" class="text-primary hover:text-primaryLighten">
                            {{ $event->location }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                          <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('events.edit', $event->id) }}"><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 ">Edit</button></a>
                            <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline ">Delete</button>
                          </form>
                        </td>     
                    </tr>
                  @endforeach     
                </tr>
         </tbody>
       </table> 

       <div class="mb-4 justify-center">
      </div>

      

   <div class="mb-20"></div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {

        var searchInput = document.getElementById("table-search");
        searchInput.addEventListener("input", searchTable);

        function searchTable() {
            var input = searchInput.value.toLowerCase();
            var table = document.getElementById("events-table");
            var rows = table.getElementsByTagName("tr");

            for (var i = 0; i < rows.length; i++) {
                var rowData = rows[i].textContent.toLowerCase();

                if (rowData.includes(input)) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }

        // Make the table header sticky
        var tableContainer = document.querySelector(".table-container");
        tableContainer.addEventListener("scroll", function() {
            var tableHeader = document.querySelector("#events-table thead");
            tableHeader.style.transform = "translateY(" + tableContainer.scrollTop + "px)";
        });

    });


        
    </script> --}}

    {{-- new table  --}}
    

    <a href="{{ route('events.create') }}"><button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-4">+ Tambah Event</button></a>
    <a href="/dashboard/events/deleted"><button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 float-right mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash inline" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
        </svg> Trash</button>
    </a>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex items-center justify-between pb-4">
            <div>
                <h1 class="text-lg font-semibold text-gray-700 p-4">List Event</h1>
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
                        Waktu
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lokasi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('events.show', $event->id) }}" class="hover:text-primary">
                                {{ $event->title }}
                            </a>                        
                        </td>
                        <td class="px-6 py-4">{{ $event->categories->category }}</td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ $event->url }}" target="_blank" class="text-primary hover:text-primaryLighten">
                            {{ $event->location }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('events.edit', $event->id) }}"><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 ">Edit</button></a>
                            <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline ">Delete</button>
                        </form>
                        </td>     
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    

    {{-- <script>
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
    </script> --}}


 <script>
    // Function to perform the search
    function searchTable() {
      var input = document.getElementById('table-search');
      var filter = input.value.toLowerCase();
      var table = document.getElementsByTagName('table')[0];
      var rows = table.getElementsByTagName('tr');
      
  
      // Iterate through each row of the table
      for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var cells = row.getElementsByTagName('td');
        var matchFound = false;
  
        // Iterate through each cell of the row
        for (var j = 0; j < cells.length; j++) {
          var cell = cells[j];
  
          // Check if the cell content matches the search query
          if (cell.textContent.toLowerCase().indexOf(filter) > -1) {
            matchFound = true;
            break;
          }
        }
  
        // Show or hide the row based on the match
        if (matchFound) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      }
    }
  
    // Get the search input element
    var searchInput = document.getElementById('table-search');
  
    // Add event listener for input event
    searchInput.addEventListener('input', searchTable);
  </script>

    
    
      
      
@endsection
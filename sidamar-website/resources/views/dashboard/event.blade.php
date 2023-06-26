
@extends('dashboard.layouts.main')

@section('container')
   <h1 class="font-bold mb-5 text-4xl">List Acara</h1>

   @if (Session::has('success'))
      <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">{{ Session('success') }}</span>
      </div>
    @endif

    {{-- new table  --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex items-center justify-between pb-4">
            <div>
                <h1 class="text-lg font-semibold text-gray-700 p-4">List Acara</h1>
            </div>
    
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Cari">
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
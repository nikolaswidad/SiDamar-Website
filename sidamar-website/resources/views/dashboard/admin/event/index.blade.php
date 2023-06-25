@extends('dashboard.layouts.main')

@section('container')
  <div class="max-w-5xl font-montserrat">
    <h1 class="font-bold mb-5 text-4xl">Event</h1>
    <hr class="bg-slate-200 mt-5 max-w-lg">
 
    @if (Session::has('success'))
      <div class="max-w-full font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
        <span class="font-medium">{{ Session('success') }}</span>
      </div>
     @endif
 
    <a href="{{ route('events.create') }}"><button type="button" class="mt-8 p-3 bg-primary rounded-lg text-white font-semibold hover:bg-red-600 mb-5">+ Tambah Event</button></a>

    <a href="/dashboard/events/deleted"><button type="button" class="mt-8 p-3 hover:bg-red-600 bg-primary text-white font-semibold rounded-lg px-5 py-3 text-center mr-2 float-right mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash inline" viewBox="0 0 16 16">
     <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
     <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
     </svg> Tempat Sampah</button>
    </a>
     <div>
       <label for="table-search" class="sr-only">Search</label>
       <div class="relative">
           <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
               <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
           </div>
           <input type="text" id="table-search" class="mb-5 block p-3 pl-10 text-md text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Event...">
       </div>
     </div>
 
         <table id="events-table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
             <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                 {{-- <tr>
                     <th scope="col" class="px-6 py-3">
                       <div class="flex items-center">
                         Event
                         <a href="#" onclick="sortTable('event')"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                       </div>
                   </th>
                     <th scope="col" class="px-6 py-3">
                       <div class="flex items-center">
                     Category
                           <a href="#" onclick="sortTable('category')"> <!-- Add onclick event and pass the column name -->
                               <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                   <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/>
                               </svg>
                           </a>
                       </div>
                   </th>
                   
                     <th scope="col" class="px-6 py-3">
                         <div class="flex items-center">
                             Waktu
                             <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                         </div>
                   </th>
                     <th scope="col" class="px-6 py-3">
                         <div class="flex items-center">
                             Tanggal
                             <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                         </div>
                   </th>
                     <th scope="col" class="px-6 py-3">
                         <div class="flex items-center">
                             Lokasi
                             <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                         </div>
                   </th>
                 </tr> --}}
                 <tr>
                    <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No</th>
                    <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Event</th>
                    <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Kategori</th>
                    <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Waktu</th>
                    <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/6">Tanggal</th>
                    <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Lokasi</th>
                    <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/6">Action</th>
              </tr>
               </thead>
               <tbody>
                 <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                @foreach ($events as $event)                
                     <tr class="border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                         <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
                         <th scope="row" class="px-6 py-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                             <a href="{{ route('events.show', $event->id) }}" class="hover:text-primary">
                                 {{ $event->title }}</td>
                               </a>                        
                         </th>
                         <td class="px-6 py-4 text-base font-medium">{{ $event->category }}</td>
                         <td class="px-6 py-4 text-base font-medium">
                             {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}
                   </td>
                         <td class="px-6 py-4 text-base font-medium">
                             {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                   </td>
                         <td class="px-6 py-4 text-base font-medium">
                             <a href="{{ $event->url }}" target="_blank" class="text-primary hover:text-primaryLighten">
                     {{ $event->location }}
                      </a>
                   </td>
                         <td class="px-6 py-4 text-base font-medium">
                           <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block">
                             @csrf
                             @method('delete')
                             <a href="{{ route('events.edit', $event->id) }}"><button type="button" class="bg-orange-400 hover:bg-orange-700 text-white text-sm font-semibold p-2 rounded-lg inline-block">Edit</button></a>
                             <button type="submit" class="bg-primary text-white p-2 rounded-lg text-sm font-semibold inline-block ">Hapus</button>
                           </form>
                         </td>     
                </tr>
                @endforeach
                 </tr>
               </tbody>
             </table>
 
        <div class="mb-4 justify-center">
     </div>
     @empty($event)
       <div class="px-6 py-8 whitespace-nowrap">
           <div class="font-semibold mb-5 text-2xl text-center text-gray-500">- Tidak Ada Event -</div>
       </div>
     @endempty
  
     <div id="no-event-data" class="hidden px-6 py-4 whitespace-nowrap">
         <div class="font-semibold mb-5 text-2xl text-center text-gray-500">Event tidak ditemukan</div>
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
          var noEventDataDiv = document.getElementById("no-event-data");
  
          var hasResults = false;
  
          for (var i = 0; i < rows.length; i++) {
              var rowData = rows[i].textContent.toLowerCase();
  
              if (rowData.includes(input)) {
                  rows[i].style.display = "";
                  hasResults = true;
              } else {
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
          var tableHeader = document.querySelector("#events-table thead");
          tableHeader.style.transform = "translateY(" + tableContainer.scrollTop + "px)";
      });
  
  });
  
  
      
  </script>
  </div>
@endsection
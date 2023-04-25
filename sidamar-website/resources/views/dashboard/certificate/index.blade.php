@extends('dashboard.layouts.main')

@section('container')
   <h1 class="font-bold mb-5 text-4xl">My Certificate</h1>

   @if (Session::has('success'))
      <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">{{ Session('success') }}</span>
      </div>
    @endif

    <div class="container mx-auto">
      <div class="grid grid-cols-2 gap-4">
        <!-- konten bagian kiri -->
          <div class="col-span-1">
            <a href="{{ route('certificate.create') }}"><button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-4">+ Tambah Sertifikat</button></a>
            
               <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-white border-b dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                     <th scope="col" class="px-6 py-3">No</th>
                     <th scope="col" class="px-6 py-3">Event Title</th>
                     <th scope="col" class="px-6 py-3">Name</th>
                     <th scope="col" class="px-6 py-3">Status</th>
                     <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
            @php $no = 1 @endphp
            @foreach ($certif as $cf => $hasil)
                   <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                     <td class="px-6 py-4">{{ $no++ }}</td>
                     <td class="px-6 py-4">{{ $hasil->title }}</td>
                     <td class="px-6 py-4">{{ $hasil->user->name }}</td>
                     @if ($hasil->status == 1)
                      <td class="px-6 py-4"><span class="text-xs font-semibold py-1 px-2 rounded text-orange-600 bg-orange-200 last:mr-0 mr-1">
                      {{ $hasil->cstatus->name }}</span></td> 
                     @else
                     <td class="px-6 py-4"><span class="text-xs font-semibold py-1 px-2 rounded text-lime-600 bg-lime-200 last:mr-0 mr-1">
                      {{ $hasil->cstatus->name }}</span></td> 
                     @endif
                     <td class="px-6 py-4">
                       <form action="{{ route('posts.destroy', $hasil->id) }}" method="POST">
                         @csrf
                         @method('delete')
                         <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline ">Delete</button>
                       </form>
                     </td>
                   </tr>
            @endforeach           
                  </tbody>
                </table> 
          </div>
          <div class="col-span-1 bg-yellow-400">
              <!-- konten bagian kanan -->
              {{-- <embed id="pdf" src="\master\certificate.pdf" frameborder="0" type="application/pdf"> --}}
                <object data="{{ asset('\master\certificate.pdf') }}" type="application/pdf" width="100%" height="600px">
                  <p>File PDF tidak dapat ditampilkan pada browser Anda. Silakan unduh file PDF untuk melihatnya.</p>
                </object>

          </div>
      </div>
  </div>
   {{-- <a href="{{ route('posts.create') }}"><button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-4">+ Tambah Post</button></a>
   <a href="/dashboard/posts/deleted">
   <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 float-right mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash inline" viewBox="0 0 16 16">
    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
  </svg> Trash</button>
   </a>
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
         <thead class="text-xs text-gray-700 uppercase bg-white border-b dark:bg-gray-700 dark:text-gray-400">
           <tr>
            <th scope="col" class="px-6 py-3">No</th>
            <th scope="col" class="px-6 py-3">Event</th>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Status</th>
            <th scope="col" class="px-6 py-3">Action</th>
           </tr>
         </thead>
         
         <tbody>
   @php $no = 1 @endphp
   @foreach ($certif as $cf => $hasil)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4">{{ $no++ }}</td>
            <td class="px-6 py-4">{{ $hasil->title }}</td>
            <td class="px-6 py-4">{{ $hasil->user->name }}</td>
            <td class="px-6 py-4">pending</td>
            <td class="px-6 py-4">
              <form action="{{ route('posts.destroy', $hasil->id) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline ">Delete</button>
                <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline ">Print</button>
              </form>
            </td>
          </tr>
   @endforeach           
         </tbody>
       </table>  --}}
       
@endsection
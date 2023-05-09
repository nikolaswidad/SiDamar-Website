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
                     @if ($hasil->status == 1)
                      <td class="px-6 py-4"><span class="text-xs font-semibold py-1 px-2 rounded text-orange-600 bg-orange-200 last:mr-0 mr-1">
                      {{ $hasil->cstatus->name }}</span></td> 
                     @else
                     <td class="px-6 py-4"><span class="text-xs font-semibold py-1 px-2 rounded text-lime-600 bg-lime-200 last:mr-0 mr-1">
                      {{ $hasil->cstatus->name }}</span></td> 
                     @endif
                     <td class="px-6 py-4">
                       <form action="{{ route('certificate.destroy', $hasil->id) }}" method="POST">
                         @csrf
                         @method('delete')
                         <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline ">Delete</button>
                      </form>
                      <form action="{{ route('buat') }}" method="POST">
                          @csrf
                          <input type="hidden" name="nama" value="{{ $hasil->user->name }}">
                          <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline">Print</button>
                      </form>
                     </td>
                   </tr>
            @endforeach           
                  </tbody>
                </table> 
          </div>
          <div class="col-span-1 py-8">
              <!-- konten bagian kanan -->
              {{-- <embed id="pdf" src="\master\certificate.pdf" frameborder="0" type="application/pdf"> --}}
                <object data="{{ asset('\master\certificate.pdf') }}" type="application/pdf" width="100%" height="600px">
                  <p>File PDF tidak dapat ditampilkan pada browser Anda. Silakan unduh file PDF untuk melihatnya.</p>
                </object>

          </div>
      </div>
  </div>

       
@endsection
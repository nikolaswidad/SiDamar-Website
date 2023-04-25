@extends('dashboard.layouts.main')

@section('container')
   <h1 class="font-bold mb-5 text-4xl">Certificate List</h1>

   @if (Session::has('success'))
      <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">{{ Session('success') }}</span>
      </div>
    @endif

    <div class="container mx-auto">
      <div class="grid grid-cols-2 gap-4">
        <!-- konten bagian kiri -->
          <div class="col-span-1">
               <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-white border-b dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                     <th scope="col" class="px-6 py-3">Approve</th>
                     <th scope="col" class="px-6 py-3">Event Title</th>
                     <th scope="col" class="px-6 py-3">Name</th>
                     <th scope="col" class="px-6 py-3">Status</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  @php $no = 1 @endphp
                  @foreach ($certif as $cf => $hasil)
                   <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                     <td class="px-6 py-1">
                      <a href="{{ url('dashboard/statuscertificate/approved/'.$hasil->id) }}">
                        <img src="{{ asset('img/CheckCircle.svg') }}" width="30px" height="30px" type="image/svg+xml">
                      </a>
                    </td>
                     <td class="px-6 py-4">{{ $hasil->title }}</td>
                     <td class="px-6 py-4">{{ $hasil->user->name }}</td>
                     @if ($hasil->status == 1)
                      <td class="px-6 py-4"><span class="text-xs font-semibold py-1 px-2 rounded text-orange-600 bg-orange-200 last:mr-0 mr-1">
                      {{ $hasil->cstatus->name }}</span></td> 
                     @else
                     <td class="px-6 py-4"><span class="text-xs font-semibold py-1 px-2 rounded text-lime-600 bg-lime-200 last:mr-0 mr-1">
                      {{ $hasil->cstatus->name }}</span></td> 
                     @endif
                     
                   </tr>
                  @endforeach           
                  </tbody>
                </table> 
          </div>
          <div class="col-span-1">
                <object data="{{ asset('\master\certificate.pdf') }}" type="application/pdf" width="100%" height="600px">
                  <p>File PDF tidak dapat ditampilkan pada browser Anda. Silakan unduh file PDF untuk melihatnya.</p>
                </object>

          </div>
      </div>
  </div>
@endsection
@extends('dashboard.layouts.main')

@section('container')
   <h1 class="font-bold mb-5 text-4xl">My Certificate</h1>

   @if (Session::has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <span class="font-medium">{{ Session('success') }}</span>
    </div>
  @endif

    <a href="{{ route('certificate.create') }}"><button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-4">+ Add Certificate</button></a>
    <div class="container mx-auto relative flex flex-col shadow-lg">
      
      <div class="block m-4 p-4 w-full overflow-x-auto">
      {{-- <div class="grid grid-cols-2 gap-4"> --}}
        <!-- konten bagian kiri -->
          {{-- <div class="col-span-1"> --}}
      <table class="w-1/2 sm:w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-sm text-gray-700 uppercase border-b dark:bg-gray-700 dark:text-gray-400">
          <tr class="border border-solid border-l-0">
            <th scope="col" class="px-6 py-3">No</th>
            <th scope="col" class="px-6 py-3">Event</th>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Status</th>
            <th scope="col" class="px-6 py-3">Print</th>
            <th scope="col" class="px-6 py-3">Delete</th>
          </tr>
        </thead>
        
        <tbody class="text-base">
          @php $no = 1 @endphp
          @foreach ($certif as $cf => $hasil)
          <tr class=" border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-white-50 dark:hover:bg-white-600">
            <td class="px-6 py-3">{{ $no++ }}</td>
            <td class="px-6 py-3">{{ $hasil->title }}</td>
            <td class="px-6 py-3">{{ $hasil->user->name }}</td>
            <td class="px-6 py-3">
              <span class="text-xs font-semibold py-1 px-2 rounded 
                @if ($hasil->cstatus->id == 1)
                text-orange-600 bg-orange-200 
                @elseif ($hasil->cstatus->id == 3)
                  text-red-600 bg-red-200
                @else
                  text-lime-600 bg-lime-200 
                @endif
                    last:mr-0 mr-1">
                {{ $hasil->cstatus->name }}
              </span>
            </td> 
            <td class="px-6 py-3">
            <form id="form-print" action="{{ route('buat') }}" method="POST" target="blank_">
              @csrf
              {{-- <input type="hidden" name="tanggal" value="{{ $event->date}}"> --}}
              <input type="hidden" name="nama" value="{{ $hasil->user->name }}">
              <input type="hidden" name="judul" value="{{ $hasil->title}}">
              <button type="submit"
              @if ($hasil->cstatus->id != 2)
                disabled
              @endif 
              class="@if ($hasil->cstatus->id == 2)
            text-white bg-gradient-to-r from-lime-400 via-lime-500 to-lime-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 
            @endif font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline" ><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
              </svg></button>
            </form>
            </td>
            <td class="px-6 py-3">
            <form action="{{ route('certificate.destroy', $hasil->id) }}" method="POST">
              @csrf
              @method('delete')
              <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline ">Delete</button>
            </form>
          </td>
          </tr>
          @endforeach           
        </tbody>
      </table>
          {{-- </div> --}}
          {{-- <div class="col-span-1 py-8">
              <!-- konten bagian kanan -->
                 <object data="{{ asset('\master\certificate.pdf') }}" type="application/pdf" width="100%" height="600px">
                  <p>File PDF tidak dapat ditampilkan pada browser Anda. Silakan unduh file PDF untuk melihatnya.</p>
                </object>  --}}
                {{-- <iframe id="pdfPreview" src="{{ asset('\master\certificate.pdf') }}" style="width: 100%; height: 600px;"></iframe> --}}

          {{-- </div> --}}
          
      </div>
  </div>
@endsection
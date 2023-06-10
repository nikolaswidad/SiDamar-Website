@extends('dashboard.layouts.main')

@section('container')
   <h1 class="font-bold mb-5 text-4xl">My Certificate</h1>

   @if (Session::has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <span class="font-medium">{{ Session('success') }}</span>
    </div>
  @endif

    <a href="{{ route('certificate.create') }}"><button type="button" class="
      bg-blue-500 text-white px-5 py-2.5 mr-2 mb-4 rounded-lg text-sm">+ Add Certificate</button></a>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-1/2 sm:w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-sm text-gray-700 uppercase bg-gray-50 border-b dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">No</th>
            <th scope="col" class="px-6 py-3">Event</th>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Date</th>
            <th scope="col" class="px-6 py-3">Status</th>
            <th scope="col" class="px-6 py-3">Print</th>
            <th scope="col" class="px-6 py-3">Delete</th>
          </tr>
        </thead>
        
        <tbody class="text-base">
          @php $no = 1 @endphp
          @foreach ($certif as $cf => $hasil)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-3">{{ $no++ }}</td>
            <td class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $hasil->events->title }}</td>
            <td class="px-6 py-3">{{ $hasil->user->name }}</td>
            <td class="px-6 py-3">{{ $hasil->events->date }}</td>
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
              <input type="hidden" name="tanggal" value="{{ $hasil->events->date }}">
              <input type="hidden" name="nama" value="{{ $hasil->user->name }}">
              <input type="hidden" name="judul" value="{{ $hasil->events->title }}">
              <input type="hidden" name="manager" value="{{ $hasil->events->event_manager }}">
              <button type="submit"
              @if ($hasil->cstatus->id != 2)
                disabled
              @endif 
              class="@if ($hasil->cstatus->id == 2)
            {{-- text-white bg-gradient-to-r from-lime-400 via-lime-500 to-lime-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800  --}}
            bg-lime-500 text-white p-2 rounded-lg text-sm
            @endif font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline" ><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
              </svg></button>
            </form>
            </td>
            <td class="px-6 py-3">
            <form action="{{ route('certificate.destroy', $hasil->id) }}" method="POST">
              @csrf
              @method('delete')
              <button type="submit" class="text-red-600 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline" onclick="return confirm('Hapus Permanen?')"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
              </svg>
              </button>
            </form>
          </td>
          </tr>
          @endforeach           
        </tbody>
      </table>
          
    </div>
  </div>
@endsection
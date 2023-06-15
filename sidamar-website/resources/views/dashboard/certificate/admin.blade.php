@extends('dashboard.layouts.main')

@section('container')
   <h1 class="text-4xl font-semibold font-montserrat">Certificate List</h1>
   <hr class="bg-slate-200 mt-5 mb-9 max-w-lg">

   @if (Session::has('success'))
      <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">{{ Session('success') }}</span>
      </div>
    @endif

    <div class="container mx-auto">
    <div class="relative overflow-x-auto sm:rounded-lg">
               <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-sm text-gray-700 bg-gray-50 border-b dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                     <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Approve</th>
                     <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Reject</th>
                     <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Event Title</th>
                     <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/3">Date</th>
                     <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Name</th>
                     <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Status</th>
                     <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Print</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  @php $no = 1 @endphp
                  @foreach ($certif as $cf => $hasil)
                   <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                     <td class="text-lg text-gray-900 px-6 py-4 text-left">
                      <a href="{{ url('dashboard/statuscertificate/approved/'.$hasil->id) }}">
                        {{-- <img src="{{ asset('img/CheckCircle.svg') }}" width="30px" height="30px" type="image/svg+xml"> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
              
                      </a>
                    </td>
                    <td class="text-lg text-gray-900 px-6 py-4 text-left">
                      <a href="{{ url('dashboard/statuscertificate/rejected/'.$hasil->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                      </a>
                    </td>
                    <td class="text-lg text-gray-900 px-6 py-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $hasil->events->title }}</td>
                    <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $hasil->events->date }}</td>
                    <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $hasil->user->name }}</td>
                     <td class="text-lg text-gray-900 px-6 py-4 text-left">
                      <span class="px-2 font-semibold
                        @if ($hasil->cstatus->id == 1)
                        bg-orange-400 text-white px-1.5 py-2 text-sm rounded-lg text-center inline-flex
                        @elseif ($hasil->cstatus->id == 3)
                        bg-red-600 text-white px-1.5 py-2 text-sm rounded-lg text-center inline-flex
                        @else
                        bg-green-400 text-white px-1.5 py-2 text-sm rounded-lg text-center inline-flex 
                        @endif
                            last:mr-0 mr-1">
                        {{ $hasil->cstatus->name }}
                      </span>
                    </td> 
                    <td class="text-lg text-gray-900 px-6 py-4 text-left">
                      <form id="form-print" action="{{ route('buat') }}" method="POST" target="blank_">
                        @csrf
                        <input type="hidden" name="tanggal" value="{{ $hasil->events->date }}">
                        <input type="hidden" name="nama" value="{{ $hasil->user->name }}">
                        <input type="hidden" name="judul" value="{{ $hasil->events->title }}">
                        <input type="hidden" name="manager" value="{{ $hasil->events->event_manager }}">
                        <button type="submit"
                        class="bg-lime-500 text-white p-2 px-4 py-2 rounded-lg text-sm" ><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg></button>
                      </form>
                      </td>
                     
                   </tr>
                  @endforeach           
                  </tbody>
                </table> 
          </div>
  </div>
  <div class="mb-16"></div>
@endsection
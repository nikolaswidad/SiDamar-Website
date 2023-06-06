@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-4xl font-semibold font-montserrat">Donation</h1>
    <hr class="bg-slate-200 mt-5 max-w-lg">
    
    @if (session('success'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
      {{ session('success') }}
    </div>
    @endif

    {{-- Tabel Lama --}}
    <div class="max-w-7xl">
      
      <div class="flex justify-end">
        
          <a href="/dashboard/donation/create" class="p-3 bg-primary rounded-lg text-white font-semibold hover:bg-red-600 mt-5 ">Tambahkan Donasi Event</a>
      </div>
        <div class="flex flex-col font-montserrat">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full">
                    <thead class="border-b">
                      <tr>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Image</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Title</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Keterangan</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Dateline</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($donation as $don)
                        <tr class="border-b">
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">@if ($don->image)
                              <div style="max-height: 350px; overflow:hidden">
                                <img src="{{ asset($don->image) }}" alt="img" style="width: 100px" alt="{{ $don->title }}">
                              </div>

                            @endif</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $don->title }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $don->body }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ Carbon\Carbon::parse($don->date)->format('Y-m-d') }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">
                                <a href="/dashboard/donation/{{ $don->id }}/edit" class="bg-orange-400 text-white text-sm p-2 rounded-lg">Edit</a>
                                <form action="/dashboard/donation/{{ $don['id'] }}" method="POST" class="inline-block">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="bg-primary text-white p-2 rounded-lg text-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection
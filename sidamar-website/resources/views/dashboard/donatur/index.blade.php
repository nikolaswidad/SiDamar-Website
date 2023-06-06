@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-4xl font-semibold font-montserrat">Donatur</h1>
    <hr class="bg-slate-200 mt-5 max-w-lg">
    
    @if (session('success'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
      {{ session('success') }}
    </div>
    @endif

    {{-- Tabel Lama --}}
    <div class="max-w-7xl">

        <div class="flex flex-col font-montserrat">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full">
                    <thead class="border-b">
                      <tr>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Id Donatur</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Name</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No HP</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Email</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Event</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Total</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Payment method</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Proof</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($donatur as $donate => $don)
                      <tr class="border-b">
                          <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
                          <td class="text-lg text-gray-900 px-6 py-4 text-left">0002023-DTR-0{{ $don->id }}</td>    
                          <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $don->name }}</td>
                          <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $don->no_hp }}</td>
                          <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $don->email }}</td>
                          <td class="text-lg text-gray-900 px-6 py-4 text-left">
                            @if ($don->donation && isset($don->donation->title))
                                {{ $don->donation->title }}
                            @endif
                          </td>
                          <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $don->total }}</td>
                          <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $don->payment_type }}</td>

                          <td class="text-lg text-gray-900 px-6 py-4 text-left">
                              @if ($don->image)
                            <div style="max-height: 350px; overflow:hidden">
                              <img src="{{ asset($don->image) }}" alt="img" style="width: 100px" alt="{{ $don->name }}">
                            </div>
                          @endif</td>
                          <td class="text-lg text-gray-900 px-6 py-4 text-left">
                            <a href="/dashboard/donatur/{{ $don->id }}" class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 text-sm rounded-lg">Detail</a>
                            <form action="/dashboard/donatur/{{ $don['id'] }}" method="POST" class="inline-block">
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
    <div > {{ $donatur->links() }} </div>
    
    

@endsection
@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-4xl font-semibold font-montserrat">Bulan Pembayaran Kas</h1>
    <hr class="bg-slate-200 mt-5 max-w-lg">
    
    @if (session('success'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
      {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 bg-red-700 rounded-xl" role="alert">
      {{ session('error') }}
    </div>
    @endif

    {{-- Tabel Lama --}}
    <div class="max-w-7xl">
      <div class="flex justify-end">
          <a href="/dashboard/bulanKas/create" class="p-3 bg-primary rounded-lg text-white font-semibold hover:bg-red-600 mt-5 ">Create New Bulan</a>
      </div>
        <div class="flex flex-col font-montserrat">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full">
                    <thead class="border-b">
                      <tr>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Bulan</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Tahun</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Total Terkumpul</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($bulanKas as $bulanKas)
                        <tr class="border-b">
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $bulanKas->bulan }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $bulanKas->tahun }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $bulanKas->total_terkumpul}}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">
                              
                              <form action="/dashboard/pembayaranKas/{{ $bulanKas->id }}" method="POST" class="inline block">
                                @csrf
                                {{-- make 'detail button href to index method in pembayaranKas' --}}
                                @method('GET')
                                <button class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 text-sm rounded-lg">Detail</button>
                              </form>
                                {{-- <a href="/dashboard/pembayaranKas/{{ $bulanKas->id }}" class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 text-sm rounded-lg">Detail</a> --}}
                                <a href="/dashboard/bulanKas/{{ $bulanKas->id }}/edit" class="bg-orange-400 text-white text-sm p-2 rounded-lg">Edit</a>
                                {{-- Delete Baru --}}
                                <form action="/dashboard/bulanKas/{{ $bulanKas['id'] }}" method="POST" class="inline-block">
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
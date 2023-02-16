@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-4xl font-semibold font-montserrat">Bulan Pembayaran Kas</h1>
    
    <div class="flex justify-end">
        <a href="/dashboard/bulan_kas/create" class="p-3 bg-primary rounded-lg text-white font-semibold hover:bg-red-600 mt-5 ">Create New Bulan</a>
    </div>
    
    {{-- Tabel Lama --}}
    <div class="max-w-5xl">
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
                    @foreach ($bulan_kas as $bulan_kas)
                        <tr class="border-b">
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $bulan_kas->bulan }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $bulan_kas->tahun }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $bulan_kas->total_terkumpul }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">
                                <a href="/dashboard/bulan_kas/{{ $bulan_kas->id }}" class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 text-sm rounded-lg">Detail</a>
                                <a href="/dashboard/bulan_kas/{{ $bulan_kas->id }}/edit" class="bg-orange-400 text-white text-sm p-2 rounded-lg">Edit</a>
                                <form action="/dashboard/bulan_kas/{{ $bulan_kas->id }}" method="post" class="inline-block">
                                    @method('delete')
                                    @csrf
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
    
    

    {{-- Tabel baru --}}
    {{-- <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full">
                <thead class="border-b">
                  <tr>
                    <th scope="col" class="text-lg font-medium text-gray-900 px-6 py-4 text-left">No</th>
                    <th scope="col" class="text-lg font-medium text-gray-900 px-6 py-4 text-left">Bulan</th>
                    <th scope="col" class="text-lg font-medium text-gray-900 px-6 py-4 text-left">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($bulan_kas as $bulan_kas)
                    <tr class="border-b">
                        <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
                        <td class="text-lg text-gray-900 px-6 py-4 text-left"></td>
                        <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $bulan_kas->created_at }}</td>
                        <a href="/dashboard/bulan_kas/{{ $bulan_kas->slug }}/edit" class="badge bg-warning text-decoration-none">Edit</a>
                        <form action="/dashboard/bulan_kas/{{ $bulan_kas->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> --}}

    {{-- @foreach ($bulan_kas as $bulan_kas)
        <ul>
            <li>{{ $bulan_kas->id }}</li>
            <li>{{ $bulan_kas->bulan }}</li>
        </ul>
    @endforeach --}}

@endsection
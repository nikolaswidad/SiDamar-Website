@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-4xl font-semibold font-montserrat">Pembayaran Kas Bulan {{ $bulanKas->bulan }}</h1>
    <hr class="bg-slate-200 mt-5 max-w-lg">

    {{-- @foreach ($pembayaranKas as $bayar)
        <p>{{ $bayar->id }}</p>
        <p>{{ $bayar->user->name }}</p>
        <p>{{ $bayar->jumlah }}</p>
        <p>{{ $bayar->metode_pembayaran }}</p>
        <p>{{ $bayar->created_at }}</p>
        <p>{{ $bayar->status }}</p>
    @endforeach --}}
    
    <div class="max-w-7xl">
        @if (session('success'))
        <div class="max-w-full font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
            {{ session('success') }}
        </div>
        @endif
    
        @if (session('error'))
            <div class="max-w-full font-montserrat text-xl text-white p-5 mt-5 bg-red-700 rounded-xl" role="alert">
                {{ session('error') }}
            </div>
        @endif

        {{-- Hanya admin yang bisa membuat pembayaran baru --}}
        @if (Auth::user()->is_admin==1)
            <div class="flex justify-end">
            <a href="/dashboard/pembayaranKas/create/{{ $bulanKas->id }}" class="p-3 bg-primary rounded-lg text-white font-semibold hover:bg-red-600 mt-5 mb-5">Buat Pembayaran</a>
            </div>
        @endif
          <div class="flex flex-col font-montserrat">
              <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="overflow-hidden">
                    <table class="min-w-full">
                      <thead class="border-b">
                        <tr>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Nama</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Nominal</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Metode</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Bukti</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Tanggal Pembayaran</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Status</th>
                          @if (Auth::user()->is_admin == 1)
                            <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Action</th>  
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($pembayaranKas as $bayar)
                            <tr class="border-b">
                                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
                                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $bayar->user->name }}</td>
                                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $bayar->jumlah }}</td>
                                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $bayar->metode_pembayaran }}</td>
                                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $bayar->bukti_pembayaran }}</td>
                                {{-- get only date time without time --}}
                                <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $bayar->created_at->format('d F Y') }}</td>
                                <td class="text-lg text-gray-900 px-6 py-4 text-left">
                                    @if ($bayar->status == 'pending')
                                        <form action="/dashboard/pembayaranKas/{{ $bayar->id }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 text-sm rounded-lg">Pending</button>
                                        </form>
                                    @elseif ($bayar->status == 'success')
                                        <button class="bg-green-400 hover:bg-green-700 text-white p-2 text-sm rounded-lg">Success</button>
                                    @endif
                                </td>
                                @if (Auth::user()->is_admin == 1)
                                    <td class="text-lg text-gray-900 px-6 py-4 text-left inline-flex">
                                
                                        {{-- <a href="/dashboard/pembayaranKas/{{ $bulanKas->id }}" class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 text-sm rounded-lg">Detail</a> --}}
                                        <a href="/dashboard/bulanKas/{{ $bulanKas->id }}/edit" class="bg-orange-400 text-white text-sm p-2 mr-3 rounded-lg">Edit</a>
                                        {{-- Delete Baru --}}
                                        <form action="/dashboard/pembayaranKas/{{ $bayar['id'] }}" method="POST" class="inline-block">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="bg-primary text-white p-2 rounded-lg text-sm" onclick="return confirm('Are you sure?')">Hapus</button>
                                        </form>
                                    </td>
                                @endif
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
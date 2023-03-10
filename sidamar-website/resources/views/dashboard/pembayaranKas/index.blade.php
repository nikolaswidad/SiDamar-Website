@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-4xl font-semibold font-montserrat">Bulan Pembayaran Kas</h1>
    <hr class="bg-slate-200 mt-5 max-w-lg">
    
        
    @endforeach
    {{-- <div class="max-w-7xl">
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
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Nama</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Bulan</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Jumlah</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Metode Pembayaran</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Tanggal Pembayaran</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($pembayaranKas as $pembayaran)
                        <tr class="border-b">
                          <td class="px-6 py-4 text-left whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $loop->iteration }}</div>
                          </td>
                          <td class="px-6 py-4 text-left whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $pembayaran->nama }}</div>
                          </td>
                          <td class="px-6 py-4 text-left whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $pembayaran->bulanKas-> }}</div>
                          </td>
                          <td class="px-6 py-4 text-left whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $pembayaran->jumlah }}</div>
                          </td>
                          <td class="px-6 py-4 text-left whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $pembayaran->metode_pembayaran }}</div>
                          </td>
                          <td class="px-6 py-4 text-left whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $pembayaran->tanggal_pembayaran }}</div>
                          </td>
                          <td class="px-6 py-4 text-left whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $pembayaran->status }}</div>
                          </td>
                        </tr>
                        @endforeach --}}

@endsection
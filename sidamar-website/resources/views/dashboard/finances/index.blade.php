@php
$total_cashin = 0;
$total_cashout = 0;
$total = 0;
$balance = 0;
@endphp

@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-4xl font-semibold font-montserrat">Transaksi Keuangan SI DAMAR</h1>
    <hr class="bg-slate-200 mt-5 max-w-lg">
    
    @if (session('success'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
      {{ session('success') }}
    </div>
    @endif

    {{-- Tabel Lama --}}
    <div class="max-w-7xl">
      <div class="flex justify-end">
          <a href="/dashboard/finances/create" class="p-3 bg-primary rounded-lg text-white font-semibold hover:bg-red-600 mt-5 ">Tambahkan Data</a>
      </div>
        <div class="flex flex-col font-montserrat">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full">
                    <thead class="border-b">
                      <tr>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Keperluan</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Tanggal</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">CashIn</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">CashOut</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($finance as $fin)
        
                        <tr class="border-b">
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $fin->keperluan}}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ Carbon\Carbon::parse($fin->tanggal)->format('Y-m-d') }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $fin->cashin }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $fin->cashout }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $fin->keterangan }}</td>

                            <td class="text-lg text-gray-900 px-6 py-4 text-left">
                                <a href="/dashboard/finances/{{ $fin->id }}/edit" class="bg-orange-400 text-white text-sm p-2 rounded-lg">Edit</a>
                                <form action="/dashboard/finances/{{ $fin['id'] }}" method="POST" class="inline-block">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="bg-primary text-white p-2 rounded-lg text-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @php
                          $total_cashin += $fin['cashin'];
                          $total_cashout += $fin['cashout'];
                        @endphp
                    @endforeach
                    @php
                          $total = $total_cashin - $total_cashout;
                    @endphp
                    <tr>
                      <td class="text-lg text-gray-900 px-6 py-4 text-left"> </td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left"><b>Total</b>  </td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left"></td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left"><b>{{ $total_cashin }}</b></td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left"><b>{{ $total_cashout }}</b></td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left"><b>{{ $total }}</b></td>
                    </tr>
                    </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection
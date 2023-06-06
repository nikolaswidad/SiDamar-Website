@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-4xl font-semibold font-montserrat">Customer</h1>
    <hr class="bg-slate-200 mt-5 max-w-lg">
    
    @if (session('success'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
      {{ session('success') }}
    </div>
    @endif

    {{-- Tabel Lama --}}
    <div class="max-w-7xl">

  
        </form>
        <!-- Start kode untuk form pencarian -->
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full">
                    <thead class="border-b">
                      <tr>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Id Pembelian</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Name</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No HP</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Email</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Item</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Total</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Payment method</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Proof</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($customer as $customer => $cust)
                      <tr class="border-b">
                          <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
                          <td class="text-lg text-gray-900 px-6 py-4 text-left">0002023-MRCH-0{{ $cust->id }}</td>                                                   
                          <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $cust->name }}</td>
                          <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $cust->no_hp }}</td>
                          <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $cust->email }}</td>
                          <td class="text-lg text-gray-900 px-6 py-4 text-left">
                            @if ($cust->merch && isset($cust->merch->title))
                                {{ $cust->merch->title }}
                            @endif
                          </td>
                          <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $cust->total }}</td>
                          <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $cust->payment_type }}</td>

                          <td class="text-lg text-gray-900 px-6 py-4 text-left">
                              @if ($cust->image)
                            <div style="max-height: 350px; overflow:hidden">
                              <img src="{{ asset($cust->image) }}" alt="img" style="width: 100px" alt="{{ $cust->name }}">
                            </div>
                          @endif</td>
                          <td class="text-lg text-gray-900 px-6 py-4 text-left">
                            <a href="/dashboard/customer/{{ $cust->id }}" class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 text-sm rounded-lg">Detail</a>
                            <form action="/dashboard/customer/{{ $cust['id'] }}" method="POST" class="inline-block">
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
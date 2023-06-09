@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-4xl font-semibold font-montserrat">Customer</h1>
    <hr class="bg-slate-200 mt-5 mb-9 max-w-lg">
    
    @if (session('success'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <div>
      <label for="table-search" class="sr-only">Search</label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none py-2">
          <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </div>
        <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari customer...">
      </div>
    </div>

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
      <tbody id="customer-table">
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
                @endif
            </td>

            <td class="text-lg text-gray-900 px-6 py-4 text-left">
              <a href="/dashboard/customer/{{ $cust->id }}" class="text-white bg-gradient-to-r from-yellow-200 via-yellow-300 to-yellow-400 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 ">Detail</a>
              <form action="/dashboard/customer/{{ $cust['id'] }}" method="POST" class="inline-block">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="mt-2 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline " onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            </td>

            
        </tr>
      @endforeach
      </tbody>
  </table>
                
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {

    var searchInput = document.getElementById("table-search");
    searchInput.addEventListener("input", searchTable);

    function searchTable() {
        var input = searchInput.value.toLowerCase();
        var table = document.getElementById("customer-table");
        var rows = table.getElementsByTagName("tr");

        for (var i = 0; i < rows.length; i++) {
            var rowData = rows[i].textContent.toLowerCase();

            if (rowData.includes(input)) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }

      // Make the table header sticky
      var tableContainer = document.querySelector(".table-container");
      tableContainer.addEventListener("scroll", function() {
        var tableHeader = document.querySelector("donation-table thead");
        tableHeader.style.transform = "translateY(" + tableContainer.scrollTop + "px)";
    });
  });
  </script>
@endsection
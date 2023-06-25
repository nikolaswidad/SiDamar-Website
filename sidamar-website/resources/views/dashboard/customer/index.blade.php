@extends('dashboard.layouts.main')

@section('container')
  <div class="w-full font-montserrat">
    <h1 class="text-4xl font-semibold font-montserrat">Pembelian Merchandise</h1>
    <hr class="bg-slate-200 mt-5 mb-9 max-w-lg">
    
    @if (session('success'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 mb-5 bg-green-500 rounded-xl" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <div>
      <label for="table-search" class="sr-only">Search</label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none py-2">
          <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </div>
        <input type="text" id="table-search" class="mb-5 block p-3 pl-10 text-md text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Pembeli...">
      </div>
    </div>

    <table class="min-w-full">
      <thead class="border-b">
        <tr>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Nama</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No HP</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-2 py-4 text-left">Item</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-2 py-4 text-left">Total</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Metode Pembayaran</th>
          <th scope="col" class="text-lg font-bold text-gray-900 pl-8 pr-8 py-4 text-center">Bukti</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/2">Action</th>
        </tr>
      </thead>
      <tbody id="customer-table">
      @foreach ($customer as $customer => $cust)
        <tr class="border-b">
            <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
            <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $cust->name }}</td>
            <td class="text-base text-gray-900 px-6 py-4 text-left">
              <a href="https://wa.me/{{ $cust->no_hp }}/?text=Halo {{ $cust->name }} ! 👋🎉 Kami ingin menyampaikan terima kasih telah mempercayai kami sebagai mitra dalam memberikan hadiah istimewa. Pesananmu sudah kami terima dan merchandise yang kamu pilih akan dikirim dengan kualitas terbaik. Jika ada pertanyaan atau permintaan khusus, jangan ragu untuk menghubungi tim layanan pelanggan kami. Terima kasih atas kepercayaanmu dan selamat menikmati momen-momen berharga dengan merchandise kami. ✨😊" class="hover:text-red-600" target="_blank">{{ $cust->no_hp }}</a>
            </td>
            <td class="text-base text-gray-900 px-2 py-4 text-left">
              @if ($cust->merch && isset($cust->merch->title))
                  {{ $cust->merch->title }}
              @endif
            </td>
            <td class="text-base text-gray-900 px-2 py-4 text-left">{{ $cust->total }}</td>
            <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $cust->payment_type }}</td>

            <td class="text-base text-gray-900 py-4 text-left">
                @if ($cust->image)
                  {{-- <div style="max-height: 350px; overflow:hidden">
                    <img src="{{ asset($cust->image) }}" alt="img" style="width: 100px" alt="{{ $cust->name }}">
                  </div> --}}
                  <div class="flex justify-center">
                    <button class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 px-3 text-sm font-semibold rounded-lg flex justify-center" onclick="showBukti('{{ asset($cust->image) }}')">Lihat Bukti</button>
                  </div>
                  <div id="myModal" class="modal">
                      <span class="close">&times;</span>
                      <img class="modal-content" id="img01">
                      <div id="caption"></div>
                  </div>
                @endif

            </td>

            <td class="text-base text-gray-900 px-6 py-4 text-left">
              <div class="flex gap-2">
                <a href="/dashboard/customer/{{ $cust->id }}" class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 text-sm font-semibold rounded-lg">Detail</a>
                <form action="/dashboard/customer/{{ $cust['id'] }}" method="POST" class="inline-block">
                  @csrf
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="bg-primary text-white p-2 rounded-lg text-sm font-semibold" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
              </div>
            </td>

            
        </tr>
      @endforeach
      </tbody>
  </table>
  @empty($customer)
  <div class="px-6 py-8 whitespace-nowrap">
      <div class="font-semibold mb-5 text-2xl text-center text-gray-500">- Tidak Ada Pembelian -</div>
  </div>
  @endempty
  <div id="no-event-data" class="hidden px-6 py-4 whitespace-nowrap">
      <div class="font-semibold mb-5 text-2xl text-center text-gray-500">Pembelian tidak ditemukan</div>
  </div>
  <style>
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 9999; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgba(0,0,0,0.8); /* Black w/ opacity */
    }

    .modal-content {
        margin: auto;
        display: block;
        max-width: 80%;
        max-height: 80%;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content, #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)}
        to {-webkit-transform:scale(1)}
    }

    @keyframes zoom {
        from {transform:scale(0)}
        to {transform:scale(1)}
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 15px;
        right: 20px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
    }
  </style>            
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {

    var searchInput = document.getElementById("table-search");
    searchInput.addEventListener("input", searchTable);

    function searchTable() {
        var input = searchInput.value.toLowerCase();
        var table = document.getElementById("customer-table");
        var rows = table.getElementsByTagName("tr");
        var noEventDataDiv = document.getElementById("no-event-data");

        var hasResults = false;

        for (var i = 0; i < rows.length; i++) {
            var rowData = rows[i].textContent.toLowerCase();

            if (rowData.includes(input)) {
                rows[i].style.display = "";
                hasResults = true;
            } else {
                //h1 Tidak ada event

                rows[i].style.display = "none";
            }
        }

        if (hasResults) {
        noEventDataDiv.style.display = "none";
        } else {
            noEventDataDiv.style.display = "block";
        }
    }

    // Make the table header sticky
    var tableContainer = document.querySelector(".table-container");
    tableContainer.addEventListener("scroll", function() {
        var tableHeader = document.querySelector("customer-table thead");
        tableHeader.style.transform = "translateY(" + tableContainer.scrollTop + "px)";
    });
    });

    function showBukti(bukti_pembayaran) {
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("img01");
        var span = document.getElementsByClassName("close")[0];

        modal.style.display = "block";
        modalImg.src = bukti_pembayaran;

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }
  </script>
  </div>
@endsection
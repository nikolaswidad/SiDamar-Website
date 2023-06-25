@extends('dashboard.layouts.main')

@section('container')

    <div class="w-full">
        <h1 class="text-4xl font-semibold font-montserrat">Pembayaran Kas Bulan {{ $bulanKas->bulan }}</h1>
        <hr class="bg-slate-200 mt-5 max-w-lg">
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
            <div class="grid grid-cols-2">
                <div class="realtive justify-start">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none py-2">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                      </div>
                      <input type="text" id="table-search" class="mt-5 block p-3 pl-10 text-md text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Pembayaran Kas...">
                    </div>
                </div>
                <div class="flex justify-end">
                    <a href="/dashboard/bulanKas" class="p-3 bg-slate-500 rounded-lg text-white font-semibold hover:bg-slate-600 mt-5 mb-5 mr-3">Kembali</a>
                    <a href="/dashboard/pembayaranKas/create/{{ $bulanKas->id }}" class="p-3 bg-primary rounded-lg text-white font-semibold hover:bg-red-600 mt-5 mb-5">Buat Pembayaran</a>
                </div>
            </div>
        @else
            <div class="grid grid-cols-2">
                <div class="realtive justify-start">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                      <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none py-2">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                      </div>
                      <input type="text" id="table-search" class="mt-5 block p-3 pl-10 text-md text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Bulan Kas...">
                    </div>
                </div>
                <div class="flex justify-end">
                    <a href="/dashboard/bulanKas" class="p-3 bg-slate-500 rounded-lg text-white font-semibold hover:bg-slate-600 mt-5 mb-5">Kembali ke Bulan Kas</a>    
                </div>
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
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/7">Nama</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/12">Nominal</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/7">Metode</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-8 py-4 text-center">Bukti</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/7">Tanggal</th>
                          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Status</th>
                          @if (Auth::user()->is_admin == 1)
                            <th scope="col" class="text-lg font-bold text-gray-900 px-8 py-4 text-left w-1/7">Action</th>  
                          @endif
                        </tr>
                      </thead>
                      <tbody id="pembayaran_table">
                        @foreach ($pembayaranKas as $bayar)
                            <tr class="border-b">
                                <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
                                <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $bayar->user->name }}</td>
                                <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $bayar->jumlah }}</td>
                                <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $bayar->metode_pembayaran }}</td>
                                <td class="text-base text-gray-900 py-4 text-left">
                                    {{-- view the bukti_pembayaran --}}
                                    {{-- <a href="" class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 text-sm rounded-lg" onclick="">Lihat Bukti</a> --}}
                                    <button class="bg-yellow-400 hover:bg-yellow-700 text-white py-2 px-4 text-sm font-semibold rounded-lg inline-flex text-center" onclick="showBukti('{{ $bayar->bukti_pembayaran }}')">Lihat Bukti</button>
                                    <div id="myModal" class="modal">
                                        <span class="close">&times;</span>
                                        <img class="modal-content" id="img01">
                                        <div id="caption"></div>
                                    </div>
                                </td>
                                {{-- get only date time without time --}}
                                <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $bayar->created_at->format('d F Y') }}</td>
                                <td class="text-base text-gray-900 px-6 py-4 text-left">    
                                    @if ($bayar->status == 'success')
                                        {{-- <button class="bg-green-400 hover:bg-green-700 text-white p-2 text-sm rounded-lg">Success</button> --}}
                                        <p class="bg-green-400 text-white py-2 px-2 text-sm font-semibold rounded-lg text-center">Success</p>
                                    @endif
                                </td>
                                @if (Auth::user()->is_admin == 1)
                                    <td class="text-base text-gray-900 py-4 text-left">
                                
                                        {{-- <a href="/dashboard/pembayaranKas/{{ $bayar->id }}/edit" class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 text-sm rounded-lg">Detail</a> --}}
                                        <div class="flex justify-center gap-2">
                                            <a href="/dashboard/pembayaranKas/{{ $bulanKas->id }}/{{ $bayar->id }}/edit" class="bg-orange-400 text-white text-sm font-semibold p-2 rounded-lg">Edit</a>
                                            {{-- Delete Baru --}}
                                            <form action="/dashboard/pembayaranKas/{{ $bayar['id'] }}" method="POST" class="">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="bg-primary text-white p-2 rounded-lg text-sm font-semibold" onclick="return confirm('Apakah Anda yakin ingin menghapus pembayaran?')">Hapus</button>
                                            </form>
                                        </div>
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
          var table = document.getElementById("pembayaran_table");
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
          var tableHeader = document.querySelector("pembayaran-table thead");
          tableHeader.style.transform = "translateY(" + tableContainer.scrollTop + "px)";
      });
    });
    </script>
    
    <script>
        function showBukti(bukti_pembayaran) {
            var modal = document.getElementById("myModal");
            var modalImg = document.getElementById("img01");
            var span = document.getElementsByClassName("close")[0];
    
            modal.style.display = "block";
            modalImg.src = "/bukti_pembayaran/" + bukti_pembayaran;
    
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
    
@endsection
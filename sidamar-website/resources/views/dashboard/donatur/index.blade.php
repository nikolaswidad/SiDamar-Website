@extends('dashboard.layouts.main')

@section('container')
  <div class="max-w-7xl font-montserrat">
    <h1 class="text-4xl font-semibold font-montserrat">Donatur</h1>
    <hr class="bg-slate-200 mt-5 mb-9 max-w-lg">
    
    @if (session('success'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 mb-5 bg-green-500 rounded-xl" role="alert">
      {{ session('success') }}
    </div>
    @endif

    {{-- Tabel Lama --}}
    <div>
      <label for="table-search" class="sr-only">Search</label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none py-2">
          <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </div>
        <input type="text" id="table-search" class="mb-5 block p-3 pl-10 text-md text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Donatur...">
      </div>
    </div>

    <table class="min-w-full">
      <thead class="border-b">
        <tr>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Nama</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No HP</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left w-1/12">Event</th>
          <th scope="col" class="text-lg font-bold text-gray-900 py-4 text-left ">Total</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Metode Pembayaran</th>
          <th scope="col" class="text-lg font-bold text-gray-900 pr-16 py-4 text-left">Bukti</th>
          <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Action</th>
        </tr>
      </thead>
      <tbody id="donation-table">
      @foreach ($donatur as $donate => $don)
        <tr class="border-b">
            <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>  
            <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $don->name }}</td>
            <td class="text-base text-gray-900 px-6 py-4 text-left">
              <a href="https://wa.me/{{ $don->no_hp }}/?text=Halo {{ $don->name }}! 🌟 Terima kasih telah berpartisipasi dalam donasi event Si Damar. Donasi yang telah diberikan sangat berarti bagi kesuksesan acara dan membantu masyarakat yang membutuhkan. Kami akan menggunakan dana dengan bijaksana dan transparan. Jika ada pertanyaan atau ingin mendapatkan update terbaru, silakan hubungi kami. Terima kasih atas kontribusimu yang berharga. Bersama-sama, kita dapat menciptakan dampak positif yang luar biasa. 🙏❤️" class="hover:text-red-600" target="_blank">{{ $don->no_hp }}</a>
            </td>
            <td class="text-base text-gray-900 px-6 py-4 text-left">
              @if ($don->donation && isset($don->donation->title))
                  {{ $don->donation->title }}
              @endif
            </td>
            <td class="text-base text-gray-900 py-4 text-left">{{ $don->total }}</td>
            <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $don->payment_type }}</td>

            <td class="text-base text-gray-900 py-4 text-left">
                <button class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 px-3 text-sm font-semibold rounded-lg flex justify-center" onclick="showBukti('{{ asset($don->image) }}')">Lihat Bukti</button>
                <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>
            </td>
            <td class="text-base text-gray-900 px-6 py-4 text-left">
              <div class="flex gap-2">
                <a href="/dashboard/donatur/{{ $don->id }}" class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 text-sm font-semibold rounded-lg inline-block w-1/2">Detail</a>
                
                <form action="/dashboard/donatur/{{ $don['id'] }}" method="POST" class="inline-block">
                  @csrf
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="bg-primary hover:bg-red-700 text-white p-2 rounded-lg text-sm font-semibold inline" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                </form>
              </div>
            </td>
        </tr>
      @endforeach
      </tbody>
  </table>
  @empty($donatur)
    <div class="px-6 py-8 whitespace-nowrap">
        <div class="font-semibold mb-5 text-2xl text-center text-gray-500">- Tidak Ada Data Donatur -</div>
    </div>
  @endempty
    <div id="no-event-data" class="hidden px-6 py-6 whitespace-nowrap">
        <div class="font-semibold mb-5 text-2xl text-center text-gray-500">Donatur tidak ditemukan</div>
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
          var table = document.getElementById("donation-table");
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
          var tableHeader = document.querySelector("donation-table thead");
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
    <div class="mb-20"></div>
  </div>
@endsection
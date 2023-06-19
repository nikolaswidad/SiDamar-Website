@extends('dashboard.layouts.main')

@section('container')
   {{-- <h1 class="font-bold mb-5 text-4xl">Daftar Post</h1> --}}
<div class="max-w-full font-montserrat">
  <h1 class="font-bold mb-5 text-4xl">Daftar Post</h1>
  <hr class="bg-slate-200 mt-5 mb-9 max-w-lg">

   @if (Session::has('success'))
      <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 mb-5 bg-green-500 rounded-xl" role="alert">
      {{ session('success') }}
      </div>
    @endif

     <a href="{{ route('posts.create') }}"><button type="button" class="p-3 bg-primary rounded-lg text-white font-semibold hover:bg-red-600 mb-5">+ Tambah Post</button></a>
   <a href="/dashboard/posts/deleted">
   <button type="button" class="
   {{-- text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 --}}
   p-3 hover:bg-red-600 bg-primary text-white 
    font-semibold rounded-lg text-lg px-5 py-2.5 text-center mr-2 float-right mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash inline" viewBox="0 0 16 16">
    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
  </svg> Tempat Sampah</button>
  </a>
  <form action="/dashboard/posts"> 
  <label for="search" class="sr-only">Cari</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </div>
          <input type="search" id="table-search" name="search" class="mb-3 block p-3 pl-10 text-md text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Post..." value="{{ old('search') }}">
    </div>
  </form>
 
  <div class="relative overflow-x-auto sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-sm text-gray-700 bg-gray-50 border-b dark:bg-gray-700 dark:text-gray-400">
        <tr>
        <th scope="col" class="text-lg text-gray-900 px-6 py-4 text-left">No</th>
        <th scope="col" class="text-lg text-gray-900 px-6 py-4 text-left">Judul</th>
        <th scope="col" class="text-lg text-gray-900 px-6 py-4 text-left">Penulis</th>
        <th scope="col" class="text-lg text-gray-900 px-6 py-4 text-left">Kategori</th>
        <th scope="col" class="text-lg text-gray-900 px-6 py-4 text-left">Gambar</th>
        <th scope="col" class="text-lg text-gray-900 px-6 py-4 text-left">Edit</th>
        <th scope="col" class="text-lg text-gray-900 px-6 py-4 text-left">Hapus</th>
        </tr>
      </thead>
         
          <tbody id="post-table">
          @foreach ($post as $cat => $hasil)
          <tr class="border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $post->firstItem()+$cat }}</td>
            <td class="text-base text-gray-900 px-6 py-4 text-left">{{ $hasil->title }}</td>
            <td class="text-base text-gray-600 px-6 py-4 text-left">{{ $hasil->author->name }}</td>
            <td class="text-base text-gray-600 px-6 py-4 text-left">{{ $hasil->category->name }}</td>
            <td class="text-base text-gray-900 px-6 py-4 text-left">
              @if ($hasil->image)
                <div style="max-height: 350px; overflow:hidden">
                  <img src="{{ asset('upload/posts/' . $hasil->image) }}" alt="img" style="width: 100px" alt="{{ $hasil->category->name }}">
                </div>
              @else
                <img src="https://source.unsplash.com/1200x400?{{ $hasil->category->name }}" style="width: 100px" alt="{{ $hasil->category->name }}">
              @endif
            <td class="px-6 py-3">
                <a href="{{ route('posts.edit', $hasil->id) }}"><button type="button" class="text-yellow-400 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
                </button></a>
              </form>
            </td>
            <td class="px-6 py-3">
              <form action="{{ route('posts.destroy', $hasil->id) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="text-red-600 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg></button>
              </form>
            </td>
          </tr>
          @endforeach           
        </tbody>
    </table>
  </div>
   <div class="mt-5 text-center flex justify-center">
    {{ $post->links() }}
  </div>
       
       
    <div class="mb-16"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function() {

      var searchInput = document.getElementById("table-search");
      searchInput.addEventListener("input", searchTable);

      function searchTable() {
          var input = searchInput.value.toLowerCase();
          var table = document.getElementById("post-table");
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
  </div>
@endsection
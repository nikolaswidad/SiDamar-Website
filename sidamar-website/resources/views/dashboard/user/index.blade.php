@extends('dashboard.layouts.main')

@section('container')
    <div class="max-w-5xl">
        <h1 class="text-4xl font-semibold font-montserrat">Pengguna</h1>
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

        <div class="flex flex-col font-montserrat">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                  {{-- Button tambah dan search bar --}}
                  <div class="grid grid-cols-2">
          
                      <div class="flex justify-start">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative">
                          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none py-2">
                            <svg class="w-5 h-5 mt-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                          </div>
                          <input type="text" id="table-search" class="mt-5 block p-3 pl-10 text-md text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Pengguna...">
                        </div>
                      </div>
                      
                      @if (Auth::user()->is_admin == 1)
                        <div class="flex justify-end">
                          <a href="/dashboard/user/create" class="p-3 px-4 bg-primary rounded-lg text-white font-semibold hover:bg-red-600 mt-5 ">+ Tambah User</a>
                        </div>
                      @endif
                
                  </div>
                <div class="overflow-hidden">
                  <table class="min-w-full">
                    <thead class="border-b">
                      <tr>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">No</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Nama</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Tahun Masuk</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Role</th>
                        <th scope="col" class="text-lg font-bold text-gray-900 px-6 py-4 text-left">Action</th>
                      </tr>
                    </thead>
                    <tbody id="user-table">
                    @foreach ($users as $user)
                        <tr class="border-b">
                            {{-- check user status in pembayaran kas, if != success display it --}}
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $loop->iteration }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $user->name }}</td>
                            <td class="text-lg text-gray-900 px-6 py-4 text-left">{{ $user->tahun_bergabung }}</td>
                            @if ($user->is_admin == 1 && $user->is_author == 1)
                                <td class="text-lg text-gray-900 px-6 py-4 text-left">Admin</td>
                            @elseif ($user->is_admin == 1 && $user->is_author == 0)
                                <td class="text-lg text-gray-900 px-6 py-4 text-left">Admin</td>
                            @elseif ($user->is_admin == 0 && $user->is_author == 1)
                                <td class="text-lg text-gray-900 px-6 py-4 text-left">Author</td>
                            @else
                                <td class="text-lg text-gray-900 px-6 py-4 text-left">User</td>
                            @endif
                            <td class="text-lg text-gray-900 px-6 py-4 text-left flex gap-2">    
                                <form action="/dashboard/user/{{ $user->id }}" method="POST" class="inline-block">
                                  @csrf
                                  {{-- make 'detail button href to index method in pembayaranKas' --}}
                                  @method('GET')
                                  <button class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 text-sm font-semibold rounded-lg">Detail</button>
                                </form>
  
                                {{-- <a href="/dashboard/pembayaranKas/{{ $bulanKas->id }}" class="bg-yellow-400 hover:bg-yellow-700 text-white p-2 text-sm rounded-lg">Detail</a> --}}
                                <a href="/dashboard/user/{{ $user->id }}/edit" class="bg-orange-400 hover:bg-orange-700 text-white text-sm font-semibold p-2 rounded-lg">Edit</a>
                                {{-- Delete Baru --}}
                                <form action="/dashboard/user/{{ $user['id'] }}" method="POST" class="inline-block">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="bg-primary text-white p-2 rounded-lg text-sm font-semibold" onclick="return confirm('Apakah anda yakin ingin menghapus pengguna?')">Hapus</button>
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {

            var searchInput = document.getElementById("table-search");
            searchInput.addEventListener("input", searchTable);

            function searchTable() {
                var input = searchInput.value.toLowerCase();
                var table = document.getElementById("user-table");
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
                var tableHeader = document.querySelector("user-table thead");
                tableHeader.style.transform = "translateY(" + tableContainer.scrollTop + "px)";
            });
        });
        </script> 
        <div class="mb-16"></div>
    </div>
@endsection
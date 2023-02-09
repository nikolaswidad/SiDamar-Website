@extends('dashboard.layouts.main')

@section('container')
   <h1 class="font-bold mb-5 text-4xl">List Post yang dihapus</h1>

   @if (Session::has('success'))
      <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">{{ Session('success') }}</span>
      </div>
    @endif

   <a href="{{ route('posts.create') }}"><button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-4">+ Tambah Post</button></a>
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
         <thead class="text-xs text-gray-700 uppercase bg-white border-b dark:bg-gray-700 dark:text-gray-400">
           <tr>
            <th scope="col" class="px-6 py-3">No</th>
            <th scope="col" class="px-6 py-3">Judul</th>
            <th scope="col" class="px-6 py-3">Kategori</th>
            <th scope="col" class="px-6 py-3">Gambar</th>
            <th scope="col" class="px-6 py-3">Action</th>
           </tr>
         </thead>
         
         <tbody>
   @foreach ($post as $cat => $hasil)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4">{{ $post->firstItem()+$cat }}</td>
            <td class="px-6 py-4">{{ $hasil->title }}</td>
            <td class="px-6 py-4">{{ $hasil->category->name }}</td>
            <td class="px-6 py-4">
              @if ($hasil->image)
                <div style="max-height: 350px; overflow:hidden">
                  <img src="{{ asset($hasil->image) }}" alt="img" style="width: 100px" alt="{{ $hasil->category->name }}">
                </div>
                
              @else
                  <img src="https://source.unsplash.com/1200x400?{{ $hasil->category->name }}" style="width: 100px" alt="{{ $hasil->category->name }}">
              @endif
              {{-- <img src="{{ asset($hasil->image) }}" alt="img" style="width: 100px"></td> --}}
            <td class="px-6 py-4">
              <form action="" method="POST">
                @csrf
                @method('delete')
                <a href="{{ route('posts.restore', $hasil->id) }}"><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 ">Restore</button></a>
                <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline">Delete</button>
              </form>
            </td>
          </tr>
   @endforeach           
         </tbody>
       </table> 
       {{ $post->links() }}
       
   <div class="mb-96"></div>
@endsection
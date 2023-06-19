@extends('dashboard.layouts.main')

@section('container')
<div class="max-w-full font-montserrat">
   <h1 class="font-bold mb-5 text-4xl">List Post yang dihapus</h1>
   <hr class="bg-slate-200 mt-5 mb-9 max-w-lg">

   @if (Session::has('success'))
      <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 mb-5 bg-green-500 rounded-xl" role="alert">
        <span class="font-medium">{{ Session('success') }}</span>
      </div>
    @endif

    <div class="relative overflow-x-auto sm:rounded-lg">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
         <thead class="text-sm text-gray-700 bg-gray-50 border-b dark:bg-gray-700 dark:text-gray-400">
           <tr>
            <th scope="col" class="px-6 py-3">No</th>
            <th scope="col" class="px-6 py-3">Judul</th>
            <th scope="col" class="px-6 py-3">Penulis</th>
            <th scope="col" class="px-6 py-3">Kategori</th>
            <th scope="col" class="px-6 py-3">Gambar</th>
            <th scope="col" class="px-6 py-3">Restore</th>
            <th scope="col" class="px-6 py-3">Hapus</th>
           </tr>
         </thead>
         
         <tbody>
   @foreach ($post as $cat => $hasil)
          <tr class="border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="text-gray-600 px-6 py-4 text-left">{{ $post->firstItem()+$cat }}</td>
            <td class="text-gray-900 px-6 py-4 text-left">{{ $hasil->title }}</td>
            <td class="text-gray-600 px-6 py-4 text-left">{{ $hasil->author->name }}</td>
            <td class="text-gray-600 px-6 py-4 text-left">{{ $hasil->category->name }}</td>
            <td class="text-gray-600 px-6 py-4 text-left">
              @if ($hasil->image)
                <div style="max-height: 350px; overflow:hidden">
                  <img src="{{ asset('upload/posts/' . $hasil->image) }}" alt="img" style="width: 100px" alt="{{ $hasil->category->name }}">
                </div>
              @else
                <img src="https://source.unsplash.com/1200x400?{{ $hasil->category->name }}" style="width: 100px" alt="{{ $hasil->category->name }}">
              @endif
            <td class="text-gray-600 px-6 py-4 text-left">
                <a href="{{ route('posts.restore', $hasil->id) }}"><button type="button" class="text-blue-600 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
                </svg>
                </button></a>
            </td>
            <td class="px-6 py-3">
              <form action="{{ route('posts.kill', $hasil->id) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="text-red-600 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline"onclick="return confirm('Hapus permanen?')"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75L14.25 12m0 0l2.25 2.25M14.25 12l2.25-2.25M14.25 12L12 14.25m-2.58 4.92l-6.375-6.375a1.125 1.125 0 010-1.59L9.42 4.83c.211-.211.498-.33.796-.33H19.5a2.25 2.25 0 012.25 2.25v10.5a2.25 2.25 0 01-2.25 2.25h-9.284c-.298 0-.585-.119-.796-.33z" />
                </svg>
                </button>
              </form>
            </td>
          </tr>
   @endforeach           
         </tbody>
       </table> 
       {{ $post->links() }}
       
   <div class="mb-96"></div>
@endsection
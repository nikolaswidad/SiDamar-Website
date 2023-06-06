@extends('dashboard.layouts.main')

@section('container')
   <h1 class="font-bold mb-5 text-4xl">List Post yang dihapus</h1>

   @if (Session::has('success'))
      <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">{{ Session('success') }}</span>
      </div>
    @endif

      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
         <thead class="text-xs text-gray-700 uppercase bg-white border-b dark:bg-gray-700 dark:text-gray-400">
           <tr>
            <th scope="col" class="px-6 py-3">No</th>
            <th scope="col" class="px-6 py-3">Title</th>
            <th scope="col" class="px-6 py-3">Author</th>
            <th scope="col" class="px-6 py-3">Category</th>
            <th scope="col" class="px-6 py-3">Image</th>
            <th scope="col" class="px-6 py-3">Restore</th>
            <th scope="col" class="px-6 py-3">Delete</th>
           </tr>
         </thead>
         
         <tbody>
   @foreach ($post as $cat => $hasil)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-3">{{ $post->firstItem()+$cat }}</td>
            <td class="px-6 py-3">{{ $hasil->title }}</td>
            <td class="px-6 py-3">{{ $hasil->author->name }}</td>
            <td class="px-6 py-3">{{ $hasil->category->name }}</td>
            <td class="px-6 py-3">
              @if ($hasil->image)
                <div style="max-height: 350px; overflow:hidden">
                  <img src="{{ asset('upload/posts/' . $hasil->image) }}" alt="img" style="width: 100px" alt="{{ $hasil->category->name }}">
                </div>
              @else
                <img src="https://source.unsplash.com/1200x400?{{ $hasil->category->name }}" style="width: 100px" alt="{{ $hasil->category->name }}">
              @endif
            <td class="px-6 py-3">
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
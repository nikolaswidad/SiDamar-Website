@extends('dashboard.layouts.main')

@section('container')
   <h1 class="font-bold mb-5 text-4xl">Edit category</h1>

   @if (count($errors)>0)
      @foreach ($errors->all() as $error)
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
          <span class="font-medium">{{ $error }}</span> Change a few things up and try submitting again.
        </div>
      @endforeach
    @endif

    @if (Session::has('success'))
      <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">{{ Session('success') }}</span>
      </div>
    @endif
    
<div class="w-full">
   <form action="{{ route('categories.update',$category->id)  }}" method="POST" class="bg-white shadow rounded-lg px-8 pt-6 pb-8 mb-4">
    @csrf
    @method('patch')
    <div class="mb-6">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
      <input type="text" id="name" name="name" value="{{ $category->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    
  
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto mt-3 px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>
</div>

  <div class="mb-96"></div>
@endsection
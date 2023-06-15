@extends('dashboard.layouts.main')

@section('container')
  <div class="max-w-7xl font-montserrat">
    <h1 class="font-bold mb-5 text-4xl">Tambah Kategori Post</h1>
    <hr class="bg-slate-200 mt-5 max-w-3xl">
    @if (count($errors)>0)
        @foreach ($errors->all() as $error)
          <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">{{ $error }}</span> Isi semua kolom pengisian dengan format yang benar
          </div>
        @endforeach
      @endif

      @if (Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
          <span class="font-medium">{{ Session('success') }}</span>
        </div>
      @endif
      
    <div class="w-1/2">
      <form action="{{ route('categories.store') }}" method="POST" class="rounded-lg space-y-8">
        @csrf
        <div class="mb-6">
          <label for="name" class="block text-gray-700 text-lg font-bold mb-2">Nama Kategori</label>
          <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        
        <div class="flex justify-end">
          <a href="/dashboard/categories"><button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-3 rounded-lg mt-5 mr-3 text-sm lg:text-md">Kembali</button></a>
          <button type="submit" class="text-sm lg:text-md bg-primary hover:bg-red-700 text-white font-bold p-3 rounded-lg mt-5">Buat Kategori</button>
        </div>
      </form>
    </div>

    <div class="mb-96"></div>

  </div>
@endsection
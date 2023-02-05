@extends('dashboard.layouts.main')

@section('container')
<h1 class="font-bold mb-5 text-4xl">Tambah Post</h1>

<form>
  <div class="mb-6">
    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
    <input type="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('title') is-invalid @enderror" placeholder="title" required value="{{ old('title') }}">
    @error('title')
          {{ $message }}
      @enderror
  </div>
  <div class="mb-6">
    <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
    <input type="slug" id="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('slug') is-invalid @enderror" required value="{{ old('slug') }}">
    @error('slug')
          {{ $message }}
      @enderror
  </div>

  <div class="mb-6">
    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">category</label>
    <select class="form-select" name="category_id">
      @foreach ($category as $cat)
      @if (old('category_id') == $cat->id)
        <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
      @else
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
      @endif
      @endforeach
    </select>
  </div>
  
  <div class="mb-6">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload Image</label>
      <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('image') is-invalid @enderror" name="image" id="image" type="file" onchange="previewImage()">
    @error('image')
          {{ $message }}
    @enderror
  </div>

  <div class="mb-3">
    <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
    @error('body')
        <p class="text-danger">{{ $message }}</p>
    @enderror
      <input id="body" type="hidden" name="body" value="{{ old('body') }}">
      <trix-editor input="body"></trix-editor>
  </div>

  
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
@endsection
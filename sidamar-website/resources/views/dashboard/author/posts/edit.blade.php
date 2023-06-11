@extends('dashboard.layouts.main')

@section('container')
<h1 class="font-bold mb-5 text-4xl">Edit Post</h1>

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

<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded-lg px-8 pt-6 pb-8 mb-4">
  @csrf
  @method('PATCH')
  <div class="mb-6">
    <label for="title" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Title</label>
    <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('title') is-invalid @enderror" placeholder="title" required value="{{ $post->title }}">
    @error('title')
          {{ $message }}
      @enderror
  </div>

  <div class="mb-6">
    <label for="category" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Category</label>
    <select class="rounded-lg" name="category_id">
      @foreach ($category as $cat)
      @if (old('category_id', $post->category_id) == $cat->id)
        <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
      @else
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
      @endif
      @endforeach
    </select>
  </div>
  
  <div class="mb-6">
    <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white" for="image">Upload Image</label>
    <img class="img-preview img-fluid mb-3 w-96">
    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('image') is-invalid @enderror" name="image" id="image" type="file" onchange="previewImage()">
    @error('image')
          {{ $message }}
    @enderror
  </div>

  <div class="mb-3">
    <label for="body" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Body</label>
    @error('body')
        <p class="text-danger">{{ $message }}</p>
    @enderror
      <input id="body" type="hidden" name="body" value="{{ $post->body }}">
      <trix-editor input="body"></trix-editor>
  </div>

  
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function(){
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })

  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }
  
</script>

@endsection
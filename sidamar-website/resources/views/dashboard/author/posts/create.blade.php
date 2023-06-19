@extends('dashboard.layouts.main')

@section('container')
<h1 class="font-bold mb-5 text-4xl">Tambah Post</h1>

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
  <form action="/dashboard/posts" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded-lg px-8 pt-6 pb-8 mb-4">
    @csrf
    <div class="mb-6">
      <label for="title" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Judul</label>
      <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('title') is-invalid @enderror" placeholder="title" required value="{{ old('title') }}">
      @error('title')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-6">
      <label for="slug" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Slug</label>
      <input type="text" id="slug" name="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('slug') is-invalid @enderror" placeholder="slug" required value="{{ old('slug') }}">
      @error('slug')
            {{ $message }}
        @enderror
    </div>

    <div class="mb-6">
      <label for="category" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Kategori</label>
      <select class="rounded-lg" name="category_id">
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
      <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white" for="image">Unggah gambar</label>
      <img class="img-preview img-fluid mb-3 w-96">
      <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('image') is-invalid @enderror" name="image" id="image" type="file" onchange="previewImage()">
      @error('image')
            {{ $message }}
      @enderror
    </div>

    <div class="mb-3">
      <label for="body" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Isi</label>
      @error('body')
          <p class="text-danger">{{ $message }}</p>
      @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
        <trix-editor input="body"></trix-editor>
    </div>

    
    {{-- <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button> --}}
    <div class="flex justify-end">
      <a href="/dashboard/posts"><button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-3 rounded-lg mt-5 mr-3 text-sm lg:text-md">Kembali</button></a>
      <button type="submit" class="text-sm lg:text-md bg-primary hover:bg-red-700 text-white font-bold p-3 rounded-lg mt-5">Buat Post</button>
    </div>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function() {
        $('#title').on('change', function() {
            var title = $(this).val();
            if(title) {
                $.ajax({
                    url: '{{ route("posts.checkSlug") }}',
                    type: 'POST',
                    data: {
                        'title': title,
                        '_token': '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#slug').val(data.slug);
                    }
                });
            }
        });
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
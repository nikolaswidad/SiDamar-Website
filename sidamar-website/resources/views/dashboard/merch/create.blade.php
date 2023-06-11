@extends('dashboard.layouts.main')

@section('container')
<h1 class="font-bold mb-5 text-4xl">Tambahkan Merchandise</h1>

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

    <div name="merch">
      <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="mt-5 md:col-span-2 md:mt-0 ">
            <form action="/dashboard/merch" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="shadow sm:overflow-hidden sm:rounded-md">
                <div class="space-y-3 bg-white px-3 py-5 sm:p-6">

                  <div class="col-span-6 sm:col-span-3">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><br>Title</label>
                    <input type="text" id="title" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm @error('title') is-invalid @enderror" required value="{{ old('title') }}">
                    @error('title')
                      {{ $merches }}
                    @enderror
                  </div>

                  <div class="mb-6">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input type="text" id="price" name="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm @error('price') is-invalid @enderror" required value="{{ old('price') }}">
                    @error('title')
                          {{ $merches }}
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    @error('desc')
                        <p class="text-danger">{{ $merches }}</p>
                    @enderror
                      <input id="desc" type="hidden" name="desc" value="{{ old('desc') }}">
                      <trix-editor input="desc"></trix-editor>
                  </div>

                  <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload Image</label>
                      <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('image') is-invalid @enderror" name="image" id="image" type="file" onchange="previewImage()">
                    @error('image')
                          {{ $merches }}
                    @enderror
                  </div>
                </div>
              </div>
              <div>
                <a href="/dashboard/merch"><button type="button" class="text-white bg-gradient-to-r from-yellow-200 via-yellow-300 to-yellow-400 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 ">Back</button></a>
                <button type="submit" class="mt-2 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline ">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

<script>
  const title = document.querySelector('#title');

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
@extends('dashboard.layouts.main')

@section('container')
<h1 class="text-4xl font-semibold font-montserrat">Ubah Event Donasi</h1>

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

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal-{{ $donation->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                <div class="max-w-5xl">
                    <hr class="bg-slate-200 mt-5 max-w-3xl">
                    <form action="{{ route('donation.update', $donation->id) }}" method="POST" class="max-w-3xl mt-8 mb-8 font-montserrat">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        {{-- <div class="form-group mb-6 col-span-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload Image</label>
                              <input class="form-control block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('image') is-invalid @enderror" name="image" id="image" type="file" onchange="previewImage()" value="{{ $donation->image }}">
                            @error('image')
                                  {{ $message }}
                            @enderror
                        </div> --}}

                        <div class="form-group mb-6 col-span-6">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><br>title</label>
                            <input type="text" name="title" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('title') is-invalid @enderror" id="title" value="{{ $donation->title }}" required>   
                            @error('title')
                                {{ $donation }}
                            @enderror
                        </div>
                        <div class="form-group mb-6 col-span-6">
                            <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            @error('body')
                                <p class="text-danger">{{ $donation }}</p>
                            @enderror
                            <input id="body" type="hidden" name="body" value="{{ $donation->body }}" required>
                            <trix-editor input="body"></trix-editor>
                             
                        </div>
                        <div class="form-group mb-6 col-span-6">
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dateline</label>
                            <input type="date" name="date" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('date') is-invalid @enderror" id="date" value="{{ $donation->date }}" required>   
                            @error('date')
                                {{ $donation }}
                            @enderror
                        </div>

                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div> 
            </div>
        </div>
</div>
<script>
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
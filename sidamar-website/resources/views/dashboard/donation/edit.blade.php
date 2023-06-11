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
      <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="mt-5 md:col-span-2 md:mt-0 ">
            <form action="{{ route('donation.update', $donation->id) }}" method="POST" class="max-w-3xl mt-8 mb-8 font-montserrat">
              <input type="hidden" name="_method" value="PUT">
              @csrf
                <div class="shadow sm:overflow-hidden sm:rounded-md">
                  <div class="space-y-3 bg-white px-3 py-5 sm:p-6">

                    <div class="form-group mb-6 col-span-6">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><br>Title</label>
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

                  </div>
                </div>
                <div>
                  <a href="/dashboard/donation"><button type="button" class="text-white bg-gradient-to-r from-yellow-200 via-yellow-300 to-yellow-400 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 ">Back</button></a>
                  <button type="submit" class="mt-2 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline ">Submit</button>
                </div>
              </form>
            </div> 
          </div>
        </div>
      </div>
      
@endsection
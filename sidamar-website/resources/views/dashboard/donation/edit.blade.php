@extends('dashboard.layouts.main')

@section('container')
  <h1 class="text-4xl font-semibold font-montserrat">Ubah Event Donasi</h1>
  <hr class="bg-slate-200 mt-5 max-w-3xl">
  
    @if (count($errors)>0)
      @foreach ($errors->all() as $error)
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
          <span class="font-medium">{{ $error }}</span> Isi setiap kolom pengisian dengan benar
        </div>
      @endforeach
    @endif

    @if (Session::has('success'))
      <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">{{ Session('success') }}</span>
      </div>
    @endif

    <!-- Edit Modal -->
    <div class="" id="editModal-{{ $donation->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="mt-5 md:col-span-2 md:mt-0 ">
            <form action="{{ route('donation.update', $donation->id) }}" method="POST" class="max-w-4xl font-montserrat">
              <input type="hidden" name="_method" value="PUT">
              @csrf
                <div class="sm:overflow-hidden sm:rounded-md">
                  <div class="space-y-4">

                    <div class="form-group mb-6 col-span-6">
                        <label for="title" class="block text-gray-700 text-lg font-bold mb-2"><br>Nama Event Donasi</label>
                        <input type="text" name="title" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('title') is-invalid @enderror" id="title" value="{{ $donation->title }}" required>   
                        @error('title')
                            {{ $donation }}
                        @enderror
                    </div>

                    <div class="form-group mb-6 col-span-6">
                        <label for="body" class="block text-gray-700 text-lg font-bold mb-2">Deskrpsi</label>
                        @error('body')
                            <p class="text-danger">{{ $donation }}</p>
                        @enderror
                        <input id="body" type="hidden" name="body" value="{{ $donation->body }}" required>
                        <trix-editor input="body"></trix-editor>                        
                    </div>

                    <div class="form-group mb-6 col-span-6">
                        <label for="date" class="block text-gray-700 text-lg font-bold mb-2">Tanggal Donasi</label>
                        <input type="date" name="date" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('date') is-invalid @enderror" id="date" value="{{ $donation->date }}" required>   
                        @error('date')
                            {{ $donation }}
                        @enderror
                    </div>

                  </div>
                </div>
                <div class="flex justify-end">
                  <a href="/dashboard/donation"><button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-3 rounded-lg mt-5 mr-3 text-sm lg:text-md">Kembali</button></a>
                  <button type="submit" class="text-sm lg:text-md bg-primary hover:bg-red-700 text-white font-bold p-3 rounded-lg mt-5 ">Simpan</button>
                </div>
              </form>
            </div> 
          </div>
        </div>
      </div>
      
@endsection
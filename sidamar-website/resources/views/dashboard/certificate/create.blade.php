@extends('dashboard.layouts.main')

@section('container')
  <div class="max-w-7xl font-montserrat">
    <h1 class="font-bold mb-5 text-4xl">Tambah Sertifikat</h1>
    <hr class="bg-slate-200 mt-5 max-w-3xl">
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
  
  {{-- <div class="w-full flex"> --}}
  <form action="/dashboard/certificate" method="POST" enctype="multipart/form-data" class="max-w-2xl mt-8 mr-8 pb-8 mb-4">
    @csrf
    <div class="mb-3">
      <label for="nama" class="block text-gray-700 text-lg font-bold mb-2">Nama</label>
      <input type="text" id="nama" name="nama" class="h-11 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('nama') is-invalid @enderror" placeholder="nama" required value="{{ $user->name }}">
      
        @error('nama')
            {{ $message }}
        @enderror
    </div>
    
    <div class="mb-3">
      <label for="event_id" class="block text-gray-700 text-lg font-bold mb-2">Nama Event</label>
    <select class="h-11 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="event_id" value="{{ old('event_id') }}>
        <option value="">Pilih Event</option>
        @foreach ($event as $e)
        @if (old('event_id') == $e->title)
          <option value="{{ $e->id }}" selected data-date="{{ $e->date }}">{{ $e->title }}</option>
        @else
          <option value="{{ $e->id }}" data-date="{{ $e->date }}">{{ $e->title }}</option>
        @endif
        @endforeach
      </select>
    </div>
  
    <label for="tanggal" class="block text-gray-700 text-lg font-bold mb-2">Tanggal</label>
  <input type="date" id="tanggal" name="tanggal" class="h-11 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly value="{{ old('tanggal') }}">
  
    <input type="hidden" name="status" value="1">
    <div class="flex justify-end">
      <a href="/dashboard/certificate"><button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-3 rounded-lg mt-5 mr-3 text-sm lg:text-md">Kembali</button></a>
      <button type="submit" class="text-sm lg:text-md bg-primary hover:bg-red-700 text-white font-bold p-3 rounded-lg mt-5 ">Submit</button>

    </div>
  </form>
    {{-- <div class="flex-shrink-0 mt-28 md:mt-10 w-1/2">
      <img class="rounded-r-lg shadow" src="https://source.unsplash.com/655x373?seminar" alt="">
    </div> --}}
    </div>

  </div>



<script>
  const titleSelect = document.querySelector('select[name="event_id"]');
  const tanggalInput = document.querySelector('input[name="tanggal"]');

  titleSelect.addEventListener('change', function() {
      const selectedOption = this.options[this.selectedIndex];
      const selectedDate = selectedOption.getAttribute('data-date');
      tanggalInput.value = selectedDate;
  });
</script>
@endsection
@extends('dashboard.layouts.main')

@section('container')
<h1 class="font-bold mb-5 text-4xl">Add Certificate</h1>

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

<form action="/dashboard/certificate" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-6">
    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
    <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('event') is-invalid @enderror" placeholder="event" required value="{{ $user->name }}">
    @error('event')
          {{ $message }}
      @enderror
  </div>
  
  <div class="mb-6">
    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Title</label>
    <select class="rounded-lg" name="title">
      <option value="">Pilih Event</option>
      @foreach ($event as $e)
      @if (old('title') == $e->title)
        <option value="{{ $e->title }}" selected data-date="{{ $e->date }}">{{ $e->title }}</option>
      @else
        <option value="{{ $e->title }}" data-date="{{ $e->date }}">{{ $e->title }}</option>
      @endif
      @endforeach
    </select>
  </div>

  <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
  <input type="text" id="tanggal" name="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  readonly>

  

  <input type="hidden" name="status" value="1">
                          
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>

<script>
  const titleSelect = document.querySelector('select[name="title"]');
  const tanggalInput = document.querySelector('input[name="tanggal"]');

  titleSelect.addEventListener('change', function() {
      const selectedOption = this.options[this.selectedIndex];
      const selectedDate = selectedOption.getAttribute('data-date');
      tanggalInput.value = selectedDate;
  });
</script>
@endsection
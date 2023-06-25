@extends('dashboard.layouts.main')

@section('container')
  <div class="max-w-7xl font-montserrat">
    <h1 class="text-4xl font-semibold font-montserrat">Buat Acara</h1>
    <hr class="bg-slate-200 mt-5 max-w-3xl">
  
    <div>
      <div class="max-w-2xl">
        <div class="mt-5 md:col-span-2 md:mt-0 ">
        <form action="/dashboard/events" method="POST">
          @csrf
            <div class="sm:overflow-hidden sm:rounded-md">
              <div class="mt-8">  

                <div class="col-span-6 mb-5">
                  <label for="title" class="block text-gray-700 text-lg font-bold">Nama Acara</label>
                  <input type="text" name="title" id="title" autocomplete="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-base" value="{{ old('title') }}">
                  @error('title')
                      <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                  @enderror
                </div>
  
                <div class="col-span-6 mb-5">
                  <label for="category_id" class="block text-gray-700 text-lg font-bold">Kategori</label>
                  <select id="category_id" name="category" autocomplete="category_id" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm sm:text-base">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->name }}" {{ (old('category')) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                    {{-- if it has old value, selected --}}
                    <option value="1" {{ (old('category') == 1) ? 'selected' : '' }}>Pendidikan</option>
                    </select>
                    @error('category')
                      <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                  </div>
                
                <div class="col-span-6 mb-5">
                  <label for="description" class="block text-gray-700 text-lg font-bold">Deskripsi</label>
                  <div class="mt-1">
                    <textarea id="description" name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-base" placeholder="Deskripsi Acara" >{{ old('description') }}</textarea>
                  </div>
                  @error('description')
                    <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                  @enderror
                </div>
  
                <div class="col-span-6 mb-5">
                  <label for="date" class="block text-gray-700 text-lg font-bold">Tanggal</label>
                  <input type="date" name="date" id="date" autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-base" value="{{ old('date') }}">
                  @error('date')
                    <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                  @enderror

                </div>
  
                <div class="col-span-6 mb-5">
                  <label for="time" class="block text-gray-700 text-lg font-bold">Waktu</label>
                  <input type="time" name="time" id="time" autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-base" value="{{ old('time') }}">
                  @error('time')
                    <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                  @enderror
                </div>
  
                <div class="col-span-6 mb-5">
                  <label for="date_notification" class="block text-gray-700 text-lg font-bold">Waktu Notifikasi</label>
                  <input type="date" name="date_notification" id="date_notification" autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-base" value="{{ old('date_notification') }}">
                  @error('date_notification')
                    <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                  @enderror
                </div>
  
              <div class="col-span-6 mb-5">
                <label for="location" class="block text-gray-700 text-lg font-bold">Lokasi</label>
                <input type="text" name="location" id="location" autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-base" value="{{ old('location') }}">
                @error('location')
                  <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="col-span-6 mb-5">
                <label for="url" class="block text-gray-700 text-lg font-bold">Google Maps URL</label>
                <span>Contoh : Universitas Diponegoro - <a href="https://goo.gl/maps/XF6ZaHtvd7jHnA5R7" class="hover:text-primary" target="_blank">https://goo.gl/maps/XF6ZaHtvd7jHnA5R7</a></span>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" name="url" id="url" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 sm:text-base" placeholder="https://goo.gl/maps/XF6ZaHtvd7jHnA5R7" value="{{ old('url') }}">
                </div>
                @error('url')
                  <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                @enderror
              </div>
  
              </div>
                <div class="flex justify-end max-w-full">
                  <a href="/dashboard/events" class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-3 rounded-lg mt-5 mr-3">Kembali</a>
                  <button type="submit" class="bg-primary hover:bg-red-700 text-white font-bold p-3 rounded-lg mt-5">Buat Acara</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="mb-16"></div>
  </div>
      
@endsection
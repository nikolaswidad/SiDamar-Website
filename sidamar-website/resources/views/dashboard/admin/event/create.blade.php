@extends('dashboard.layouts.main')

@section('container')
  <div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="mt-5 md:col-span-2 md:mt-0 ">
      <form action="/dashboard/events" method="POST">
        @csrf
          <div class="shadow sm:overflow-hidden sm:rounded-md">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

            <label for="title" class="block text-lg font-bold text-gray-700">Buat Acara</label>
              <div class="col-span-6">
              <label for="title" class="block text-sm font-medium text-gray-700">Nama Acara</label>
              <input type="text" name="title" id="title" autocomplete="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
              </div>

              <div class="col-span-6 sm:col-span-3">
              <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
              <select id="category_id" name="category_id" autocomplete="category_id" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-primary focus:outline-none focus:ring-primary sm:text-sm">
                <option selected disabled>Pilih Kategori</option>
                {{-- @foreach ($categories as $category)
                  <option value="{{ $category->id }}" >{{ $category->name }}</option>
                  @endforeach --}}
                  <option value="event" >Event</option>
                  <option value="production" >Production</option>
                  <option value="donation" >donation</option>
                </select>
              </div>
              
              <div>
              <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <div class="mt-1">
                <textarea id="description" name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm" placeholder="Produksi Film"></textarea>
                </div>
              </div>

              <div>
              <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
              <input type="date" name="date" id="date" autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
              </div>

              <div>
              <label for="time" class="block text-sm font-medium text-gray-700">Waktu</label>
              <input type="time" name="time" id="time" autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
              </div>

              <div>
              <label for="date_notification" class="block text-sm font-medium text-gray-700">Waktu Notifikasi</label>
              <input type="date" name="date_notification" id="date_notification" autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
  </div>

            <div>
              <label for="location" class="block text-sm font-medium text-gray-700">Lokasi</label>
              <input type="text" name="location" id="location" autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
    </div>
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="url" class="block text-sm font-medium text-gray-700">Google Maps URL</label>
                <span>Contoh : Universitas Diponegoro - <a href="https://goo.gl/maps/XF6ZaHtvd7jHnA5R7" class="hover:text-primary" target="_blank">https://goo.gl/maps/XF6ZaHtvd7jHnA5R7</a></span>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" name="url" id="url" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-primary focus:ring-primary sm:text-sm" placeholder="https://goo.gl/maps/XF6ZaHtvd7jHnA5R7">
  </div>
    </div>
  </div>

            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-primary py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-primaryDarken focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
      
@endsection
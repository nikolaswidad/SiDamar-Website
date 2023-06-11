@extends('layouts.main')

@section('container')
  <div>
    <div class="md:grid py-6 px-12 md:gap-6">
      <div class="mt-5 md:col-span-2 md:mt-0 ">
        <form action="#" method="POST">
          <div class="shadow sm:overflow-hidden sm:rounded-md">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

              <label for="event" class="block text-lg font-bold text-gray-700">Donasi untuk SI DAMAR</label>
              <div class="col-span-6 sm:col-span-3">
                <label for="country" class="block text-sm font-medium text-gray-700">Pilih Event</label>
                <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-primary focus:outline-none focus:ring-primary sm:text-sm">
                  <option>Event 1</option>
                  <option>Event 2</option>
                  <option>Event 3</option>
                  <option>Event 4</option>
                </select>
              </div>

              <div class="col-span-6">
                <label for="event" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="event" id="event" autocomplete="event" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
              </div>


              <div class="col-span-6">
                <label for="event" class="block text-sm font-medium text-gray-700">Nomor Handphone</label>
                <input type="text" name="event" id="event" autocomplete="event" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
              </div>


              <div class="col-span-6">
                <label for="event" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" name="event" id="event" autocomplete="event" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
              </div>


              <div class="col-span-6">
                <label for="event" class="block text-sm font-medium text-gray-700">Total Donasi</label>
                <input type="text" name="event" id="event" autocomplete="event" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
              </div>

              <div class="mt-4 space-y-4">
                <label for="event" class="block text-sm font-medium text-gray-700">Jenis Pembayaran</label>
                <div class="flex items-center">
                  <input id="push-everything" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-primary focus:ring-primary">
                  <label for="push-everything" class="ml-3 block text-sm font-medium text-gray-700">Bank BNI (123456789)</label>
                </div>
                <div class="flex items-center">
                  <input id="push-email" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-primary focus:ring-primary">
                  <label for="push-email" class="ml-3 block text-sm font-medium text-gray-700">Bank BCA (162663778)</label>
                </div>
                <div class="flex items-center">
                  <input id="push-nothing" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-primary focus:ring-primary">
                  <label for="push-nothing" class="ml-3 block text-sm font-medium text-gray-700">QRIS</label>
                </div>
                
              </div>
              <div>
                <img class="h-48 w-full object-cover md:h-full md:w-48 justify-center" src="https://i.postimg.cc/KvYdNW2F/qris-erickunto.jpg" alt="">
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700">Bukti Pembayaran</label>
                <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                  <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                      <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                      <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-primary focus-within:outline-none focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-2 hover:text-primary">
                        <span>Upload a file</span>
                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                      </label>
                      <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-primary py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-primaryDarken focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
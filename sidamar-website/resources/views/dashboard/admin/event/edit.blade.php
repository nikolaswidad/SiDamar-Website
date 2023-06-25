@extends('dashboard.layouts.main')

@section('container')
    <div class="max-w-7xl font-montserrat">
        <h1 class="text-4xl font-semibold font-montserrat">Edit Event</h1>
        <hr class="bg-slate-200 mt-5 max-w-3xl">
        
        @if (Session::has('success'))
        <div class="max-w-full font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
            <span class="font-medium">{{ Session('success') }}</span>
        </div>
        @endif
    
        <div class="max-w-2xl">
            <div class="md:col-span-2 md:mt-0 ">
            <form action="/dashboard/events/{{ $event->id }}" method="POST">
                @method('put')
                @csrf
                <div class="sm:overflow-hidden sm:rounded-md">
                <div class="mt-8">
                    <div class="col-span-6 mb-5">
                        <label for="title" class="block text-gray-700 text-lg font-bold mb-2">Nama Acara</label>
                        <input type="text" name="title" id="title" autocomplete="title"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" value="{{ old('title') ?? $event->title }}">
                        @error('title')
                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="col-span-6 sm:col-span-3 mb-5">
                        <label for="category" class="block text-gray-700 text-lg font-bold mb-2">Kategori</label>
                        <select id="category" name="category" autocomplete="category" value="{{ old('category') ?? $event->category_id }}" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm sm:text-sm">
                            @foreach ($categories as $category)
                                <option value="{{ old('category', $category->name) }}" {{ $event->category_id == $category->id ? 'selected' : '' }} >{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-5">
                        <label for="description" class="block text-gray-700 text-lg font-bold mb-2">Deskripsi</label>
                        <div class="mt-1">
                            <textarea id="description" name="description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="Produksi Film">{{ old('description') ?? $event->description }}</textarea>
                        </div>
                        @error('description')
                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="mb-5">
                        <label for="date" class="block text-gray-700 text-lg font-bold mb-2">Tanggal</label>
                        <input type="date" name="date" id="date" autocomplete="email" value="{{ old('date') ?? $event->date }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                        @error('date')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="mb-5">
                        <label for="time" class="block text-gray-700 text-lg font-bold mb-2">Waktu</label>
                        <input type="time" name="time" id="time"  value="{{ old('time') ?? $event->time }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                        @error('time')
                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-5">
                        <label for="date_notification" class="block text-gray-700 text-lg font-bold mb-2">Waktu Notifikasi</label>
                        <input type="date" name="date_notification" id="date_notification" value="{{ old('date_notification') ?? $event->date_notification }}" autocomplete="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                        @error('date_notification')
                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="mb-5">
                        <label for="location" class="block text-gray-700 text-lg font-bold mb-2">Lokasi</label>
                        <input type="text" name="location" id="location" value="{{ old('location') ?? $event->location }}"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                        @error('location')
                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="mb-5">
                        <label for="url" class="block text-gray-700 text-lg font-bold mb-2">Google Maps URL</label>
                        <span>Contoh : Universitas Diponegoro - <a href="https://goo.gl/maps/XF6ZaHtvd7jHnA5R7" target="_blank">https://goo.gl/maps/XF6ZaHtvd7jHnA5R7</a></span>
                        <div class="mt-1 flex rounded-md">
                            <input type="text" name="url" id="url" value="{{ old('url') ?? $event->url }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 sm:text-sm" placeholder="https://goo.gl/maps/XF6ZaHtvd7jHnA5R7">
                        </div>
                        @error('url')
                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <a href="/dashboard/events" class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-3 rounded-lg mt-5 mr-3">Kembali</a>
                        <button type="submit" class="bg-primary hover:bg-red-700 text-white font-bold p-3 rounded-lg mt-5">Simpan Perubahan</button>
                    </div>
                </div>
                </div>
            </form>
            </div>
        </div>
        <div class="mb-20"></div>
    </div>
@endsection
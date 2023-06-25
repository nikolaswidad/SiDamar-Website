@extends('dashboard.layouts.main')

@section('container')
    <div class="max-w-7xl font-montserrat">
        <h1 class="text-4xl font-semibold font-montserrat">Detail {{ $event->category }} : {{ $event->title }}</h1>
        <hr class="bg-slate-200 mt-5 max-w-sm">
        @if (Session::has('success'))
            <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
                {{ session('success') }}
            </div>
        @endif
    
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:col-span-2 md:mt-0">
                <div class="rounded-lg overflow-hidden">
                    <div class="py-6">
                        <div class="mb-2">
                            <label for="location" class="text-xl font-bold text-gray-700 col-span-1">Lokasi </label>
                            <label for="location" class="text-xl font-bold text-gray-700 col-start-1">&emsp; :</label>
                            <a href="{{ $event->url }}" target="_blank" class="text-primary hover:text-primaryLighten">&emsp; {{ $event->location }}</a>
                        </div>
                        <div class="mb-2">
                            <label for="datetime" class="text-lg font-bold text-gray-700">Waktu </label>
                            <label for="location" class="text-xl font-bold text-gray-700 col-start-1"> &nbsp;</label>
                            <label for="location" class="text-xl font-bold text-gray-700 col-start-1">&emsp;:</label>
                            <span class="text-gray-800">&emsp; {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</span>
                        </div>
                        <div class="mb-2">
                            <label for="date" class="text-lg font-bold text-gray-700">Tanggal </label>
                            <label for="location" class="text-xl font-bold text-gray-700 col-start-1">&emsp;:</label>
                            <span class="text-gray-800">&emsp;{{ $event->date }}</span>
                        </div>
                        <div class="mb-2">
                            <label for="description" class="text-lg font-bold text-gray-700">Deskripsi</label>
                            <label for="location" class="text-xl font-bold text-gray-700 col-start-1">&ensp;:</label>
                            <p class="text-gray-800 mt-1">{{ $event->description }}</p>
                        </div>
                        <div class="flex justify-end">
                            <a href="/dashboard/events" class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-3 rounded-lg mt-5 mr-3">Kembali ke Daftar Events</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
@endsection
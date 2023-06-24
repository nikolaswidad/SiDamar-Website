@extends('dashboard.layouts.main')

@section('container')
    @if (Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">{{ Session('success') }}</span>
        </div>
    @endif

    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="mt-5 md:col-span-2 md:mt-0">
            <div class="shadow bg-white rounded-lg overflow-hidden">
                <div class="p-6 space-y-6">
                    <h2 class="text-2xl font-bold text-gray-800">{{ $event->category }}: {{ $event->title }}</h2>
                    <div>
                        <label for="location" class="text-lg font-bold text-gray-700">Lokasi:</label>
                        <a href="{{ $event->url }}" target="_blank" class="text-primary hover:text-primaryLighten">{{ $event->location }}</a>
                    </div>
                    <div>
                        <label for="datetime" class="text-lg font-bold text-gray-700">Waktu:</label>
                        <span class="text-gray-800">{{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</span>
                        <label for="date" class="text-lg font-bold text-gray-700 ml-4">Tanggal:</label>
                        <span class="text-gray-800">{{ $event->date }}</span>
                    </div>
                    <div>
                        <label for="description" class="text-lg font-bold text-gray-700">Deskripsi:</label>
                        <p class="text-gray-800">{{ $event->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
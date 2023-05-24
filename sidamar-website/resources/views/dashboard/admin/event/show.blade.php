@extends('dashboard.layouts.main')

@section('container')
    @if (Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">{{ Session('success') }}</span>
        </div>
    @endif

    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="mt-5 md:col-span-2 md:mt-0 ">
            <div class="shadow sm:overflow-hidden sm:rounded-md">
                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                    <label for="title" class="block text-lg font-bold text-gray-700">{{ $event->category->name }} : {{ $event->title }}</label>
                    <label for="title" class="block text-lg text-gray-700">
                        <label for="">Lokasi : </label>
                        <a href="{{ $event->url }}" target="_blank" class="text-primary hover:text-primaryLighten">
                            {{ $event->location }} 
                        </a>
                    </label>
                    <label for="title" class="block text-lg text-gray-700">Waktu : {{ $event->time }} | Tanggal : {{ $event->date }}</label>
                    <label for="title" class="block text-lg text-gray-700">Deskripsi :</label>
                    <label for="title" class="block text-lg text-gray-700">{{ $event->description }}</label>
                </div>
            </div>
        </div>
    </div>
@endsection
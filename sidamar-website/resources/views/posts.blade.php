@extends('layouts.main')

@section('container')
<!-- Text Header -->
<header class="w-full container mx-auto">
  <div class="flex flex-col items-center py-12">
      <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
          Sidamar Blog
      </a>
      <p class="text-lg text-gray-600">
          Lorem Ipsum Dolor Sit Amet
      </p>
  </div>
</header>
@foreach ($data as $post)

{{-- main card --}}
<a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
{{-- setting image --}}
  @if ($post->image)
    <div style="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg">
      <img src="{{ asset($post->image) }}" alt="img" style="width: 100px" alt="{{ $post->category->name }}">
    </div>
  @else
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://source.unsplash.com/700x1000?{{ $post->category->name }}" style="width: 100px" alt="{{ $post->category->name }}">
  @endif

  <div class="flex flex-col justify-between p-4 leading-normal">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
  </div>
</a>
@endforeach

@endsection
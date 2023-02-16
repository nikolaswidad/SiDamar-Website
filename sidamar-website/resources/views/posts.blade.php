@extends('layouts.main')

@section('container')
<!-- Text Header -->
<header class="w-full container mx-auto">
  <div class="flex flex-col items-center py-12">
      <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
          Sidamar Blog
      </a>
      <p class="text-lg text-gray-600">
          Sineas Muda Semarang Blog
      </p>
  </div>
</header>

<div class="pb-12 ">  
    <!-- container for all cards -->
    <div class="container ">
      <!-- card -->
      <a href="#" class="flex flex-col md:flex-row overflow-hidden bg-white rounded-xl shadow mt-4 w-100 hover:bg-gray-100">
        <!-- media -->
        {{-- <div class="h-64 w-auto md:w-1/2">
          <img class="inset-0 border-none h-full w-full object-cover object-center" src="{{  asset($data[0]->image)  }}" />
        </div> --}}
        @if ($data[0]->image)
          <div class="h-64 w-auto md:w-1/2">
            <img class="inset-0 border-none h-full w-full object-cover object-center" src="{{  asset($data[0]->image)  }}" />
          </div>
        @else
          <div class="h-64 w-auto md:w-1/2">
            <img class="inset-0 border-none h-full w-full object-cover object-center" src="https://source.unsplash.com/500x1000?{{ $data[0]->category->name }}" />
          </div>
        @endif

        <!-- content -->
        <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
          <h3 class="text-4xl font-bold leading-tight truncate">{{ $data[0]->title }}</h3>
          <p class="mt-2">
            {{ $data[0]->excerpt }}
          </p>
          <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2">
            {{ $data[0]->author->name }}
          </p>
          {{-- <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2">
            Author
          </p> --}}
        </div>
      </a><!--/ card-->
    </div><!--/ container-->
</div>

{{-- main card --}}
<div class="container">
  {{-- mx-auto flex flex-wrap --}}
  <section class=" w-full md:w-2/3 flex items-center px-3 bg-slate-100">
    <a href="#" class="flex bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    {{-- setting image --}}
      @if ($data[0]->image)
        <div style="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg">
          <img src="{{ asset($data[0]->image) }}" alt="img" style="width: 100px" alt="{{ $data[0]->category->name }}">
        </div>
      @else
        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://source.unsplash.com/700x1000?{{ $data[0]->category->name }}" style="width: 100px" alt="{{ $data[0]->category->name }}">
      @endif

      <div class="flex flex-col justify-between p-4 leading-normal">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $data[0]->title }}</h5>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are {{ $data[0]->excerpt }}</p>
      </div>
    </a>
{{-- <div class="flex-row inline">
    @foreach ($data->skip(1) as $post)
    
      <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            @if ($data[0]->image)
              <div style="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg">
                <img src="{{ asset($data[0]->image) }}" alt="img" style="width: 100px" alt="{{ $data[0]->category->name }}">
              </div>
            @else
              <img class="rounded-t-lg" src="https://source.unsplash.com/1700x900?{{ $data[0]->category->name }}" alt="{{ $data[0]->category->name }}">
            @endif
        </a>
        <div class=" p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->excerpt }}</p>
            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
      </div>
    
    @endforeach </div>
  </section>
  <aside class="w-full md:w-1/3 flex flex-col items-center px-3 bg-purple-300">
  </aside>

</div> --}}


@endsection
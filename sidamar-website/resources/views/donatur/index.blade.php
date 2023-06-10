@extends('layouts.main')

@section('container')

    <div class="container mx-auto">
        <div  class="-mx-4 flex flex-wrap justify-center">
            <div class="w-full px-4">
                <div class="mx-auto mb-1 max-w-[510px] text-center lg:mb-20">
                    <span class="text-dark mb-2 sm:text-3xl block text-lg font-semibold">
                        Our Upcoming Event
                    </span>
                    <a class="text-primary hover:text-dark mb-1 text-3xl font-bold sm:text-4xl md:text-[40px]" href="/donatur/create">
                        Click to donate!
                        
                    </a>
                    <p class="text-body-color text-base mt-3">
                      Membantu Sesama Manfaat paling utama yang sebenarnya terkandung di dalam kegiatan berdonasi ini ialah mampu membantu sesama kepada mereka yang membutuhkan uluran tangan.
                      </p>
                </div>
            </div>
        </div>
        @foreach ($donation as $donate)
        <ul>
        <div class="mx-auto mb-10 max-w-[1200px]">  
          <!-- container for all cards -->
          <div class="container ">
            <!-- card -->
            <a href="./donatur/create" class="flex flex-col md:flex-row overflow-hidden bg-white rounded-xl shadow mt-4 w-100 hover:bg-gray-100">

              @if ($donate->image)
              <div class="h-64 w-50 md:w-1/2">
                  <img class="inset-0 border-none h-full w-200 object-cover object-center" src="{{ asset($donate->image) }}" alt="img"  alt="{{ $donate->title }}">
              </div>
                @endif
      
              <!-- content -->
              <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
                <h3 class="text-4xl font-bold leading-tight truncate">{{ ucfirst($donate->title) }}</h3>
                <p class="mt-2">
                  {{ $donate->body}}
                </p>
                <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2">
                  {{ $donate->date}}
                </p>


              </div>
            </a><!--/ card-->
          </div><!--/ container-->
      </div>
    </ul>
    @endforeach
        </div>
    </div>

@endsection


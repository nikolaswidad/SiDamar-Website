{{-- @include('partials.navbar') --}}

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sidamar Website</title>
    <link rel="icon" type="/img/logo3.png" href="/img/logo3.png">
	<meta name="author" content="Nurida Larasati">
	<meta name="description" content="">

	<!-- Tailwind -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
	<style>
			@import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

			.font-family-karla {
					font-family: karla;
			}
	</style>

	<!-- AlpineJS -->
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
	<!-- Font Awesome -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>
@include('partials.navbar')
<body class="bg-white font-family-karla">
  
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
	{{-- <div class="mx-14 px-20">
        <img src="/arsipFilm/arsip_film.jpg" alt="arsipFilm" class="object-center object-cover shadow-lg sm:w-full sm:object-cover sm:h-52 sm:object-center md:text-6xl">
    </div> --}}
    
		<div class="container mx-auto flex flex-wrap py-6">
			<div class="w-full flex justify-center md:w-2/3 mb-4">
			<form action="/blog">   
				@if (request('category'))
				<input type="hidden" name="category" value="{{ request('category') }}">
						
				@endif
				@if (request('author'))
				<input type="hidden" name="author" value="{{ request('author') }}">
						
				@endif
				<label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
				<div class="relative">
					<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
						<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
					</div>
					<input type="text" id="search" name="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-96" placeholder="Search..." value="{{ request('search') }}" required>
					<button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
				</div>
			</form>
			</div>
			
	<!-- Posts Section -->
		<section class="w-full md:w-2/3 flex flex-col items-center px-3">
			

			@foreach ($data as $post)
				<article class="shadow my-4 flex flex-col rounded-lg">
					
					<!-- Article Image -->
					<a href="{{ route('isi', $post->slug) }}" class="hover:opacity-75">
						@if ($post->image)
							<div style="max-width: 100%; max-height: 300px; display: flex; justify-content: center; overflow:hidden">
								<a href="#" class="hover:opacity-75" style="max-width: 1000px;">
										<img class="rounded-t-lg" src="{{ asset('upload/posts/' . $post->image) }}" style="width: 100%;">
								</a>
							</div>
						@else
							<img class="rounded-t-lg" src="https://source.unsplash.com/1000x300?{{ $post->category->name }}" alt="{{ $post->category->name }}">
						@endif
					</a>
					<div class="bg-white flex flex-col justify-start p-6">
						<a href="/blog?category={{ $post->category->slug }}" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $post->category->name }}</a>
						<a href="{{ route('isi', $post->slug) }}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
						<p class="text-sm pb-3">
								By <a href="/blog?author={{ $post->author->name }}" class="font-semibold hover:text-gray-800">{{ $post->author->name }}</a>, Published on {{ $post->created_at->format('d/m/Y') }}
						</p>
						<a href="#" class="pb-6">{{ $post->excerpt }}</a>
						<a href="{{ route('isi', $post->slug) }}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
					</div>
				</article>
			@endforeach

	<!-- Pagination -->
		<div class="flex items-center py-8">
			<a href="{{$data->previousPageUrl()}}" class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center"><</a>
			@for($i=1;$i<=$data->lastPage();$i++)
				<!-- a Tag for another page -->
				<a href="{{$data->url($i)}}" class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center">{{$i}}</a>
			@endfor
			<!-- a Tag for next page -->
			<a href="{{$data->nextPageUrl()}}" class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">></a>
		</div>
				

		</section>

	<!-- Sidebar Section -->
		@include('blog.aside')

    </div>
	@include('blog.footer')

    {{-- <footer class="w-full border-t bg-white pb-12">
        <div
            class="relative w-full flex items-center invisible md:visible md:pb-12"
            x-data="getCarouselData()"
        >
            <button
                class="absolute bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 ml-12"
                x-on:click="decrement()">
                &#8592;
            </button>
            <template x-for="image in images.slice(currentIndex, currentIndex + 6)" :key="images.indexOf(image)">
                <img class="w-1/6 hover:opacity-75" :src="image">
            </template>
            <button
                class="absolute right-0 bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 mr-12"
                x-on:click="increment()">
                &#8594;
            </button>
        </div>
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="#" class="uppercase px-3">About Us</a>
                <a href="#" class="uppercase px-3">Privacy Policy</a>
                <a href="#" class="uppercase px-3">Terms & Conditions</a>
                <a href="#" class="uppercase px-3">Contact Us</a>
            </div>
            <div class="uppercase pb-6">&copy; Sidamar</div>
        </div>
    </footer> --}}

    {{-- <script>
        function getCarouselData() {
            return {
                currentIndex: 0,
                images: [
                    'https://source.unsplash.com/collection/1346951/800x800?sig=1',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=2',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=3',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=4',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=5',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=6',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=7',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=8',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=9',
                ],
                increment() {
                    this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex + 1;
                },
                decrement() {
                    this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex - 1;
                },
            }
        }
    </script> --}}

</body>
</html>
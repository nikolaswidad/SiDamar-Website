@extends('layouts.main')

@section('container')
    {{-- Form Pengisian Arsip Film --}}
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center mt-12 mb-7">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl">
                Arsip Film
            </a>
            <p class="text-lg text-gray-600">
                Sineas Muda Semarang
            </p>
        </div>
    </header>

    <div class="px-10">
        <img src="/arsipFilm/arsip_film.jpg" alt="arsipFilm" class="object-center object-cover shadow-lg sm:w-full sm:object-cover sm:h-52 sm:object-center md:text-6xl">
    </div>
    
    <div class="pb-4 ">
        <div class="container ">
            <div class="w-full py-4 px-6 text-gray-800 flex flex-col items-center">
                <h3 class="text-4xl font-bold leading-tight xl:max-w-7xl text-center">Arsipkan filmmu agar bisa ditayangkan di agenda <b><i>Layar Tancap</i></b> kami</h3>
                <p class="mt-2">
                    Silahkan isi form berikut untuk mengarsipkan film
                </p>
            </div>
        </div>
    </div>

    @if (session('success'))
    <div class="mx-10 font-montserrat text-md text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="mx-10 font-montserrat text-md text-white p-5 mt-5 bg-red-700 rounded-xl" role="alert">
      {{ session('error') }}
    </div>
    @endif

    {{-- Form Pengisian Arsip Film versi 2 responsive--}}
    <form action="{{ route('arsipFilm.store') }}" method='post' class="py-2 px-10 w-full mb-20">
        @csrf
        {{-- make in 2 coloum --}}
        <div>
            <div class="lg:grid lg:grid-cols-2 lg:gap-3">
                <div class="">
                    <label for="produser" class="block text-gray-700 text-lg font-bold mb-2">Produser</label>
                    <input type="text" name="produser" class="h-11 block appearance-none w-full lg:w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Nama Produser" value="{{ old('produser') }}">
        
                    @error('produser')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
        
                <div>
                    <label for="sutradara" class="block text-gray-700 text-lg font-bold mb-2">Sutradara</label>
                    <input type="text" name="sutradara" class="h-11 block appearance-none w-full lg:w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Nama Sutradara" value="{{ old('sutradara') }}">
        
                    @error('sutradara')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="distributor" class="block text-gray-700 text-lg font-bold mb-2">Distributor/Penanggung Jawab</label>
                    <input type="text" name="distributor" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Distributor" value="{{ old('distributor') }}">
        
                    @error('distributor')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
    
                <div>
                    <label for="email" class="block text-gray-700 text-lg font-bold mb-2">Email</label>
                    <input type="text" name="email" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Email Aktif" value="{{ old('email') }}">
        
                    @error('email')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
    
                <div>
                    <label for="nomor_telepon" class="block text-gray-700 text-lg font-bold mb-2">Nomor Telepon</label>
                    <input type="text" name="nomor_telepon" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Nomor yang bisa dihubungi" value="{{ old('nomor_telepon') }}">
        
                    @error('nomor_telepon')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
    
                <div>
                    <label for="medsos" class="block text-gray-700 text-lg font-bold mb-2">Media Sosial</label>
                    <input type="text" name="medsos" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Media Sosial Aktif" value="{{ old('medsos') }}">
        
                    @error('medsos')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
                
                <div>
                    <label for="rumah_produksi" class="block text-gray-700 text-lg font-bold mb-2">Rumah Produksi</label>
                    <input type="text" name="rumah_produksi" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Nama Rumah Produksi" value="{{ old('rumah_produksi') }}">
        
                    @error('rumah_produksi')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
                
                <div>
                    <label for="judul_film" class="block text-gray-700 text-lg font-bold mb-2">Judul Film</label>
                    <input type="text" name="judul_film" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Judul Film" value="{{ old('judul_film') }}">
        
                    @error('judul_film')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
    
                <div>
                    <label for="tahun_produksi" class="block text-gray-700 text-lg font-bold mb-2">Tahun Produksi</label>
                    <input type="text" name="tahun_produksi" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Tahun Produksi" value="{{ old('tahun_produksi') }}">
        
                    @error('tahun_produksi')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
                
                <div>
                    <label for="durasi" class="block text-gray-700 text-lg font-bold mb-2">Durasi</label>
                    <input type="text" name="durasi" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3"placeholder="Masukkan durasi dalam menit" value="{{ old('durasi') }}">
        
                    @error('durasi')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
                
                <div>
                    <label for="kategori" class="block text-gray-700 text-lg font-bold mb-2">Kategori</label>
                    <input type="text" name="kategori" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Genre Film (boleh lebih dari satu)" value="{{ old('kategori') }}">
        
                    @error('kategori')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
    
                <div>
                    <label for="link_film" class="block text-gray-700 text-lg font-bold mb-2">Link Presskit</label>
                    <input type="text" name="link_film" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Link Presskit Film" value="{{ old('link_film') }}">
        
                    @error('link_film')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
                
            </div>
            <div>
                <input type="checkbox" id="pernyataan" name="pernyataan" value="True" class="my-3">
                <label for="pernyataan">Informasi yang disampaikan adalah benar adanya dan jika terdapat kesalahan dapat menghungi <a href="https://wa.me/+62895359747200/?text=" class="hover:text-primary" target="_blank">admin</a></label><br>

                {{-- @error('pernyataan')
                    <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                @enderror --}}
            </div>
            <div>
                <button type="submit" class="bg-red-700 hover:bg-red-800 px-4 py-3 rounded text-white text-lg font-bold w-full my-3">Submit</button>
            </div>
        </div>
    </form>
    @include('layouts.footer')
@endsection
{{-- add footer --}}
@extends('dashboard.layouts.main')

@section('container')
    <h1 class="text-4xl font-semibold font-montserrat">Buat Arsip Film</h1>
    <hr class="bg-slate-200 mt-5 max-w-lg">

    @if (session('success'))
        <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <form action="/dashboard/arsipFilm/{{ $arsipfilm->id }}" method="post" class="mt-8 mb-8 font-montserrat">
        @method('PUT')
        @csrf
        <div class="max-w-3xl xl:max-w-7xl">
            <div class="grid grid-cols-2 gap-3">
                <div class="">
                    <label for="produser" class="block text-gray-700 text-lg font-bold mb-2">Produser</label>
                    <input type="text" name="produser" class="h-11 block appearance-none w-full lg:w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Nama Produser" value="{{ old('produser',$arsipfilm->produser) }}">
        
                    @error('produser')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
        
                <div>
                    <label for="sutradara" class="block text-gray-700 text-lg font-bold mb-2">Sutradara</label>
                    <input type="text" name="sutradara" class="h-11 block appearance-none w-full lg:w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Nama Sutradara" value="{{ old('sutradara',$arsipfilm->sutradara) }}">
        
                    @error('sutradara')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="distributor" class="block text-gray-700 text-lg font-bold mb-2">Distributor/Penanggung Jawab</label>
                    <input type="text" name="distributor" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Distributor" value="{{ old('distributor',$arsipfilm->distributor) }}">
        
                    @error('distributor')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
    
                <div>
                    <label for="email" class="block text-gray-700 text-lg font-bold mb-2">Email</label>
                    <input type="text" name="email" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Email Aktif" value="{{ old('email',$arsipfilm->email) }}">
        
                    @error('email')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
    
                <div>
                    <label for="nomor_telepon" class="block text-gray-700 text-lg font-bold mb-2">Nomor Telepon</label>
                    <input type="text" name="nomor_telepon" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Nomor yang bisa dihubungi" value="{{ old('nomor_telepon',$arsipfilm->nomor_telepon) }}">
        
                    @error('nomor_telepon')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
    
                <div>
                    <label for="medsos" class="block text-gray-700 text-lg font-bold mb-2">Media Sosial</label>
                    <input type="text" name="medsos" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Media Sosial Aktif" value="{{ old('medsos',$arsipfilm->medsos) }}">
        
                    @error('medsos')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
                
                <div>
                    <label for="rumah_produksi" class="block text-gray-700 text-lg font-bold mb-2">Rumah Produksi</label>
                    <input type="text" name="rumah_produksi" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Nama Rumah Produksi" value="{{ old('rumah_produksi',$arsipfilm->rumah_produksi) }}">
        
                    @error('rumah_produksi')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
                
                <div>
                    <label for="judul_film" class="block text-gray-700 text-lg font-bold mb-2">Judul Film</label>
                    <input type="text" name="judul_film" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Judul Film" value="{{ old('judul_film',$arsipfilm->judul_film) }}">
        
                    @error('judul_film')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
    
                <div>
                    <label for="tahun_produksi" class="block text-gray-700 text-lg font-bold mb-2">Tahun Produksi</label>
                    <input type="text" name="tahun_produksi" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Tahun Produksi" value="{{ old('tahun_produksi',$arsipfilm->tahun_produksi) }}">
        
                    @error('tahun_produksi')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
                
                <div>
                    <label for="durasi" class="block text-gray-700 text-lg font-bold mb-2">Durasi</label>
                    <input type="text" name="durasi" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3"placeholder="Masukkan durasi dalam menit" value="{{ old('durasi',$arsipfilm->durasi) }}">
        
                    @error('durasi')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
                
                <div>
                    <label for="kategori" class="block text-gray-700 text-lg font-bold mb-2">Kategori</label>
                    <input type="text" name="kategori" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Genre Film (boleh lebih dari satu)" value="{{ old('kategori',$arsipfilm->kategori) }}">
        
                    @error('kategori')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
    
                <div>
                    <label for="link_film" class="block text-gray-700 text-lg font-bold mb-2">Link Presskit</label>
                    <input type="text" name="link_film" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3" placeholder="Link Presskit Film" value="{{ old('link_film',$arsipfilm->link_film) }}">
        
                    @error('link_film')
                        <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                    @enderror
                </div>
                
            </div>
            {{-- <div>
                <input type="checkbox" id="pernyataan" name="pernyataan" value="{{ old }}" class="my-3">
                <label for="pernyataan">Informasi yang disampaikan adalah benar adanya dan jika terdapat kesalahan pihak yang bersangkutan siap menerima konsekuensinya</label><br>
            </div> --}}
            <div>
                <button type="submit" class="bg-primary hover:bg-red-700 px-4 py-3 rounded text-white text-lg font-bold w-full my-3">Update Data</button>

            </div>
        </div>
    </form>




            

            



@endsection
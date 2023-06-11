@extends('dashboard.layouts.main')

@section('container')

<div class="max-w-full">
    <h1 class="text-4xl font-semibold font-montserrat">Buat Pembayaran Kas</h1>
    <hr class="bg-slate-200 mt-5 max-w-3xl">
    <div class="max-w-3xl xl:max-w-7xl">
        <div class="lg: grid grid-cols-2 gap-3">
            <div>
                <form action="/dashboard/pembayaranKas/{{ $bulanKasId }}" method="post" class="max-w-3xl mt-8 mb-8 font-montserrat" enctype="multipart/form-data">
                @csrf
                @method('POST')
                        
                {{-- Input Bulan type dropdown with cool tailwind style --}}
                <div class="mb-4">
                    <div>
                        <label for="nama" class="block text-gray-700 text-lg font-bold mb-2">Nama</label>
                        <input type="text" name="nama" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5 text-sm lg:text-md" value="{{ auth()->user()->name }}" readonly disabled>
            
                        @error('nama')
                            <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                        @enderror
                    </div>
        
                    {{-- <label for="bulan" class="block text-gray-700 text-lg font-bold mb-2">Bulan</label> --}}
                    <input type="text" name="bulan" class="hidden h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5" value="{{ $bulanKasId }}">
        
                    <div>
                        <label for="metode" class="block text-gray-700 text-lg font-bold mb-2">Metode Pembayaran</label>
                        <select name="metode" id="metode" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5 text-sm lg:text-md">
                            {{-- get the old value --}}
                            <option value="">Pilih Metode Pembayaran</option>
                            {{-- select old value jika ada --}}
                            <option value="Cash" {{ old('metode') == 'Cash' ? 'selected' : '' }}>Cash</option>
                            <option value="DANA" {{ old('metode') == 'DANA' ? 'selected' : '' }}>DANA</option>
                            <option value="Go-Pay" {{ old('metode') == 'Go-Pay' ? 'selected' : '' }}>Go-Pay</option>
                            <option value="BCA" {{ old('metode') == 'BCA' ? 'selected' : '' }}>BCA</option>
                            <option value="BNI" {{ old('metode') == 'BNI' ? 'selected' : '' }}>BNI</option>
                            <option value="BRI" {{ old('metode') == 'BRI' ? 'selected' : '' }}>BRI</option>
                            <option value="Mandiri" {{ old('metode') == 'Mandiri' ? 'selected' : '' }}>Mandiri</option>
                        </select>
                        {{-- this field must fill --}}
                        @error('metode')
                            <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                        @enderror
                    </div>
        
                    <div>
                        <label for="bukti" class="block text-gray-700 text-lg font-bold mb-2">Bukti Pembayaran</label>
                        <input type="file" name="bukti" class="h-15 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5 text-sm lg:text-md">
            
                        @error('bukti')
                            <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
                    
                    
                <div class="flex justify-end max-w-full ">
                    <a href="/dashboard/pembayaranKas" class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-3 rounded-lg mt-5 mr-3 text-sm lg:text-md">Kembali</a>
                    <button type="submit" class="text-sm lg:text-md bg-primary hover:bg-red-700 text-white font-bold p-3 rounded-lg mt-5">Buat Pembayaran</button>
                </div>
        
                    {{-- every input must be unique --}}
                    @if (session()->has('error'))
                        <div class="text-red-500 text-sm mt-2">{{ session('error') }}</div>
                    @endif
        
                    {{-- success message --}}
                    @if (session()->has('success'))
                        <div class="text-green-500 text-sm mt-2">{{ session('success') }}</div>
                    @endif
                </div>
            </div>
            <div class="ml-8 mr-8 mt-8 h-fit">
                <img class="object-cover object-left lg:h-52 mr-8 mt-8" src="/img/qrcode.jpg" alt="">
                <div class="text-montserrat ml-2">
                    <h2 class="text-lg">Dana/Go-Pay : 0895359747200</h2>   
                    <h2 class="text-lg">Mandiri : 1234567890</h2> 
                    <h2 class="text-lg">BCA : 07988579988789</h2> 
                    <h2 class="text-lg">BRI : 07934234543546</h2> 
                    <h2 class="text-lg">BNI : 02345354632423</h2> 

                        
                </div>
            </div>
        </div>
    </div>
    {{-- 
    <div class="max-w-3xl xl:max-w-7xl">
                <div class="grid grid-cols-2 gap-3">
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
                    <label for="pernyataan">Informasi yang disampaikan adalah benar adanya dan jika terdapat kesalahan pihak yang bersangkutan siap menerima konsekuensinya</label><br>
                </div>
                <div>
                    <button type="submit" class="bg-primary hover:bg-red-700 px-4 py-3 rounded text-white text-lg font-bold w-full my-3">Submit</button>
                </div>
            </div>
    --}}

</div>
@endsection
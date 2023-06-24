@extends('dashboard.layouts.main')

@section('container')
    <div class="max-w-7xl font-montserrat">
        <h1 class="text-4xl font-semibold font-montserrat">Tambah Pengguna</h1>
        <hr class="bg-slate-200 mt-5 max-w-lg">

        <form action="/dashboard/user/" method="post" class="mt-5 mb-8 md:w-2/3">
            @csrf
            @method('POST')
            <div>
                <label for="name" class="block text-gray-700 text-lg font-bold mb-2">Nama Pengguna</label>
                <input type="text" name="name" class="h-11 block appearance-none w-full lg:w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5" placeholder="Nama Pengguna" value="{{ old('name') }}">
    
                @error('name')
                    <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                @enderror
            </div>
            
            <div>
                <label for="email" class="block text-gray-700 text-lg font-bold mb-2">Email</label>
                <input type="email" name="email" class="h-11 block appearance-none w-full lg:w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5" placeholder="Email Pengguna" value="{{ old('email') }}">
    
                @error('email')
                    <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-gray-700 text-lg font-bold mb-2">Password</label>
                <input type="password" name="password" class="h-11 block appearance-none w-full lg:w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5" placeholder="Password Pengguna" value="{{ old('password') }}">
    
                @error('password')
                    <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="tahun" class="block text-gray-700 text-lg font-bold mb-2">Tahun Bergabung</label>
                <select name="tahun" id="tahun" class="h-11 block appearance-none w-full lg:w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5">
                    <option value="">Pilih Tahun</option>
                    @for ($i = now()->year; $i >= now()->year - 10; $i--)
                        <option value="{{ $i }}" {{ old('tahun') == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>

                @error('tahun')
                    <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                @enderror
            </div>
            
            <div>
                <label for="role" class="block text-gray-700 text-lg font-bold mb-2">Role</label>
                <select name="role" id="role" class="h-11 block appearance-none w-full lg:w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-3">
                    <option value="">Pilih Role</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="author">Author</option>
                </select>
                @error('role')
                    <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end max-w-full">
                <a href="/dashboard/user" class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-3 rounded-lg mt-3 mr-3">Kembali</a>
                <button type="submit" class="bg-primary hover:bg-red-700 text-white font-bold p-3 rounded-lg mt-3">Tambah Pengguna</button>
            </div>
        
        </form>

    </div>
@endsection
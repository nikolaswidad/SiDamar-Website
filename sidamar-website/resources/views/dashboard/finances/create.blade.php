@extends('dashboard.layouts.main')

@section('container')
<h1 class="text-4xl font-semibold font-montserrat">Masukkan Donasi Event</h1>

<!-- Add Modal -->
<div class="max-w-5xl" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <hr class="bg-slate-200 mt-5 max-w-3xl">
                <form action="{{ route('finances.store') }}" method="POST" class="max-w-3xl mt-8 mb-8 font-montserrat">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="keperluan" class="block text-gray-700 text-lg font-bold mb-2">Keperluan</label>
                        <input type="text" name="keperluan" class="form-control h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5" id="keperluan" required>   
                    </div>
                    <div class="form-group mb-4">
                        <label for="date" class="block text-gray-700 text-lg font-bold mb-2">Tanggal</label>
                        <input type="date" name="date" class="form-control h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5"id="date" required value="{{ old('date') }}">   
                    </div>
                    <div class="form-group mb-4">
                        <label for="cashin" class="block text-gray-700 text-lg font-bold mb-2">CashIn</label>
                        <input type="text" name="cashin" class="form-control h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5"id="cashin" required>   
                    </div>
                    <div class="form-group mb-4">
                        <label for="cashout" class="block text-gray-700 text-lg font-bold mb-2">CashOut</label>
                        <input type="text" name="cashout" class="form-control h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5" id="cashout" required>   
                    </div>
                    <div class="form-group mb-4">
                        <label for="keterangan" class="block text-gray-700 text-lg font-bold mb-2">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5" id="keterangan" required>   
                    </div>
                    <button type="submit" class="bg-primary hover:bg-red-700 text-white font-bold p-3 rounded-lg mt-5">Submit</button> 
                </form>
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
</div>
@endsection
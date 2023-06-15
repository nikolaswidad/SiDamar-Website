@extends('dashboard.layouts.main')

@section('container')
<div class="max-w-7xl font-montserrat">
  <h1 class="font-bold mb-5 text-4xl">Tambahkan Report</h1>
  <hr class="bg-slate-200 mt-5 max-w-3xl">

      @if (count($errors)>0)
        @foreach ($errors->all() as $error)
          <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">{{ $error }}</span> Change a few things up and try submitting again.
          </div>
        @endforeach
      @endif
  
      @if (Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
          <span class="font-medium">{{ Session('success') }}</span>
        </div>
      @endif
  
      <div name="report">
        <div>
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:col-span-2 md:mt-0 ">
                  <form action="{{ route('finances.store') }}" method="POST" class="max-w-3xl mt-8 mb-8 font-montserrat">
                      @csrf
                      <div class="sm:overflow-hidden sm:rounded-md">
                          <div class="space-y-4">
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
                        
                  </div>
              </div>
              <div class="flex justify-end">
                <a href="/dashboard/finances"><button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-3 rounded-lg mt-5 mr-3 text-sm lg:text-md">Kembali</button></a>
                <button type="submit" class="text-sm lg:text-md bg-primary hover:bg-red-700 text-white font-bold p-3 rounded-lg mt-5 ">Buat Report</button>
              </div>               
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

@endsection
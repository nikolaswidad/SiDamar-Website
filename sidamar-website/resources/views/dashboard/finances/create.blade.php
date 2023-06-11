@extends('dashboard.layouts.main')

@section('container')
<h1 class="font-bold mb-5 text-4xl">Tambahkan Report</h1>

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

    <div name="donasi">
      <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="mt-5 md:col-span-2 md:mt-0 ">
                <form action="{{ route('finances.store') }}" method="POST" class="max-w-3xl mt-8 mb-8 font-montserrat">
                    @csrf
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-3 bg-white px-3 py-5 sm:p-6">

                    <div class="form-group mb-4">
                        <label for="keperluan" class="block font-medium text-gray-700 text-sm mb-2">Keperluan</label>
                        <input type="text" name="keperluan" class="form-control h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5" id="keperluan" required>   
                    </div>
                    <div class="form-group mb-4">
                        <label for="date" class="block font-medium text-gray-700 text-sm mb-2">Tanggal</label>
                        <input type="date" name="date" class="form-control h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5"id="date" required value="{{ old('date') }}">   
                    </div>
                    <div class="form-group mb-4">
                        <label for="cashin" class="block font-medium text-gray-700 text-sm mb-2">CashIn</label>
                        <input type="text" name="cashin" class="form-control h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5"id="cashin" required>   
                    </div>
                    <div class="form-group mb-4">
                        <label for="cashout" class="block font-medium text-gray-700 text-sm mb-2">CashOut</label>
                        <input type="text" name="cashout" class="form-control h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5" id="cashout" required>   
                    </div>
                    <div class="form-group mb-4">
                        <label for="keterangan" class="block font-medium text-gray-700 text-sm mb-2">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5" id="keterangan" required>   
                    </div>
                </div>
            </div>
            <div>
              <a href="/dashboard/finances"><button type="button" class="text-white bg-gradient-to-r from-yellow-200 via-yellow-300 to-yellow-400 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 ">Back</button></a>
              <button type="submit" class="mt-2 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 inline ">Submit</button>
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

@endsection
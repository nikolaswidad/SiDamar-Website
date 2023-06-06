@extends('dashboard.layouts.main')

@section('container')
<h1 class="text-4xl font-semibold font-montserrat">Ubah Finance Report</h1>


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

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal-{{ $finance->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                <div class="max-w-5xl">
                    <hr class="bg-slate-200 mt-5 max-w-3xl">
                    <form action="{{ route('finances.update', $finance->id) }}" method="POST" class="max-w-3xl mt-8 mb-8 font-montserrat">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-group mb-6 col-span-6">
                            <label for="keperluan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keperluan</label>
                            <input type="text" name="keperluan" lass="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('keperluan') is-invalid @enderror" id="keperluan" value="{{ $finance->keperluan }}" required>   
                            @error('keperluan')
                            {{ $donation }}
                        @enderror
                        </div>
                        <div class="form-group mb-6 col-span-6">
                            <label for="date"class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                            <input type="date" name="date" lass="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('date') is-invalid @enderror" id="date" required value="{{ $finance->date }}">   
                            @error('date')
                            {{ $donation }}
                        @enderror
                        </div>
                        <div class="form-group mb-6 col-span-6">
                            <label for="cashin"class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CashIn</label>
                            <input type="text" name="cashin" lass="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('cashin') is-invalid @enderror" id="cashin" value="{{ $finance->cashin }}" required>   
                            @error('cashin')
                            {{ $donation }}
                        @enderror
                        </div>
                        <div class="form-group mb-6 col-span-6">
                            <label for="cashout"class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CashOut</label>
                            <input type="text" name="cashout" lass="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('cashout') is-invalid @enderror"  id="cashout" value="{{ $finance->cashout }}" required>   
                            @error('cashout')
                            {{ $donation }}
                        @enderror
                        </div>
                        <div class="form-group mb-6 col-span-6">
                            <label for="keterangan"class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                            <input type="text" name="keterangan" lass="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('keterangan') is-invalid @enderror" id="keterangan" value="{{ $finance->keterangan }}"required>   
                            @error('keterangan')
                            {{ $donation }}
                        @enderror
                        </div>
                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button> 
                    </form>
                </div> 
            </div>
        </div>
</div>

@endsection
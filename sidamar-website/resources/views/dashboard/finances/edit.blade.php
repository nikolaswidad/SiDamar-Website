@extends('dashboard.layouts.main')

@section('container')
    <div class="max-w-7xl font-montserrat">
        <h1 class="text-4xl font-semibold font-montserrat">Ubah Finance Report</h1>
        <hr class="bg-slate-200 mt-5 mb-9 max-w-lg">
    
        @if (count($errors)>0)
        @foreach ($errors->all() as $error)
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">{{ $error }}</span> Lakukan beberapa perubahan sebelum menyimpan data
        </div>
        @endforeach
        @endif
    
        @if (Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">{{ Session('success') }}</span>
        </div>
        @endif
    
        <!-- Edit Modal -->
        <div class="" id="editModal-{{ $finance->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                  <div class="mt-5 md:col-span-2 md:mt-0 ">
                        <form action="{{ route('finances.update', $finance->id) }}" method="POST" class="max-w-3xl mb-8 font-montserrat">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="sm:overflow-hidden sm:rounded-md">
                                <div class="space-y-4">
              
                            <div class="form-group mb-6 col-span-6">
                                <label for="keperluan" class="block text-gray-700 text-lg font-bold mb-2">Keperluan</label>
                                <input type="text" name="keperluan" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('keperluan') is-invalid @enderror" id="keperluan" value="{{ $finance->keperluan }}" required>   
                                @error('keperluan')
                                {{ $donation }}
                            @enderror
                            </div>
                            <div class="form-group mb-6 col-span-6">
                                <label for="date"class="block text-gray-700 text-lg font-bold mb-2">Tanggal</label>
                                <input type="date" name="date" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('date') is-invalid @enderror" id="date" required value="{{ $finance->date }}">   
                                @error('date')
                                {{ $donation }}
                            @enderror
                            </div>
                            <div class="form-group mb-6 col-span-6">
                                <label for="cashin"class="block text-gray-700 text-lg font-bold mb-2">CashIn</label>
                                <input type="text" name="cashin" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('cashin') is-invalid @enderror" id="cashin" value="{{ $finance->cashin }}" required>   
                                @error('cashin')
                                {{ $donation }}
                            @enderror
                            </div>
                            <div class="form-group mb-6 col-span-6">
                                <label for="cashout"class="block text-gray-700 text-lg font-bold mb-2">CashOut</label>
                                <input type="text" name="cashout" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('cashout') is-invalid @enderror"  id="cashout" value="{{ $finance->cashout }}" required>   
                                @error('cashout')
                                {{ $donation }}
                            @enderror
                            </div>
                            <div class="form-group mb-6 col-span-6">
                                <label for="keterangan"class="block text-gray-700 text-lg font-bold mb-2">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('keterangan') is-invalid @enderror" id="keterangan" value="{{ $finance->keterangan }}"required>   
                                @error('keterangan')
                                {{ $donation }}
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <a href="/dashboard/finances"><button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold p-3 rounded-lg mt-5 mr-3 text-sm lg:text-md">Kembali</button></a>
                        <button type="submit" class="text-sm lg:text-md bg-primary hover:bg-red-700 text-white font-bold p-3 rounded-lg mt-5 ">Simpan</button>
                      
                    </div>
                  </form>
                </div> 
              </div>
            </div>
          </div>
    </div>
      
@endsection
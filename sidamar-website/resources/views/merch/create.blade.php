@extends('layouts.main')

@section('container')

    <div class="container mx-auto">
        <div  class="-mx-4 flex flex-wrap justify-center">
            <div class="w-full px-4">
                <div class="mx-auto mb-[60px] max-w-[510px] text-center lg:mb-20">
                    <span class="text-dark mb-2 sm:text-3xl block text-lg font-semibold">
                        ur Merch!!
                    </span>
                    <a class="text-primary hover:text-dark mb-4 text-3xl font-bold sm:text-4xl md:text-[40px]" href="/merch">
                        Click to see another merch!
                        
                    </a>
                    <p class="text-body-color text-base">
                        There are many variations of passages of Lorem Ipsum available but
                        the majority have suffered alteration in some form.
                      </p>
                </div>
            </div>
        </div>

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

        <div class="mx-auto grid max-w-screen-2xl grid-cols-1 md:grid-cols-2">
          <div class="bg-gray-50 py-8 md:py-8">
            <div class="mx-auto max-w-lg space-y-8 px-4 lg:px-8">
              <div class="flex items-center gap-4">
                <img src="{{ asset('img/QRIS.png') }}" alt="QRIS">

                
              </div>
              <hr>
              <div class="p-2">
              <h3 class="text-dark mb-1 sm:text-l block text-lg font-semibold">Metode Lain:</h3>
              <h4>BNI: 123456723</h4>
              <h4>BCA: 09876541678</h4>
              </div>
              
            </div>
          </div>
          <div class="bg-white py-12 md:py-24">
            <div class="mx-auto max-w-lg px-4 lg:px-8">
              <div class="max-w-5xl ">

    <form action="/dashboard/customer" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') is-invalid @enderror" placeholder="name" required value="{{ old('name') }}">
        @error('name')
              {{ $message }}
          @enderror
      </div>
      <div class="mb-6">
        <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HP</label>
        <input type="text" id="no_hp" name="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('no_hp') is-invalid @enderror" required value="{{ old('no_hp') }}">
        @error('no_hp')
              {{ $message }}
          @enderror
      </div>
      <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
        <input type="text" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') is-invalid @enderror" required value="{{ old('email') }}">
        @error('email')
              {{ $message }}
          @enderror
      </div>

      
      <div class="mb-4">
        <label for="merch_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item</label>
        <select name="merch_id" id="merch_id" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5">
          <option value="">Pilih Item</option>
          @foreach ($merch as $merch)
          <option value="{{ $merch->id }}">
              {{ $merch->title }}   ----------->   Rp {{ $merch->price }}
            </div>
          </option>
          @endforeach
        </select>
      </div>
      

      <div class="mb-6">
        <label for="total" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total</label>
        <input type="text" id="total" name="total" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('total') is-invalid @enderror" required value="{{ old('total') }}">
        @error('total')
              {{ $message }}
          @enderror
      </div>

     
      <div class="mb-4">
        <label for="payment_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment Type</label>
        <select name="payment_type" id="payment_type" class="h-11 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline mb-5">
            {{-- select old value if any --}}
            <option value="">Pilih Metode</option>
            <option value="dana">Dana</option>
            <option value="shopeepay">Shopeepay</option>
            <option value="ovo">Ovo</option>
            <option value="gopay">Gopay</option>
            <option value="bni">BNI</option>
            <option value="bca">BCA</option>

        </select>

      </div>
      <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload Image</label>
          <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('image') is-invalid @enderror" name="image" id="image" type="file" onchange="previewImage()">
        @error('image')
              {{ $message }}
        @enderror
      </div>
    
      
    
      
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
    
    <script>

    
      function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
    
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
    
        oFReader.onload = function(oFREvent){
          imgPreview.src = oFREvent.target.result;
        }
      }
      
      document.addEventListener('DOMContentLoaded', function() {
      const productDropdown = document.getElementById('merch_id');
      const priceDiv = document.getElementById('total');

      
      productDropdown.addEventListener('change', function() {
          const productId = productDropdown.value;

          // Kirim permintaan AJAX ke server
          axios.get('/get-product-price/' + productId)
              .then(function(response) {
                  const price = response.data.price;

                  // Tampilkan harga di dalam div price
                  priceDiv.innerText = 'Harga: ' + price;
              })
              .catch(function(error) {
                  console.error(error);
              });
      });
});



    </script>
@endsection


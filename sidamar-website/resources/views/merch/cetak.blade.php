<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pembayaran</title>
    <style type="text/css">
        .cetak {
        font-size: 10px; text-align:center; 
        }
        .judul {
            text-align:center; 
        }
        </style>
</head>
<body>
    <h1 class="judul">Merch Si DAMAR</h1>
    <p class="cetak">Dipesan pada: {{ $customer->created_at }} </p>
    <hr class="bg-slate-200 mt-5 max-w-lg">
    

    @if (session('success'))
    <div class="max-w-7xl font-montserrat text-xl text-white p-5 mt-5 bg-green-500 rounded-xl" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <div class="relative mx-auto max-w-screen-xl px-4 py-8">
      <div>
        <p class="mt-1 text-sm text-gray-500">Nomor Pembelian: 0002023-MRCH-0{{ $customer->id }}</p>
        
      </div>
  
  
        
        <div class="lg:sticky lg:top-0">
            <form class="space-y-4 lg:pt-8">

                <fieldset>
                <legend class="text-lg font-bold">Item</legend>
                
                <div class="mt-2 flex flex-wrap gap-1">
                    <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                        @if ($customer->merch && isset($customer->merch->title))
                            {{ $customer->merch->title }}
                        @endif
                    </span>
                </div>
                </fieldset>
              <fieldset>
                <legend class="text-lg font-bold">Nama customer</legend>
                
                <div class="mt-2 flex flex-wrap gap-1">
                    <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                        {{ $customer->name }}
                    </span>
                </div>
              </fieldset>

              <fieldset>
                <legend class="text-lg font-bold">Email</legend>
    
                <div class="mt-2 flex flex-wrap gap-1">
                    <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                        {{ $customer->email }}
                    </span>
                </div>
              </fieldset>

              <fieldset>
                <legend class="text-lg font-bold">Phonel</legend>
    
                <div class="mt-2 flex flex-wrap gap-1">
                    <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                        {{ $customer->no_hp }}
                    </span>
                </div>
              </fieldset>

             

              <fieldset>
                <legend class="text-lg font-bold">Tipe Pembayaran</legend>
    
                <div class="mt-2 flex flex-wrap gap-1">
                    <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                        {{ $customer->payment_type }}
                    </span>
                </div>
              </fieldset>

              <fieldset>
                <legend class="text-lg font-bold">Total</legend>
    
                <div class="mt-2 flex flex-wrap gap-1">
                    <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                        {{ $customer->total }}
                    </span>
                </div>
              </fieldset>

              <fieldset>
                <legend class="text-lg font-bold">Tanggal Pembelian</legend>
    
                <div class="mt-2 flex flex-wrap gap-1">
                    <span class="block rounded-full border border-gray-200 px-3 py-1 text-s peer-checked:bg-gray-100">
                        {{ $customer->created_at }}
                    </span>
                </div>
              </fieldset>

            
          </form>
        </div>
        
            
       </div>
      </div>
    </div>

<script type="text/javascript">
    window.print();
</script>
</body>
</html>
    
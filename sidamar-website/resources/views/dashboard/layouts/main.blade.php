<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  {{-- JS Flowbite --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  @vite(['resources/css/app.css','resources/js/app.js'])
  <title>Si Damar Website</title>
  <link rel="stylesheet" href="css/style.css">
  {{-- // Font Montserrat --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600;700&display=swap" rel="stylesheet">
  {{-- Trix Editor --}}
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

  <script src="{{ asset('js/script.js') }}"></script>

  <style>
    trix-toolbar [data-trix-button-group="file-tools"]{
      display: none;
    }
  </style>
</head>
<body class="bg-gray-50">
    @include('dashboard.layouts.header')
    @include('dashboard.layouts.sidebar')

    <div class="container">
        <div id="main-content" class="h-full w-full relative overflow-y-auto lg:ml-64">
            <main>
                <div class="pt-10 px-4">
                    @yield('container')
                </div>
            </main>
       </div>

    </div>
</body>
</html>
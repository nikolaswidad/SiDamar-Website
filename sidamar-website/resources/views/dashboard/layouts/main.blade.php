<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/css/app.css')
  <title>Si Damar Website</title>
  <link rel="stylesheet" href="css/style.css">
  {{-- // Font Montserrat --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600;700&display=swap" rel="stylesheet">
  {{-- Trix Editor --}}
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
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
        <div id="main-content" class="h-full max-w-5xl relative overflow-y-auto lg:ml-64">
            <main>
                <div class="p-10">
                    @yield('container')
                </div>
            </main>
       </div>

    </div>
</body>
</html>
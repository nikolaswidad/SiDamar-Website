<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/css/app.css')
  <title>Si Damar Website</title>
</head>
<body>
    @include('dashboard.layouts.navbar')
    @include('dashboard.layouts.sidebar')

    <div class="container mt-2">
        @yield('container')
    </div>
</body>
</html>
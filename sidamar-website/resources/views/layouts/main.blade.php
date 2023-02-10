<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/css/app.css')
  <script type="text/javascript" src="/js/index.min.js"></script>
  <title>Si Damar Website</title>
</head>
<body>
    @include('partials.navbar')
    <div class="container  mx-auto">
        @yield('container')
    </div>
</body>
</html>
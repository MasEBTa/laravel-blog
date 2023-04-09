<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    {{-- bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    {{-- css --}}
    <link rel="stylesheet" href="/CSS/style.css">
    {{-- dashboard --}}
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <!-- Custom styles for this template -->
    <link href="/CSS/dashboard.css" rel="stylesheet">
    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="/CSS/trix.css">
    {{-- <link rel="stylesheet" type="text/css" href="/CSS/stylesck.css"> --}}
    <script type="text/javascript" src="/js/trix.js"></script>
  </head>
  <body>
        @include('partial.navbar')
    
        <div class="container">
            @yield('container')
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    {{-- dashboard --}}
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="/js/dashboard.js"></script>
    {{-- <script src="/js/build/ckeditor.js"></script> --}}
  </body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>PMHNP</title>
  <!-- MDB icon -->
  <link rel="icon" href="{{asset('storage/favicon-32x32.png')  }}" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="{{ asset('src/css/mdb.min.css') }}" />
  <!-- Custom style -->
  <link rel="stylesheet" href="{{ asset('src/css/style-pmhnp.css') }}" />
  <link rel="stylesheet" href="{{ asset('src/font/stylesheet.css') }}" />

  @yield('style')

</head>
<body>

  @include('layouts2.navbar')

  @yield('content')

  @include('layouts2.footer')
      
  <script type="text/javascript" src="{{ asset('src/js/mdb.min.js') }}"></script>
  
  @yield('script')
     
</body>
  


</html>
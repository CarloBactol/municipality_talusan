<!DOCTYPE html>
<html lang="en">
<head>
  <title>MunicipalityOfTalusan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="shortcut icon" type="img/png" href="{{ asset('frontend/img/favicon.png') }}">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
     body{
         background: url('frontend/img/municipality-background.jpg');
         background-repeat: no-repeat;
         background-size: auto;
     }
  </style>
</head>
<body>
    <div class="container">
        <div class="row ">
            <div class="col-lf-10 my-5">
                @yield('content')
            </div>
        </div>
    </div>
    
</body>
</html>
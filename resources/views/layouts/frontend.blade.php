<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MunicipalityOfTalusan</title>

    <link rel="shortcut icon" type="img/png" href="{{ asset('frontend/img/favicon.png') }}">

    <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" rel="stylesheet"  type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">

     <!-- Owl Carousel Assets -->
     <link href="{{ asset('frontend/css/owl.carousel.css') }}" rel="stylesheet">
     <link href="{{ asset('frontend/css/owl.theme.css') }}" rel="stylesheet">
     <link href="{{ asset('frontend/css/owl.transitions.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    
    @yield('css-news')
    @yield('css-news-frontend')
    @yield('how-to-get-there-css')
</head>

<body id="page-top">

    @include('layouts.includes.navbar-frontend')

    <!-- Page Wrapper -->
    <div id="wrapper">

        @yield('content')

    </div>
    <!-- End of Page Wrapper -->

    @include('layouts.includes.footer-frontend')

    <!-- how-to-get-there-js -->
    @yield('maps-api-js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAY2uKvl0mLR2I90dguzDkSAAswWDQVQ9E&libraries=places"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

      <!-- bootstrap 5 bundle -->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>

      <!-- ck-editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

   

      <!-- owl carousel for image display -->
    <script src="{{ asset('frontend/js/jquery-1.9.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    
    <script>
       $(".owl-carousel").owlCarousel({
 
            //Basic Speeds
            slideSpeed : 200,
            paginationSpeed : 800,

            //Autoplay
            autoPlay : true,
            goToFirst : true,
            goToFirstSpeed : 1000,

            // Navigation
            navigation : false,
            navigationText : ["prev","next"],
            pagination : false,
            paginationNumbers: true,

            // Responsive
            responsive: true,
            items : 3,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [980,3],
            itemsTablet: [768,2],
            itemsMobile : [479,1]

        })

        </script>

        <script>
          //set map options
        var myLatLng = { lat: 11.112666, lng: 122.509476 };
        var mapOptions = {
            center: myLatLng,
            zoom: 5,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        
        };
        
        //create map
        var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
        
        //create a DirectionsService object to use the route method and get a result for our request
        var directionsService = new google.maps.DirectionsService();
        
        //create a DirectionsRenderer object which we will use to display the route
        var directionsDisplay = new google.maps.DirectionsRenderer();
        
        //bind the DirectionsRenderer to the map
        directionsDisplay.setMap(map);
        
        
        //define calcRoute function
        function calcRoute() {
            //create request
            var request = {
                origin: document.getElementById("from").value,
                destination: document.getElementById("to").value,
                travelMode: google.maps.TravelMode.DRIVING, //WALKING, BYCYCLING, TRANSIT
                unitSystem: google.maps.UnitSystem.IMPERIAL
            }
        
            //pass the request to the route method
            directionsService.route(request, function (result, status) {
                if (status == google.maps.DirectionsStatus.OK) {
        
                    //Get distance and time
                    const output = document.querySelector('#output');
                    output.innerHTML = "<div class='alert-info'>From: " + document.getElementById("from").value + ".<br />To: " + document.getElementById("to").value + ".<br /> Driving distance <i class='fas fa-road'></i> : " + result.routes[0].legs[0].distance.text + ".<br />Duration <i class='fas fa-hourglass-start'></i> : " + result.routes[0].legs[0].duration.text + ".</div>";
        
                    //display route
                    directionsDisplay.setDirections(result);
                } else {
                    //delete route from map
                    directionsDisplay.setDirections({ routes: [] });
                    //center map in London
                    map.setCenter(myLatLng);
        
                    //show error message
                    output.innerHTML = "<div class='alert-danger'><i class='fas fa-exclamation-triangle'></i> Could not retrieve driving distance.</div>";
                }
            });
        
        }
        
        
        
        //create autocomplete objects for all inputs
        var options = {
            types: ['(cities)']
        }
        
        var input1 = document.getElementById("from");
        var autocomplete1 = new google.maps.places.Autocomplete(input1, options);
        
        var input2 = document.getElementById("to");
        var autocomplete2 = new google.maps.places.Autocomplete(input2, options);
        </script>

</body>
</html>


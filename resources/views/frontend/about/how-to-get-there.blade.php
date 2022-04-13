@extends('layouts.frontend')

@section('how-to-get-there-css')

<style>
body {
    color: #5bc0de;
    font-family: "Poppins", sans-serif;
  }
  
  .fa-map-marker-alt,
  .fa-dot-circle {
    color: #5bc0de;
  }
  
  /*Jumbotron*/
  .jumbotron {
    background-color: transparent;
    margin: 0;
    padding: 10px;
  }
  
  .jumbotron h1 {
    letter-spacing: 2.5px;
    font-size: 3.5em;
  }
  
  .jumbotron h4 {
    text-align: center;
  }
  
  /*map*/
  #googleMap {
    width: 80%;
    height: 400px;
    margin: 10px auto;
  }
  
  /*output box*/
  #output {
    text-align: center;
    font-size: 2em;
    margin: 20px auto;
  }
  
  #mode {
    color: black;
  }

</style>

@endsection

@section('content')
    <div class="container" id="map-main-content">
        <nav aria-label="breadcrumb" class="my-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">How to Get to Talusan</li>
            </ol>
          </nav>
         
          <div class="container mb-5 mt-5">
            <ul class="nav nav-tabs px-3">
              <li class="nav-item">
                <a class="nav-link {{ 'about-city' == request()->path() ? 'active' : '' }}" aria-current="page" href="{{ url('about-city') }}">About City</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ 'about/how-to-get-there' == request()->path() ? 'active' : '' }}" href="{{ url('/about/how-to-get-there') }}">How Long to Get on Talusan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ 'about/city-mayor' == request()->path() ? 'active' : '' }}" href="{{ url('/about/city-mayor') }}">City Mayor</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ 'about/city-council' == request()->path() ? 'active' : '' }}" href="{{ url('/about/city-council') }}">City Council</a>
              </li>
            </ul>
          </div>
          
          {{-- <div class="row">
              <div class="col-lg-4 col-md-4 col-12 d-flex justify-content-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126616.95746072063!2d122.78843261914739!3d7.3785447461252796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3251399c120dda05%3A0x31ab2c3e4defd882!2sTalusan%2C%20Zamboanga%20Sibugay!5e0!3m2!1sen!2sph!4v1644325009463!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
              <div class="col-lg-8 col-md-8 col-12 d-flex justify-content-center">
                  <div class="container row ">
                    @foreach ($maps as $map)
                    <img src="{{ url('assets/uploads/map/'.$map->image) }}" alt="" class="img-fluid">  
                   
                  </div>
              </div>
          </div>
          <hr>
          <div class="row d-flex justify-content-center">
            <div class="col-lg-12 col-md-12">
                  <p>{!! $map->description !!}</p>
            </div>
          </div>
          @endforeach --}}

          <div class="jumbotron">
            <div class="container-fluid">
                <h4>Calculate Your Travelling Distances.</h4>
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="from" class="col-sm-2 control-label"><i class="far fa-dot-circle"></i></label>
                        <div class="col-xs-4">
                            <input type="text" id="from" placeholder="Your City Location" class="form-control" >
                        </div>
                   </div>
                   <div class="form-group">
                    
                        <label for="to" class="col-xs-2 control-label"><i class="fas fa-map-marker-alt"></i></label>
                        <div class="col-xs-4">
                            <input type="text" id="to"  class="form-control" value="Talusan, Zamboanga Sibugay, Philippines">
                        </div>
                      
                     </div>
                     
                </form>
    
                <div class="col-xs-offset-2 col-xs-10 mt-2">
                    <button class="btn btn-info btn-lg " onclick="calcRoute();"><i class="fas fa-map-signs"></i> Submit</button>
                </div>
            </div>
            <div class="container-fluid">
                <div id="googleMap">
    
                </div>
                <div id="output">
    
                </div>
            </div>
    
        </div>

    </div>
@endsection

@section('maps-api-js')


@endsection
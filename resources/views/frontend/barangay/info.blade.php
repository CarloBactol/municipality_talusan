@extends('layouts.frontend')

@section('content')
    <div class="container">
      <nav aria-label="breadcrumb" class="my-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/barangay-list">Barangays</a></li>
          <li class="breadcrumb-item active" aria-current="page">Barangay {{ $barangays->name }}</li>
        </ol>
      </nav>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12">
            <div class="jumbotron jumbotron mt-5" id="barangay-info">
      
              <div class="container">
                <h1 class="display-4">{{ $barangays->name }}</h1>
                <p class="lead">{!!  $barangays->description !!}</p>
                <div class="info-box py-4 px-4">
                  <p>{!! html_entity_decode($barangays->map) !!}</p>
                </div>
                  <div class="row">

                    <div class="col-lg-5 col-md-5 col-12 mx-md-2 mb-sm-2 shadow d-flex justify-content-center">
                      <div class="info-box py-4">
                        <span class="info-box-icon"><i class="fas fa-route fa-5x"></i></span>
                      </div>
                      <div class="info-box py-4 px-4">
                        <p>{{ $barangays->address }}</p>
                      </div>
                   </div>
      
                      <div class="col-lg-5 col-md-5 col-12 mb-sm-2 shadow d-flex justify-content-center">
                        <div class="info-box py-4">
                          <span class="info-box-icon"><i class="fas fa-phone fa-5x"></i></span>
                        </div>
                        <div class="info-box py-4 px-4">
                          <h4 class="py-4">{{ $barangays->contact }}</h4>
                          <small class="text-sm">Contact</small>
                        </div>
                      </div>
                      
                  </div>
                  <div class="row mt-lg-4">
      
                    <div class="col-lg-5 col-md-5 col-12 mx-md-2 mb-sm-2 shadow d-flex justify-content-center">
                        <div class="info-box py-4">
                          <span class="info-box-icon"><i class="fas fa-user fa-5x"></i></span>
                        </div>
                        <div class="info-box py-4 px-4">
                          <h4>{{ $barangays->brgy_captain_name }}</h4>
                          <small class="text-sm">Barangay Captain</small>
                        </div>
                    </div>
    
                    <div class="col-lg-5 col-md-5 col-12  d-flex justify-content-center">
                      <div class="info-box-image">
                        <img class="" src="{{ asset('assets/uploads/barangay/'.$barangays->image) }}" alt="" height="150" width="296"> 
                      </div>
                    </div>
                    
                </div>
              </div>
      
            </div>
          </div>
            {{-- <div class="col-lg-4 col-md-4 col-12 ">
              <span class="py-2 bg-info d-flex px-3" style="width: 340px;"">
                  N E W S
              </span>
              {!! html_entity_decode($barangays->widget) !!}
            </div> --}}
        </div>
    </div>
  
  <!-- End of Page Wrapper -->

  <script src="http://127.0.0.1:8000/frontend/js/bootstrap.bundle.min.js"></script>

   <!-- Alert Session -->
  <script>
     $("document").ready(function(){
          setTimeout(function(){
              $("div.alert").remove();
          }, 3000 ); // 5 secs
      });
  </script>

</body>
</html>




  {{-- <h3>{{ $barangays->name }}</h3>
  <img src="{{ asset('assets/uploads/barangay/'.$barangays->image) }}" alt=""> --}}
@endsection
@extends('layouts.frontend')

@section('content')
    <div class="container">
      <nav aria-label="breadcrumb" class="my-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Barangays</li>
        </ol>
      </nav>
        <div class="row ">
          @foreach ($barangayList as $barangay)
            <div class="col-lg-4 col-md-6 col-sn-12 my-4 d-flex justify-content-center">
              <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/uploads/barangay/'.$barangay->image) }}" class="card-img-top" alt="..." height="200">
                <div class="card-body">
                  <h5 class="card-title"><i class="fa fa-map-marker mx-2"></i>{{ $barangay->name }}</h5>
                  <h6><i class="fa fa-user mx-2"></i>{{ $barangay->brgy_captain_name }}</h6>
                  <h6><i class="fa fa-phone-square mx-2"></i>{{ $barangay->contact }}</h6>
                  <div class="card-footer">
                    <div class="row">
                      <a href="{{ url('barangay-list/info/'.$barangay->id) }}" class="btn btn-outline-secondary">View</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
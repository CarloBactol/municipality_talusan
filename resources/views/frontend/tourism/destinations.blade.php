@extends('layouts.frontend')

@section('content')
    <div class="container my-3">
        <nav aria-label="breadcrumb" class="my-4">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Destinations</li>
            </ol>
          </nav>
          <div class="row">
            @foreach ($destinations as $destination)
              <div class="col-lg-4 col-md-6 col-sn-12 my-lg-3 my-sm-2 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                  <img src="{{ asset('assets/uploads/tourisms/'.$destination->image) }}" class="card-img-top" alt="..." height="200">
                  <div class="card-body">
                    <h5 class="card-title"><i class="	fa fa-map-marker mx-2"></i>{{ $destination->name }}</h5>
                    <div class="row">
                      <p>{!! Str::limit($destination->description, 100) !!}</p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                          <a href="{{ url('destinations-list/info/'.$destination->id) }}" class="btn btn-outline-info">View</a>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
          </div>
    </div>
@endsection
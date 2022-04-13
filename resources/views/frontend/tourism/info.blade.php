@extends('layouts.frontend')

@section('content')
    <div class="container my-3 mb-4">
        <nav aria-label="breadcrumb" class="my-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/destinations-list">Destinations</a></li>
              <li class="breadcrumb-item active" aria-current="page"> {{ $destinations->name }}</li>
            </ol>
          </nav>
          <div class="row d-flex justify-content-center mt-5">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <img src="{{ url('assets/uploads/tourisms/'.$destinations->image) }}" alt="" class="" height="400" width="700"/>
            </div>       
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <h3>{{ $destinations->title }}</h3>
                <div class="row">
                    <div class="col-lg-4">
                        <span class="text-primary">Date Posted:</span> <small class="pl-4">{{ \Carbon\Carbon::parse($destinations->created_at)->isoFormat('MMM Do YYYY')}}</small>
                    </div>
                    <div class="col-lg-4">
                        <span class="text-primary">Name:</span> <small class="pl-4">{{ $destinations->name }}</small>
                    </div>
                    <div class="col-lg-4">
                        <span class="text-primary">Location:</span> <small class="pl-4">{{ $destinations->address }}</small>
                    </div>
                </div>
                <p>{!! $destinations->description !!}</p>
            </div>
        </div>
    </div>
    <hr>
@endsection
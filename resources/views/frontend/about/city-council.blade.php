@extends('layouts.frontend')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="my-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">City Council</li>
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
         
         
          <div class="row">
            @foreach ($city_councils as $city_council)
            <div class="col-lg-4 col-mg-4 col-12 d-flex justify-content-center my-md-2">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('assets/uploads/cityCouncil/'.$city_council->image ) }}" class="card-img-top" alt="..." height="200">
                    <div class="card-body">
                       <h5>Hon. {{ $city_council->name }} <span class="badge bg-success">{{ $city_council->type }}</span></h5>
                       <small class="text-info mr-2">Date Elected:</small> <span>{!! Carbon\Carbon::parse($city_council->date_elected)->isoFormat('MMM Do YYYY')!!}</span>
                       <div class="row mt-2 mb-0">
                        <a href="{{ url('about/profile-city-council/'.$city_council->id) }}" class="btn btn-outline-success">View Profile</a>
                      </div>
                    </div>
                </div>
            </div>       
            @endforeach
         </div>
   </div>
 </div>
@endsection
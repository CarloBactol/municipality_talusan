@extends('layouts.frontend')

@section('content')
<div class="container mt-3 py-lg-3 py-md-3 py-sm-2 ">
    <nav aria-label="breadcrumb" class="my-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/about/city-council">City Council</a></li>
          <li class="breadcrumb-item active" aria-current="page">City Council Profile</li>
        </ol>
    </nav>

    <div class="row d-flex justify-content-center">
        <div class="col-lg-8 col-md-8 col-sm-12 d-flex justify-content-center">
            <img src="{{ asset('assets/uploads/cityCouncil/'.$profile_city_council->image) }}" alt="" class="" height="300px !important">
        </div>
    </div>

    <div class="row mt-4  d-flex justify-content-center">
        <div class="col-lg-8 col-md-8 col-sm-12 d-flex justify-content-center">
            <h3>Talusan <span>{{ $profile_city_council->type }}</span></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="d-flex">
                <h6 class="pr-4">Name: Hon. <span class="text-lg">{{ $profile_city_council->name }}</span></h6>
            </div>
            <hr>
            <div class="row d-flex">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h6 class="pr-4">Age: <span class="text-lg">{{ $profile_city_council->age }}</span></h6>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h6 class="pr-4">Sex: <span class="text-lg">{{ $profile_city_council->sex }}</span></h6>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h6 class="pr-4">Status: <span class="text-lg">{{ $profile_city_council->status }}</span></h6>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <h6 class="pr-4">Religion: <span class="text-lg">{{ $profile_city_council->religion }}</span></h6>
                </div>
            </div>
            <hr>
            <div class="d-flex">
                <div class="col-lg-6 col-md-6 col-3">
                    <h6 class="pr-4">Address: <span class="text-lg">{{ $profile_city_council->address }}</span></h6>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-3">
                    <h6 class="pr-4">Contact: <span class="text-lg">{{ $profile_city_council->contact }}</span></h6>
                </div>
            </div>
            <hr>

            <div class="d-flex">
                <h6>Edecational Background: <span>{{ $profile_city_council->education }}</span></h6>
            </div>
            <hr>

            <div class="row d-flex">
                <div class="col-lg-12 col-md-11 col-sm-12">
                    <p>{!! $profile_city_council->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
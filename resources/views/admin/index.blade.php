@extends('layouts.admin')
@section('content')
<div class="col-md-4 d-flex justify-center">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif  
</div>
<div class="container row d-flex">
    <div class="col-lg-3 col-12 ">
        <div class="small-box bg-info px-4 py-4 rounded text-center">
            <h3>{{ $news }}</h3>
            <p>Total News Post</p>
        </div>
    </div>
    <div class="col-lg-3 col-12">
        <div class="small-box bg-info px-4 py-4 rounded text-center">
            <h3>{{ $events }}</h3>
            <p>Total Events Post</p>
        </div>
    </div>
    <div class="col-lg-3 col-12">
        <div class="small-box bg-info px-4 py-4 rounded text-center">
            <h3>{{ $videos }}</h3>
            <p>Total Videos Post</p>
        </div>
    </div>
    <div class="col-lg-3 col-12">
        <div class="small-box bg-info px-4 py-4 rounded text-center">
            <h3>{{ $sliders }}</h3>
            <p>Total Sliders Post</p>
        </div>
    </div>
</div>
<div class="container mt-3 row d-flex">
    <div class="col-lg-3 col-12 ">
        <div class="small-box bg-info px-4 py-4 rounded text-center">
            <h3>{{ $awards }}</h3>
            <p>Total Awards Post</p>
        </div>
    </div>
    <div class="col-lg-3 col-12">
        <div class="small-box bg-info px-4 py-4 rounded text-center">
            <h3>{{ $barangays }}</h3>
            <p>Total Barangays </p>
        </div>
    </div>
    <div class="col-lg-3 col-12">
        <div class="small-box bg-info px-4 py-4 rounded text-center">
            <h3>{{ $tourism }}</h3>
            <p>Total Tourism Post</p>
        </div>
    </div>
    <div class="col-lg-3 col-12">
        <div class="small-box bg-info px-4 py-4 rounded text-center">
            <h3>{{ $lgo }}</h3>
            <p>Total LGO </p>
        </div>
    </div>
</div>
@endsection
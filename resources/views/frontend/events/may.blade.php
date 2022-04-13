@extends('layouts.frontend')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="my-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Events List</li>
            </ol>
          </nav>

          <div class="row d-flex justify-content-center">
              <div class="col-lg-4 ">
                <form action="{{ route('frontend.events.may') }}" method="GET" enctype="multipart/form">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="form-group d-flex">
                            <select class="form-select" name="query" aria-label="Default select example">
                              <option selected>Select Year Record</option>
                              <option value="2022">2022</option>
                              <option value="2021">2021</option>
                            </select>
                              <button class="btn btn-primary" type="submit">Search</button>
                          </div>
                      </div>
                  </div>
                </form>
              </div>
          </div>

          <div class="row mt-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link {{ 'events-list/january' == request()->path() ? 'active' : '' }}" aria-current="page" href="{{ url('events-list/january') }}">January</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ 'events-list/february' == request()->path() ? 'active' : '' }}" aria-current="page" href="{{ url('events-list/february') }}">February</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ 'events-list/march' == request()->path() ? 'active' : '' }}" aria-current="page" href="{{ url('events-list/march') }}">March</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ 'events-list/april' == request()->path() ? 'active' : '' }}" aria-current="page" href="{{ url('events-list/april') }}">April</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ 'events-list/may' == request()->path() ? 'active' : '' }}" aria-current="page" href="{{ url('events-list/may') }}">May</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ 'events-list/june' == request()->path() ? 'active' : '' }}" aria-current="page" href="{{ url('events-list/june') }}">June</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ 'events-list/july' == request()->path() ? 'active' : '' }}" aria-current="page" href="{{ url('events-list/july') }}">July</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ 'events-list/august' == request()->path() ? 'active' : '' }}" aria-current="page" href="{{ url('events-list/august') }}">August</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ 'events-list/september' == request()->path() ? 'active' : '' }}" aria-current="page" href="{{ url('events-list/september') }}">September</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ 'events-list/october' == request()->path() ? 'active' : '' }}" aria-current="page" href="{{ url('events-list/october') }}">October</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ 'events-list/november' == request()->path() ? 'active' : '' }}" aria-current="page" href="{{ url('events-list/november') }}">November</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ 'events-list/december' == request()->path() ? 'active' : '' }}" aria-current="page" href="{{ url('events-list/december') }}">December</a>
                </li>
            </ul>
          </div>
          <div class="row">
            @if (count($may))
            @foreach ($may as $ma)
            <div class="col-lg-4 col-md-6 col-sm-12 my-lg-4 d-flex justify-content-center my-sm-2">
                <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/uploads/events/'.$ma->image) }}" class="card-img-top" alt="..." height="200">
                <div class="card-body">
                    <h6 class="card-title">{{ $ma->title }}</h6>
                    <small>{{ \Carbon\Carbon::parse($may->created_at)->isoFormat('MMM Do YYYY') }}</small>
                    <small>{!! Str::limit($ma->description, 70) !!}</small>
                    <div class="card-footer"><a href="{{ url('events-update/'.$ma->id) }}">Read Full</a></div>
                </div>
                </div>
            </div>
            @endforeach
            @else
              <div class="row mt-5">
                  <div class="col-lg-6">
                    <p>No available records! or Please select Year records.</p>
                  </div>
              </div>
            @endif
          </div>
    </div>
@endsection
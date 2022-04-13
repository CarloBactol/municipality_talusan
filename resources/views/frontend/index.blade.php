@extends('layouts.frontend')
@section('content')

  @include('layouts.includes.slider-frontend')

      <div class="container">
        <div class="row ">
          <div>
            @include('layouts.includes.news')
          </div>
        </div>

        <div class="row">
          <div>
            @include('layouts.includes.events')
          </div>
        </div>
      </div>

      <div class="container">
        @include('layouts.includes.videos')
      </div>

      @include('layouts.includes.awards')
  
@endsection
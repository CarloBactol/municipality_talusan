@extends('layouts.frontend')

@section('css-news-frontend')

<style>
    @media screen and (min-width: 400px){
        .row > .col-sm-12 > img{
            height: 200;
            widows: 200;
            
        }
    }
</style>

@endsection

@section('content')
    <div class="container mb-4">
        <nav aria-label="breadcrumb" class="my-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="/news-list/january">News List</a></li>
              <li class="breadcrumb-item active" aria-current="page"> {{ $news->title }}</li>
            </ol>
          </nav>
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <img src="{{ url('assets/uploads/news/'.$news->image) }}" alt="" class="" height="400" width="700"/>
            </div>       
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <h3>{{ $news->title }}</h3>
                <div class="row">
                    <div class="col-lg-4">
                        <span class="text-primary">Date Posted:</span> <small class="pl-4">{{ \Carbon\Carbon::parse($news->created_at)->isoFormat('MMM Do YYYY')}}</small>
                    </div>
                    <div class="col-lg-4">
                        <span class="text-primary">Author:</span> <small class="pl-4">{{ $news->author }}</small>
                    </div>
                </div>
                <p>{!! $news->description !!}</p>
            </div>
        </div>
    </div>
    <hr>
@endsection
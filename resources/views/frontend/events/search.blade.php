@extends('layouts.frontend')

@section('content')
   <div class="container mt-5">
       <form action="{{ route('frontend.events.search') }}" method="post" enctype="multipart/form">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="text" name="query" class="form-control">
                        <button class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            {{ dd($search) }}
        </div>
   </div>
@endsection
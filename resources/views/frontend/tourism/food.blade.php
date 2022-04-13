@extends('layouts.frontend')

@section('content')
 <div class="container">
     <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <div class="py-4 text-center">
                 <h2>Famous Foods in Talusan</h2>
             </div>
         </div>
        <div class="container">
            <div class="row ">
                @foreach ($foods as $food)
                <div class="col-lg-4 col-md-4 col-sm-12 mb-lg-5 mb-md-4 mb-sm-3">
                    <div class="card" style="width: 370px;">
                        <img src="{{ asset('assets/uploads/foods/'.$food->image) }}" class="card-img-top" alt="..." height="200">
                        <div class="card-body">
                        <h5 class="card-title">{{ $food->name }}</h5>
                        <p>{!! $food->description !!}</p>
                        <div class="row">
                            <a href="{{ url('food-info/'.$food->id) }}" class="btn btn-outline-info">Read more</a>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
     </div>
 </div>
@endsection

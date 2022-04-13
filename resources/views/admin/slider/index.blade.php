@extends('layouts.admin')

@section('slider-css')

    <style>
        img{
            border: 5px solid rgb(63, 196, 206) !important;
            border-radius: 50%;
        }
    </style>
@endsection

@section('content')
<div class="col-md-4 d-flex justify-center">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif  
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h1>Slider Page</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ url('add-slider') }}" class="btn btn-primary ml-auto">Create</a>
                        </div>
                        <div class=" col-md-6 d-flex justify-content-end">
                            <h5 class="text-dark">Notice: <span class="text-info">Only Three slider can activate!</span></h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col-2">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ( $sliders as $slider)
                            <tr>
                              <th scope="row">{{ $slider->id }}</th>
                              <td>{{ $slider->name }}</td>
                              <td>{!! Str::limit($slider->description, 50) !!}</td>
                              <td>
                                  <img src="{{ asset('assets/uploads/slider/'.$slider->image) }}" alt="image" height="70" width="70">
                              </td>
                              <td>
                                  <a href="{{ url('edit-slider/'.$slider->id) }}" class="btn btn-info">Edit</a>
                                  <a href="{{ url('delete-slider/'.$slider->id) }}" class="btn btn-danger">DeActive</a>
                              </td>
                            </tr>                  
                            @endforeach          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
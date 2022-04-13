@extends('layouts.admin')
@section('datable-css')
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
                    <h1>MapList Page</h1>
                    <a href="{{ url('add-how-to-get-there') }}" class="btn btn-primary ml-auto">Create</a>
                </div>
                <div class="card-body">
                    <table class="table" id="myTable">
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
                            @foreach ( $maps as $map)
                            <tr>
                              <th scope="row">{{ $map->id }}</th>
                              <td>{{ $map->name }}</td>
                              <td>{!! Str::limit($map->description, 30) !!}</td>
                              <td>
                                  <img src="{{ asset('assets/uploads/map/'.$map->image) }}" alt="image" height="70" width="70">
                              </td>
                              <td style="display: inline-flex">
                                  <a href="{{ url('edit-how-to-get-there/'.$map->id) }}" class="btn btn-outline-info mr-2"><i class="fa fa-edit"></i></a>
                                  <a href="{{ url('delete-how-to-get-there/'.$map->id) }}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
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
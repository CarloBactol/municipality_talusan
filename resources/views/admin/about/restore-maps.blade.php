@extends('layouts.admin')
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
            <h1>Archives</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date Elected</th>
                    <th scope="col">Type</th>
                    <th scope="col">Image</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Last_updated</th>
                    <th scope="col">Deleted_at</th>
                    <th scope="col-2">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $maps as $map )
                    <tr>
                      <th scope="row">{{ $map->id }}</th>
                      <td>{{ $map->name }}</td>
                      <td>{{ $map->date_elected }}</td>
                      <td>{{ $map->type }}</td>
                      <td>
                          <img src="{{ asset('assets/uploads/map/'.$map->image) }}" alt="image" height="70" width="70">
                      </td>
                      <td>{!! Carbon\Carbon::parse($map->created_at)->isoFormat('MMM Do YYYY') !!}</td>
                      <td>{!! Carbon\Carbon::parse($map->updated_at)->isoFormat('MMM Do YYYY') !!}</td>
                      <td>{!! Carbon\Carbon::parse($map->deleted_at)->isoFormat('MMM Do YYYY') !!}</td>
                      <td>
                        <a href="{{ url('restore-maps/post/' .$map->id) }}" class="btn btn-success">Restore</a>
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
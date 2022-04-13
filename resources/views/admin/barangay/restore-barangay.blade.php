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
                    <th scope="col">Brgy. Captain Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Created</th>
                    <th scope="col">Last updated</th>
                    <th scope="col">Deleted</th>
                    <th scope="col-2">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $barangays as $barangay )
                    <tr>
                      <th scope="row">{{ $barangay->id }}</th>
                      <td>{{ $barangay->name }}</td>
                      <td>{{ $barangay->brgy_captain_name }}</td>
                      <td>{{ $barangay->contact }}</td>
                      <td>{!! Str::limit($barangay->description, 40) !!}</td>
                      <td>
                          <img src="{{ asset('assets/uploads/barangay/'.$barangay->image) }}" alt="image" height="70" width="70">
                      </td>
                      <td>{!! Carbon\Carbon::parse($barangay->created_at)->isoFormat('MMM Do YYYY') !!}</td>
                      <td>{!! Carbon\Carbon::parse($barangay->updated_at)->isoFormat('MMM Do YYYY') !!}</td>
                      <td>{!! Carbon\Carbon::parse($barangay->deleted_at)->isoFormat('MMM Do YYYY') !!}</td>
                      <td>
                        <a href="{{ route('admin.barangay.info', $barangay->id) }}" class="btn btn-success">Restore</a>
                      </td>
                    </tr>                  
                    @endforeach          
                </tbody>
              </table>
                <div class="mt-3">
                {{ $barangays->links() }}
              </div>
        </div>
    </div>
    </div>
  </div>
</div>
@endsection
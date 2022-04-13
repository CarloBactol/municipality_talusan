@extends('layouts.admin')

@section('datable-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
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
            <h1>Archives</h1>
        </div>
        <div class="card-body">
            <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Address</th>
                    <th scope="col">Created</th>
                    <th scope="col">Last updated</th>
                    <th scope="col">Deleted</th>
                    <th scope="col-2">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $destinations as $destination )
                    <tr>
                      <th scope="row">{{ $destination->id }}</th>
                      <td>{{ $destination->name }}</td>
                      <td>{!! Str::limit($destination->description, 50) !!}</td>
                      <td>{{ $destination->address }}</td>
                      <td>{!! Carbon\Carbon::parse($destination->created_at)->isoFormat('MMM Do YYYY')!!}</td>
                      <td>{!! Carbon\Carbon::parse($destination->updated_at)->isoFormat('MMM Do YYYY')!!}</td>
                      <td>{!! Carbon\Carbon::parse($destination->deleted_at)->isoFormat('MMM Do YYYY')!!}</td>
                      <td>
                        <a href="{{ route('admin.tourism.info', $destination->id) }}" class="btn btn-success">Restore</a>
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


@section('datable-js')
<script src="http://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
         $('#myTable').DataTable();

    } );
</script>
@endsection
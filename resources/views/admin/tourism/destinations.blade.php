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
                    <h1>Destinations</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ url('add-destinations') }}" class="btn btn-primary ml-auto">Create</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" id="myTable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Address</th>
                            <th scope="col">Image</th>
                            <th scope="col-2">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ( $destinations as $destination)
                            <tr>
                              <th scope="row">{{ $destination->id }}</th>
                              <td>{{ $destination->name }}</td>
                              <td>{!! Str::limit( $destination->description, 50) !!}</td>
                              <td>{{ $destination->address }}</td>
                              <td>
                                  <img src="{{ asset('assets/uploads/tourisms/'.$destination->image) }}" alt="image" height="70" width="70">
                              </td>
                              <td class="row d-block justify-content-center">
                                  <a href="{{ url('edit-destinations/'.$destination->id) }}" class=" btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                  <a href="{{ url('delete-destinations/'.$destination->id) }}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
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
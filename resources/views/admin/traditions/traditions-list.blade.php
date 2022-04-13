@extends('layouts.admin')

@section('datable-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="container">
    <div class="col-md-4 d-flex justify-center">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif  
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h1>Tradition Page</h1>
                    <a href="{{ url('add-traditions') }}" class="btn btn-primary ml-auto">Create</a>
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
                            @foreach ( $traditions as $tradition)
                            <tr>
                              <th scope="row">{{ $tradition->id }}</th>
                              <td>{{ $tradition->name }}</td>
                              <td >{!! Str::limit($tradition->description, 100)!!}</td>
                              <td>
                                  <img src="{{ asset('assets/uploads/traditions/'.$tradition->image) }}" alt="image" height="70" width="70">
                              </td>
                              <td class="row d-flex justify-content-center">
                                  <a href="{{ url('edit-traditions/'.$tradition->id) }}" class="btn btn-sm btn-outline-info mr-lg-2"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                  <a href="{{ url('delete-traditions/'.$tradition->id) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
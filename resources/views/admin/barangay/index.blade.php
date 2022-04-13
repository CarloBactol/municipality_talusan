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
                    <h1>Barangay Page</h1>
                    <a href="{{ url('add-barangay') }}" class="btn btn-primary ml-auto">Create</a>
                </div>
                <div class="card-body">
                    <table class="table" id="myTable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Brgy. Captain</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Address</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col-2">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ( $barangays as $barangay)
                            <tr>
                              <th scope="row">{{ $barangay->id }}</th>
                              <td>{{ $barangay->name }}</td>
                              <td>{{ $barangay->brgy_captain_name }}</td>
                              <td>{{ $barangay->contact }}</td>
                              <td>{{ $barangay->address }}</td>
                              <td>{!! Str::limit($barangay->description, 50)!!}</td>
                              <td>
                                  <img src="{{ asset('assets/uploads/barangay/'.$barangay->image) }}" alt="image" height="70" width="70">
                              </td>
                              <td style="display: inline-flex">
                                  <a href="{{ url('edit-barangay/'.$barangay->id) }}" class="btn btn-outline-info mr-2"><i class="fa fa-edit"></i></a>
                                  <a href="{{ url('delete-barangay/'.$barangay->id) }}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
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


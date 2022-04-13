@extends('layouts.admin')

@section('datable-css')

<style>
    img{
        border: 1px solid #ccc !important;
        background-color: rgb(27, 39, 209);
        border-radius: 50%;
    }
</style>

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
<div class="container mb-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h1>Awards Page</h1>
                    <a href="{{ url('add-awards') }}" class="btn btn-primary ml-auto">Create</a>
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
                            @foreach ( $awards as $award)
                            <tr>
                              <th scope="row">{{ $award->id }}</th>
                              <td>{{ $award->name }}</td>
                              <td>{!! Str::limit($award->description, 50) !!}</td>
                              <td>
                                  <img src="{{ asset('assets/uploads/awards/'.$award->image) }}" alt="image" height="70" width="70">
                              </td>
                              <td style="display: inline-flex">
                                  <a href="{{ url('edit-awards/'.$award->id) }}" class="btn btn-outline-info mr-2"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                  <a href="{{ url('delete-awards/'.$award->id) }}" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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



@extends('layouts.admin')

@section('datable-css')

<style>
    @media screen and (min-width: 1200px){
        iframe{
            height: 100px;
            width: 200px !important;
            border: 5px solid rgb(63, 196, 206) !important;
        }
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
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h1>Videos Page</h1>
                <a href="{{ url('add-videos') }}" class="btn btn-primary ml-auto">Create</a>
            </div>
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Widget Embed YT</th>
                        <th scope="col-2">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ( $videos as $video )
                        <tr>
                          <th scope="row">{{ $video->id }}</th>
                          <td>{{ $video->name }}</td>
                          <td>{!! $video->widget !!}</td>
                          <td class="d-flex">
                              <a href="{{ url('edit-videos/'.$video->id) }}" class="btn btn-outline-info mr-lg-2"><i class="fa fa-edit" aria-hidden="true"></i></a>
                              <a href="{{ url('delete-videos/'.$video->id) }}" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                          </td>
                        </tr>                  
                        @endforeach          
                    </tbody>
                  </table>
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
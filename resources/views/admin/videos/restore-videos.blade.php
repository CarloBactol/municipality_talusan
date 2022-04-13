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
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="card">
        <div class="card-header">
            <h1>Archives Videos</h1>
            <a href="{{ url('videos') }}" class="btn btn-outline-info ml-auto"><i class="fa fa-arrow-left" aria-hidden="true"></i><span class="text-md ml-2">Back</span></a>
        </div>
        <div class="card-body">
            <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Widget Embed YT</th>
                    <th scope="col">Created</th>
                    <th scope="col">Last updated</th>
                    <th scope="col">Deleted</th>
                    <th scope="col-2">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $videos as $video )
                    <tr>
                      <th scope="row">{{ $video->id }}</th>
                      <td>{{ $video->name }}</td>
                      <td> {!! $video->widget !!}</td>
                      <td>{{ Carbon\Carbon::parse($video->created_at)->isoFormat('MMM Do YYYY') }}</td>
                      <td>{{ Carbon\Carbon::parse($video->updated_at)->isoFormat('MMM Do YYYY') }}</td>
                      <td>{{ Carbon\Carbon::parse($video->deleted_at)->isoFormat('MMM Do YYYY') }}</td>
                      <td>
                        <a href="{{ route('admin.videos.info', $video->id) }}" class="btn btn-success">Restore</a>
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
@extends('layouts.admin')

@section('slider-css')
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
            <h1>Archives Sliders</h1>
            <a href="{{ url('slider') }}" class="btn btn-outline-info ml-auto"><i class="fa fa-arrow-left" aria-hidden="true"></i><span class="text-md ml-2">Back</span></a>
        </div>
        <div class="card-body">
            <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Last_updated</th>
                    <th scope="col">Deleted_at</th>
                    <th scope="col-2">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $restores as $restore )
                    <tr>
                      <th scope="row">{{ $restore->id }}</th>
                      <td>{{ $restore->name }}</td>
                      <td>{{ $restore->description }}</td>
                      <td>
                          <img src="{{ asset('assets/uploads/slider/'.$restore->image) }}" alt="image" height="70" width="70">
                      </td>
                      <td>{!! Carbon\Carbon::parse($restore->created_at)->isoFormat('MMM-Do-YYYY')!!}</td>
                      <td>{!! Carbon\Carbon::parse($restore->updated_at)->isoFormat('MMM-Do-YYYY')!!}</td>
                      <td>{!! Carbon\Carbon::parse($restore->deleted_at)->isoFormat('MMM-Do-YYYY')!!}</td>
                      <td>
                        <a href="{{ route('admin.slider.info', $restore->id) }}" class="btn btn-success">Activate</a>
                      </td>
                    </tr>                  
                    @endforeach          
                </tbody>
              </table>
                <div class="mt-3">
                {{ $restores->links() }}
              </div>
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
@extends('layouts.admin')

@if ( auth()->user()->super_admin == 'super_admin')
@section('datable-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection
@else
@section('datable-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection
@endif

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
        <div class="col-lg-12 cl-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h1>Archives</h1>
                </div>
                <div class="card-body">
                    <table class="table my-lg-2" id="myTable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role As</th>
                            <th scope="col">Super Admin</th>
                            <th scope="col">Created</th>
                            <th scope="col">Last updated</th>
                            <th scope="col">Deleted</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ( $restores as $restore )
                            <tr>
                              <th scope="row">{{ $restore->id }}</th>
                              <td>{{ $restore->name }}</td>
                              <td>{!! $restore->email !!}</td>
                              <td>Admin</td>
                              <td>{{ $restore->super_admin }}</td>
                              <td>{!! Carbon\Carbon::parse($restore->created_at)->isoFormat('MMM-Do-YYYY') !!}</td>
                              <td>{!! Carbon\Carbon::parse($restore->updated_at)->isoFormat('MMM-Do-YYYY') !!}</td>
                              <td>{!! Carbon\Carbon::parse($restore->deleted_at)->isoFormat('MMM-Do-YYYY') !!}</td>
                              <td>
                                <a href="{{ url('restore-admin/info/'. $restore->id) }}" class="btn btn-success">Restore</a>
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

@if ( auth()->user()->super_admin == 'super_admin')
@section('datable-js')
<script src="http://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
         $('#myTable').DataTable();

    } );
</script>
@endsection
@else
@section('datable-js')
<script src="http://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
         $('#myTable').DataTable();

    } );
</script>
@endsection
@endif

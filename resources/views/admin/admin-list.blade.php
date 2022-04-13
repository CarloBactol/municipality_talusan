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
                    <h1>Admin List</h1>
                    @if ( auth()->user()->super_admin == 'super_admin')
                    <a href="{{ url('add-admin') }}" class="btn btn-primary ml-auto">Add</a>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table" id="myTable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date Created</th>
                            <th scope="col">Role</th>
                            @if ( auth()->user()->super_admin == 'super_admin')
                            <th scope="col" colspan="2">Super Admin</th>
                            @endif

                          </tr>
                        </thead>
                        <tbody>
                            @foreach ( $admin_list as $admin)
                            <tr>
                              <th scope="row">{{ $admin->id }}</th>
                              <td>{{ $admin->name }}</td>
                              <td>{{ $admin->email }}</td>
                              <td>{!! Carbon\Carbon::parse($admin->created_at)->isoFormat('MMM-Do-YYYY') !!}</td>
                              <td>Admin</td>
                              @if ( auth()->user()->super_admin == 'super_admin')
                              <td>{{ $admin->super_admin }}</td>
                              <td>
                                      
                                  <a href="{{ url('delete-admin/'.$admin->id) }}" class="btn  btn-outline-danger"><i class="fa fa-trash"></i></a>
                              </td>
                               @endif
                              {{-- <td style="display: inline-flex">
                                  <a href="{{ url('edit-admin/'.$admin->id) }}" class="btn btn-info mr-2">Edit</a>
                                  <a href="{{ url('delete-admin/'.$admin->id) }}" class="btn btn-danger">Delete</a>
                              </td> --}}
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

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
                    <h1>Elected City Officials Page</h1>
                    <a href="{{ url('add-city-council') }}" class="btn btn-primary ml-auto">Create</a>
                </div>
                <div class="card-body">
                    <table class="table" id="myTable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date Elected</th>
                            <th scope="col">Type</th>
                            <th scope="col">Image</th>
                            <th scope="col-2">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ( $city_council as $city_council)
                            <tr>
                              <th scope="row">{{ $city_council->id }}</th>
                              <td>{{ $city_council->name }}</td>
                              <td>{!! Carbon\Carbon::parse( $city_council->date_elected)->isoFormat('MMM Do YYYY') !!}</td>
                              <td>{{ $city_council->type }}</td>
                              <td>
                                  <img src="{{ asset('assets/uploads/cityCouncil/'.$city_council->image) }}" alt="image" height="70" width="70">
                              </td>
                              <td style="display: inline-flex">
                                  <a href="{{ url('edit-city-council/'.$city_council->id) }}" class="btn btn-outline-info mr-2"><i class="fa fa-edit"></i></a>
                                  <a href="{{ url('delete-city-council/'.$city_council->id) }}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
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
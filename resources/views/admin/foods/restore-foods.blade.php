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
                    <h1>Archives Foods</h1>
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
                            @foreach ( $foods as $food )
                            <tr>
                              <th scope="row">{{ $food->id }}</th>
                              <td>{{ $food->name }}</td>
                              <td>{!! Str::limit( $food->description, 50) !!}</td>
                              <td>
                                  <img src="{{ asset('assets/uploads/foods/'.$food->image) }}" alt="image" height="70" width="70">
                              </td>
                              <td>{!! Carbon\Carbon::parse($food->created_at)->isoFormat('MMM-Do-YYYY')!!}</td>
                              <td>{!! Carbon\Carbon::parse($food->updated_at)->isoFormat('MMM-Do-YYYY')!!}</td>
                              <td>{!! Carbon\Carbon::parse($food->deleted_at)->isoFormat('MMM-Do-YYYY')!!}</td>
                              <td>
                                <a href="{{ url('restore-foods/info/' .$food->id) }}" class="btn btn-success">Restore</a>
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

@section('ck-editor')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

    <script>
 
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endsection

@section('datable-js')
<script src="http://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
         $('#myTable').DataTable();

    } );
</script>
@endsection
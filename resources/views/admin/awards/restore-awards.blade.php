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
<div class="card">
    <div class="card-header">
        <h1>Archives</h1>
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
                @foreach ( $awards as $award )
                <tr>
                  <th scope="row">{{ $award->id }}</th>
                  <td>{{ $award->name }}</td>
                  <td>{!! $award->description !!}</td>
                  <td>
                      <img src="{{ asset('assets/uploads/awards/'.$award->image) }}" alt="image" height="70" width="70">
                  </td>
                  <td>{{ $award->created_at }}</td>
                  <td>{{ $award->updated_at }}</td>
                  <td>{{ $award->deleted_at }}</td>
                  <td>
                    <a href="{{ route('admin.awards.info', $award->id) }}" class="btn btn-success">Restore</a>
                  </td>
                </tr>                  
                @endforeach          
            </tbody>
          </table>
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

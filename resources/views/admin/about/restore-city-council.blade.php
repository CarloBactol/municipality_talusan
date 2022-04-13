@extends('layouts.admin')
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
            <h1>Archives</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date Elected</th>
                    <th scope="col">Type</th>
                    <th scope="col">Image</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Last_updated</th>
                    <th scope="col">Deleted_at</th>
                    <th scope="col-2">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $city_councils as $city_council )
                    <tr>
                      <th scope="row">{{ $city_council->id }}</th>
                      <td>{{ $city_council->name }}</td>
                      <td>{{ $city_council->date_elected }}</td>
                      <td>{{ $city_council->type }}</td>
                      <td>
                          <img src="{{ asset('assets/uploads/cityCouncil/'.$city_council->image) }}" alt="image" height="70" width="70">
                      </td>
                      <td>{!! Carbon\Carbon::parse($city_council->created_at)->isoFormat('MMM Do YYYY') !!}</td>
                      <td>{!! Carbon\Carbon::parse($city_council->updated_at)->isoFormat('MMM Do YYYY') !!}</td>
                      <td>{!! Carbon\Carbon::parse($city_council->deleted_at)->isoFormat('MMM Do YYYY') !!}</td>
                      <td>
                        <a href="{{ route('admin.about.info', $city_council->id) }}" class="btn btn-success">Restore</a>
                      </td>
                    </tr>                  
                    @endforeach          
                </tbody>
              </table>
                <div class="mt-3">
                {{ $city_councils->links() }}
              </div>
        </div>
    </div>
    </div>
  </div>
</div>
@endsection
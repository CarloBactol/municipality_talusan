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
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h1>Add Slider</h1>
                                <a href="{{ url('slider') }}" class="btn btn-outline-info ml-auto"><i class="fa fa-arrow-left" aria-hidden="true"></i><span class="text-md ml-2">Back</span></a>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ url('insert-slider') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-4">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                        
                                    <div class="row mb-4">
                                        <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('description') }}</label>
                        
                                        <div class="col-md-6">
                                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  required autocomplete="current-description">
                        
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                        <label for="image" class=" col-form-label text-md-end mr-2">{{ __('image') }}</label>
                                        {{-- <small class="text-warning  col-form-label text-md-end"> <i class="fa fa-exclamation-triangle"></i> The image must be a 1000x1000 dimension!</small> --}}
                                        </div>
                        
                                        <div class="col-md-6 ">
                                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required autocomplete="current-image">
                        
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                        
                                            <button class="btn btn-primary form-control mt-4" type="submit" name="save">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Edit Destinations</h1>
            <a href="{{ url('destinations') }}" class="btn btn-outline-info ml-auto"><i class="fa fa-arrow-left" aria-hidden="true"></i><span class="text-md ml-2">Back</span></a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('update-destinations/'.$destinations->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-4">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $destinations->name }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="row mb-4">
                    <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
    
                    <div class="col-md-6">
                        <textarea id="editor" name="description" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10">{!! $destinations->description !!}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="row mb-4">
                    <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('address') }}</label>
    
                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $destinations->address }}"  required autocomplete="current-description">
    
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="row mb-4">
                    <div class="col-md-4">
                    <label for="image" class=" col-form-label text-md-end mr-2">{{ __('Image') }}</label>
                    {{-- <small class="text-warning  col-form-label text-md-end"> <i class="fa fa-exclamation-triangle"></i> The image must be a 1000x1000 dimension!</small> --}}
                    </div>
    
                    @if ($destinations->image)
                    <img src="{{ asset('assets/uploads/tourisms/'.$destinations->image) }}" alt="image" height="70" width="70">
                    @endif
    
                    <div class="col-md-6">
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"  autocomplete="current-image">
    
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
    
                        <button class="btn btn-primary form-control mt-4" type="submit" name="save">Update</button>
                    </div>
                </div>
            </form>
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
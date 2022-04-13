@extends('layouts.admin')
@section('datable-css')
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
                    <h1>Edit Maps</h1>
                    <a href="{{ url('how-to-get-there-list') }}" class="btn btn-outline-info ml-auto"><i class="fa fa-arrow-left" aria-hidden="true"></i><span class="text-md ml-2">Back</span></a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('update-how-to-get-there/'.$maps->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="row mb-4">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $maps->name }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <textarea id="editor" name="description" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10">{!! $maps->description !!}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        
                        <div class="row mb-4">
                            
                            <div class="col-md-4 d-flex">
                                <label for="image" class=" col-form-label text-md-end mr-2">{{ __('Image') }}</label>
                                @if ($maps->image)
                                <img src="{{ asset('assets/uploads/map/'.$maps->image) }}" alt="image" height="70" width="70" class="ml-auto">
                                @endif
                            </div>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"   autocomplete="current-image">
            
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
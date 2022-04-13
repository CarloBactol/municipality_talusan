@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="col-md-4 d-flex justify-center">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif  
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h1>Add Tradition</h1>
                    <a href="{{ url('traditions-list') }}" class="btn btn-outline-info ml-auto"><i class="fa fa-arrow-left" aria-hidden="true"></i><span class="text-md ml-2">Back</span></a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('insert-traditions') }}" enctype="multipart/form-data">
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
                                <textarea id="editor" name="description" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10"></textarea>
            
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
                            </div>
            
                            <div class="col-md-6">
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
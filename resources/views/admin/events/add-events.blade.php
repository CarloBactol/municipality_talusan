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
                    <h1>Add Events</h1>
                    <a href="{{ url('events') }}" class="btn btn-outline-info ml-auto"><i class="fa fa-arrow-left" aria-hidden="true"></i><span class="text-md ml-2">Back</span></a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('insert-events') }}" enctype="multipart/form-data">
                        @csrf
            
                        <div class="row mb-4">
                            <label for="author" class="col-md-4 col-form-label text-md-end">{{ __('Author') }}</label>
                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" required autocomplete="author" autofocus>
                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <label for="start" class="col-md-4 col-form-label text-md-end">{{ __('Start') }}</label>
                            <div class="col-md-6">
                                <input id="start" type="datetime-local" class="form-control @error('start') is-invalid @enderror" name="start" value="{{ old('start') }}" required autocomplete="start" autofocus>
                                @error('start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <label for="end" class="col-md-4 col-form-label text-md-end">{{ __('End') }}</label>
                            <div class="col-md-6">
                                <input id="end" type="datetime-local" class="form-control @error('end') is-invalid @enderror" name="end" value="{{ old('end') }}" required autocomplete="end" autofocus>
                                @error('end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <label for="date-elected" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <div class="form-group" >
                                    <textarea id="editor" name="description" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10"></textarea>
                                </div>
                                @error('date-elected')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
            
                        <div class="row mb-4">
                            <label for="date-elected" class="col-md-4 col-form-label text-md-end">{{ __('Type') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" name="type" aria-label="Default select example">
                                    <option selected>Select Type</option>
                                    <option value="AntiDrugs">Anti Drugs</option>
                                    <option value="SpokenPoetry">Spoken Poetry</option>
                                    <option value="Tiktok">Tiktok</option>
                                    <option value="FaceMaskMaking">Face Mask Making</option>
                                    <option value="PosterMaking">Poster Making</option>
                                    <option value="Others">Others</option>
                                </select>
                                @error('date-elected')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                       
            
                        <div class="row mb-4">
                            <div class="col-md-4">
                            <label for="image" class=" col-form-label text-md-end mr-2">{{ __('Image') }}</label>
                            </div>
            
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"  required autocomplete="current-image">
            
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
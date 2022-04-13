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
<div class="container mb-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h1>Edit News</h1>
                    <a href="{{ url('news') }}" class="btn btn-outline-info ml-auto"><i class="fa fa-arrow-left" aria-hidden="true"></i><span class="text-md ml-2">Back</span></a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('update-news/'.$news->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
            
                        <div class="row mb-4">
                            <label for="author" class="col-md-4 col-form-label text-md-end">{{ __('Author') }}</label>
                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ $news->author }}" required autocomplete="author" autofocus>
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
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $news->title }}" required autocomplete="title" autofocus>
                                @error('title')
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
                                    <textarea id="editor" name="description" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10">{{ $news->description }}</textarea>
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
                                <select class="form-control" name="type" aria-label="Default select example">
                                    <option value="Covid" {{ $news->type == "Covid" ? 'selected' : '' }}>Covid</option>
                                    <option value="Electric" {{ $news->type == "Electric" ? 'selected' : '' }}>Electric</option>
                                    <option value="Education" {{ $news->type == "Education" ? 'selected' : '' }}>Education</option>
                                    <option value="Others" {{ $news->type == "Others" ? 'selected' : '' }}>Others</option>
                                </select>
                                @error('date-elected')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
            
                        <div class="row mb-4">
                            <div class="col-md-4 d-flex">
                            <label for="image" class=" col-form-label text-md-end mr-2">{{ __('Image') }}</label>
                            @if ($news->image)
                            <img src="{{ asset('assets/uploads/news/'.$news->image) }}" alt="image" height="70" width="70" class="ml-auto">
                            @endif
                            {{-- <small class="text-warning  col-form-label text-md-end"> <i class="fa fa-exclamation-triangle"></i> The image must be a 1000x1000 dimension!</small> --}}
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
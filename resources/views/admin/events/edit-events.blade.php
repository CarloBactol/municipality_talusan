@extends('layouts.admin')

@section('datable-css')
<style>
    img{
        border: 5px solid rgb(63, 196, 206) !important;
        border-radius: 50%;
    }

    .datepicker{
        background-color: #000;
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
                    <h1>Edit Events</h1>
                    <a href="{{ url('events') }}" class="btn btn-outline-info ml-auto"><i class="fa fa-arrow-left" aria-hidden="true"></i><span class="text-md ml-2">Back</span></a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('update-events/'.$events->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
            
                        <div class="row mb-4">
                            <label for="author" class="col-md-4 col-form-label text-md-end">{{ __('Author') }}</label>
                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ $events->author }}" required autocomplete="author" autofocus>
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
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $events->title }}" required autocomplete="title" autofocus>
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
                                <input id="start" type="datetime-local" class="form-control datepicker @error('start') is-invalid @enderror" name="start"  value="{!! Carbon\Carbon::parse($events->start)->format('Y-m-d') !!}  required autocomplete="start" autofocus>
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
                                <input id="end" type="datetime-local" class="form-control datepicker @error('end') is-invalid @enderror" name="end" value="{!! Carbon\Carbon::parse($events->end)->format('Y-m-d') !!}" required autocomplete="end" autofocus>
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
                                    <textarea id="editor" name="description" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10">{{ $events->description }}</textarea>
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
                                    <option selected>Select Type</option>
                                    <option value="Electric" {{ $events->type == "Electric" ? 'selected' : '' }}>Electric</option>
                                    <option value="SpokenPoetry" {{ $events->type == "SpokenPoetry" ? 'selected' : '' }}>Spoken Poetry</option>
                                    <option value="Tiktok" {{ $events->type == "Tiktok" ? 'selected' : '' }}>Tiktok</option>
                                    <option value="FaceMaskMaking" {{ $events->type == "" ? 'selected' : '' }}>Face Mask Making</option>
                                    <option value="PosterMaking" {{ $events->type == "PosterMaking" ? 'selected' : '' }}>Poster making</option>
                                    <option value="others" {{ $events->type == "Others" ? 'selected' : '' }}>Others</option>
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
                            @if ($events->image)
                            <img src="{{ asset('assets/uploads/events/'.$events->image) }}" alt="image" height="70" width="70" class="ml-auto">
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
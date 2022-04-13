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
                    <h1>Add Barangay</h1>
                    <a href="{{ url('barangay') }}" class="btn btn-outline-info ml-auto"><i class="fa fa-arrow-left" aria-hidden="true"></i><span class="text-md ml-2">Back</span></a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('insert-barangay') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
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
                            <label for="brgy_captain_name" class="col-md-4 col-form-label text-md-end">{{ __('Brgy. Capatain Name') }}</label>
                            <div class="col-md-6">
                                <input id="brgy_captain_name" type="text" class="form-control @error('brgy_captain_name') is-invalid @enderror" name="brgy_captain_name" value="{{ old('name') }}" required autocomplete="brgy_captain_name" autofocus>
                                @error('brgy_capatain_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <label for="contact" class="col-md-4 col-form-label text-md-end">{{ __('Contact') }}</label>
                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('name') }}" required autocomplete="contact" autofocus>
                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('name') }}" required autocomplete="address" autofocus>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('description') }}</label>
            
                            <div class="col-md-6">
                                <div class="form-group" >
                                    <textarea id="editor" name="description" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10"></textarea>
                                </div>
            
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <label for="map" class="col-md-4 col-form-label text-md-end">{{ __('map embed') }}</label>
            
                            <div class="col-md-6">
                                <input id="map" type="text" class="form-control @error('map') is-invalid @enderror" name="map" value="{{ old('map') }}"  required autocomplete="current-map">
            
                                @error('map')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
            
                        
                        {{-- <div class="row mb-4">
                            <label for="widget" class="col-md-4 col-form-label text-md-end">{{ __('widget') }}</label>
            
                            <div class="col-md-6">
                                <input id="widget" type="text" class="form-control @error('widget') is-invalid @enderror" name="widget" value="{{ old('widget') }}"  required autocomplete="current-widget">
            
                                @error('widget')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
            
                        <div class="row mb-4">
                            <div class="col-md-4">
                            <label for="image" class=" col-form-label text-md-end mr-2">{{ __('image') }}</label>
                            {{-- <small class="text-warning  col-form-label text-md-end"> <i class="fa fa-exclamation-triangle"></i> The image must be a 1000x1000 dimension!</small> --}}
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
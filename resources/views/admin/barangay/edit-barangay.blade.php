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
    <div class="card">
        <div class="card-header">
            <h1>Update Barangay</h1>
            <a href="{{ url('barangay') }}" class="btn btn-outline-info ml-auto"><i class="fa fa-arrow-left" aria-hidden="true"></i><span class="text-md ml-2">Back</span></a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('update-barangay/'.$barangays->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-4">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $barangays->name }}" required autocomplete="name" autofocus>
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
                        <input id="brgy_captain_name" type="text" class="form-control @error('brgy_captain_name') is-invalid @enderror" name="brgy_captain_name" value="{{ $barangays->brgy_captain_name }}" required autocomplete="brgy_captain_name" autofocus>
                        @error('brgy_captain_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="row mb-4">
                    <label for="contact" class="col-md-4 col-form-label text-md-end">{{ __('Contact') }}</label>
                    <div class="col-md-6">
                        <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ $barangays->contact }}" required autocomplete="contact" autofocus>
                        @error('brgy_capatain_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="row mb-4">
                    <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $barangays->address }}" required autocomplete="address" autofocus>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="row mb-4">
                    <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('description') }}</label>
    
                    <div class="col-md-6">
                        <div class="form-group" >
                            <textarea id="editor" name="description" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10">{!! $barangays->description !!}</textarea>
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
                        <input id="map" type="text" class="form-control @error('map') is-invalid @enderror" name="map" value="{{  $barangays->map  }}"  required autocomplete="current-map">
    
                        @error('map')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                {{-- <div class="row mb-4">
                    <label for="widget" class="col-md-4 col-form-label text-md-end">{{ __('widget embed') }}</label>
    
                    <div class="col-md-6">
                        <input id="widget" type="text" class="form-control @error('widget') is-invalid @enderror" name="widget" value="{{  $barangays->widget  }}"  required autocomplete="current-widget">
    
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
    
                    @if ($barangays->image)
                    <img src="{{ asset('assets/uploads/barangay/'.$barangays->image) }}" alt="image" height="70" width="70">
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
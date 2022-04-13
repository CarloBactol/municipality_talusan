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
                    <h1>Edit City Council</h1>
                    <a href="{{ url('city-council-list') }}" class="btn btn-outline-info ml-auto"><i class="fa fa-arrow-left" aria-hidden="true"></i><span class="text-md ml-2">Back</span></a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('update-city-council/'.$city_council->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $city_council->name }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>
                            <div class="col-md-6">
                                <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ $city_council->age }}" required autocomplete="age" autofocus>
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <label for="sex" class="col-md-4 col-form-label text-md-end">{{ __('Sex') }}</label>
                            <div class="col-md-6">
                                <input id="sex" type="text" class="form-control @error('sex') is-invalid @enderror" name="sex" value="{{ $city_council->sex }}" required autocomplete="sex" autofocus>
                                @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                            <div class="col-md-6">
                                <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ $city_council->status }}" required autocomplete="status" autofocus>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <label for="religion" class="col-md-4 col-form-label text-md-end">{{ __('religion') }}</label>
                            <div class="col-md-6">
                                <input id="religion" type="text" class="form-control @error('religion') is-invalid @enderror" name="religion" value="{{ $city_council->religion }}" required autocomplete="religion" autofocus>
                                @error('religion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $city_council->address }}" required autocomplete="address" autofocus>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <label for="contact" class="col-md-4 col-form-label text-md-end">{{ __('Contact') }}</label>
                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ $city_council->contact }}" required autocomplete="contact" autofocus>
                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <label for="edu-back" class="col-md-4 col-form-label text-md-end">{{ __('Education') }}</label>
                            <div class="col-md-6">
                                <input id="edu-back" type="text" class="form-control @error('edu-back') is-invalid @enderror" name="education" value="{{ $city_council->education }}" required autocomplete="edu-back" autofocus>
                                @error('edu-back')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="row mb-4">
                            <label for="date-elected" class="col-md-4 col-form-label text-md-end">{{ __('Date Elected') }}</label>
                            <div class="col-md-6">
                                <input id="date-elected" type="date" class="form-control @error('date-elected') is-invalid @enderror" name="date-elected" value="{{ $city_council->date_elected }}" required autocomplete="date-elected" autofocus>
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
                                    <option value="Mayor" {{ $city_council->type == "Mayor" ? 'selected' : '' }}>Mayor</option>
                                    <option value="ViceMayor" {{ $city_council->type == "ViceMayor" ? 'selected' : '' }}>Vice Mayor</option>
                                    <option value="Councilor" {{ $city_council->type == "Councilor" ? 'selected' : '' }}>Councilor</option>
                                </select>
                                @error('date-elected')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <label for="date-elected" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <textarea id="editor" name="description" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10">{!! $city_council->description !!}</textarea>
                                @error('date-elected')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="row mb-4">
                            <div class="col-md-4 d-flex">
                                <label for="image" class=" col-form-label text-md-end mr-2">{{ __('image') }}</label>
                                @if ($city_council->image)
                                <img src="{{ asset('assets/uploads/cityCouncil/'.$city_council->image) }}" alt="image" height="70" width="70" class="ml-auto">
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
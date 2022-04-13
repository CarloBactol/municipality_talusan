@extends('layouts.frontend')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="my-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Awards</li>
            </ol>
          </nav>

          <div class="row d-flex justify-content-center">
            @foreach ($awards as $award)
              <div class="col-lg-6 col-md-6 col-sn-12 my-4">
                <div class="card" style="width: 30rem;">
                  <img src="{{ asset('assets/uploads/awards/'.$award->image) }}" class="card-img-top" alt="..." height="400">
                  <div class="card-body">
                    <div class="accordion" id="{{ $award->id  }}">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="{{ $award->id }}">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{ $award->name }}
                          </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="{{ $award->id  }}" data-bs-parent="#{{ $award->id  }}">
                          <div class="accordion-body">
                            <p>{!! $award->description !!}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
          </div>
    </div>
@endsection
<div class="py-5">
    <div class="row">
        <div class="py-3 d-flex justify-content-center">
            <div class="display-4">
                E V E N T S
            </div>
        </div>
    </div>
    <div class="owl-carousel owl-theme mt-3">
        @foreach ($events as $event)
        <div class="card">
            <img class="card-img-top" src="{{ asset('assets/uploads/events/'.$event->image) }}" alt="Card image" height="240px">
            <div class="card-body">
              <h4 class="card-title">{{ $event->title }}</h4>
              <p class="card-text">{{ \Carbon\Carbon::parse($event->created_at)->diffForHumans() }}</p>
              <p class="card-text">{!! Str::words($event->description, 13, '...') !!}</p>
              <a href="{{ url('events-update/'.$event->id) }}" class="btn btn-outline-info">Continue Reading</a>
            </div>
          </div>    
        @endforeach
    </div>

    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="row">
                <a href="{{ url('events-list/january') }}" class="btn btn-info">View More</a>
            </div>
        </div>
    </div>
   </div>
   
     
    @section('css-news')

     <style type="text/css">
   
    </style>


    @endsection

   <div class="py-5 py-sm-5" id="news-main">
    <div class="row">
        <div class="py-3 d-flex justify-content-center">
            <div class="display-4">
                N E W S
            </div>
        </div>
    </div>
    {{-- <div class="owl-carousel owl-theme mt-3">
        @foreach ($news as $new)
        <div class="items">
            <div class="card">
                <img src="{{ asset('assets/uploads/news/'.$new->image) }}" class="card-img-top" alt="..." height="200" width="200">
                <div class="card-body">
                  <a href="{{ url('news-update/'.$new->id) }}" class="card-title">{{ $new->title }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div> --}}

        <div class="row mb-4">
            @foreach ($news as $new)
            <div class="col-lg-8">
               <div class="py-3">
                <img src="{{ secure_asset('assets/uploads/news/'.$new->image) }}" class="card-img-top" alt="..." height="500" width="500">
               </div>
               <div class="py-3">
                   <h4>{{ $new->title }}</h4>
                   <small class="text-secondary">Author: {{ $new->author }}</small></br>
                   <small class="text-secondary">{{ \Carbon\Carbon::parse($new->created_at)->diffForHumans()}}</small>
                   <p>{!! Str::limit( $new->description, 500) !!}</p><spa><a href="{{ url('news-update/'.$new->id) }}">Read more..</a></span>
               </div>
            </div>
            @endforeach

            <div class="col-lg-4 ">
                <div class="row text-center py-2 bg-info">
                    <h5>Recent News</h5>
                </div>
                @foreach ($recents as $recent)
                <div class="row ">
                    <div class="card w-100 mb-3 mb-sm-2">
                        <img src="{{ secure_asset('assets/uploads/news/'.$recent->image) }}" class="card-img-top" alt="..." height="100" width="100">
                        <div class="card-body">
                          <h5 class="card-title">{{ $recent->title }}</h5>
                          <small class="text-secondary">Author: {{ $recent->author }}</small></br>
                          <small class="text-secondary">{{ \Carbon\Carbon::parse($recent->created_at)->diffForHumans()}}</small>
                          <p class="card-text">{!! Str::limit( $recent->description, 100) !!}</p>
                          <a href="{{ url('news-update/'.$recent->id) }}" class="btn btn-md btn-outline-info"> <span class="text-center">Read</span> </a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="row">
                    <a href="{{ url('news-list/january') }}" class="btn btn-md btn-info">View more News</a>
                </div>
            </div>
        </div>
   </div>
   

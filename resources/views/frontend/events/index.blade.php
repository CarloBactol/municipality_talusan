@extends('layouts.frontend')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="my-3">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/events-list/january">Events List</a></li>
            <li class="breadcrumb-item active" aria-current="page"> {{ $events->title }}</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <img src="{{ url('assets/uploads/events/'.$events->image) }}" alt="" class="" height="400" width="700"/>
            </div>       
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <h3>{{ $events->title }}</h3>
                <div class="row">
                    <div class="col-lg-4">
                        <span class="text-primary">Date Posted:</span> <small class="pl-4">{{ \Carbon\Carbon::parse($events->created_at)->isoFormat('MMM Do YYYY')}}</small>
                    </div>
                    <div class="col-lg-4">
                        <span class="text-primary">Author:</span> <small class="pl-4">{{ $events->author }}</small>
                    </div>
                    <div class="col-lg-4">            
                        <span class="text-primary">Time Left:</span> <small class="pl-4">
                            @if (true)
                            <span class="days">completed</span>
                            {{-- <span class="hours">0</span>&nbsp; hours
                            <span class="minutes">0</span>&nbsp; mins --}}
                            @else
                            <span>Completed</span>
                            @endif
                        </small>
                    </div>
                </div>
                <p>{!! $events->description !!}</p>
            </div>
        </div>
    </div>
    
    <script  type="text/javascript">
        
        var $end = @js($events->end);
        var $start = @js($events->start);
        var deadline = new Date(`${$end}`).getTime();

        setInterval(function () {
            var now = new Date(`${$start}`).getTime();
            var t = deadline - now;

             var days = Math.floor(t / (1000*60*60*24));
             var hours = Math.floor((t % (1000*60*60*24)) / (1000*60*60));
             var minutes = Math.floor((t % (1000*60*60)) / (1000*60));
             var seconds = Math.floor((t % (1000*60)) / 1000);


             document.getElementsByClassName("days")[0].innerHTML = days + " days left";
             document.getElementsByClassName("hours")[0].innerHTML = hours;
             document.getElementsByClassName("minutes")[0].innerHTML = minutes;
             document.getElementsByClassName("seconds")[0].innerHTML = seconds;

        }, 1000);
    
     </script>
@endsection
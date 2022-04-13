
<div class="container">
    <div class="mt-4 p-5 bg-ligt text-dark">
        <div class="row">
          <div class="py-3 d-flex justify-content-center">
              <div class="display-4 ">
                A W A R D S
              </div>
          </div>
      </div>
           
      <div class="row d-flex justify-content-center mt-lg-4 mt-md-3">
        @foreach ($awards as $award)   
        <div class="card mx-lg-2 mt-sm-2" style="width: 18rem; ">
            <img src="{{ url('assets/uploads/awards/'.$award->image) }}" class="card-img-top" alt="..." height="300">
            <div class="card-body">
                <p class="card-info">{{ $award->name }}</p>
            </div>
        </div>
        @endforeach
      </div> 

      <div class="row  mt-lg-4 mt-md-3 mt-sm-2">
        <a class="btn btn-info " href="{{ url('awards-list')}}">
            View More
        </a>
     </div>
    </div>
</div>

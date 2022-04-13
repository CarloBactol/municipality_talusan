<div class="row">
    <div class="py-3 d-flex justify-content-center">
        <div class="display-4">
           V I D E O S
        </div>
    </div>
</div>
<div class="row mt-3">
  @foreach ($videos as $video)   
    <div class="col-lg-6 col-md-6 d-flex justify-content-center">
      <div class="row">
        <div class="col-md-4">
          {!! html_entity_decode($video->widget) !!}
        </div>
      </div>
    </div>
  @endforeach
</div>
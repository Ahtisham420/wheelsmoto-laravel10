@include('frontend.partials.header')
<!-- <div class="container-fliud slider">
      <div class="row m-0">
        <div class="col-12 aboutblog">
          <div class="blogHeading">
            Blog Detail
          </div>
          <div class="blogdescription">
            Elementum Libero Hac Leo Integer. Risus Hac Parturient Feugiat Litora<br>
Cursus Hendrerit Bibendum Per
          </div>

        </div>
      </div>



    </div> -->
<div class="sliderSectionEvents">
  <div class="container">
    <div class="row">
      <div class="col-12 events-heading">
        Events
      </div>
    </div>

  </div>

</div>
<div class="container">
  @if(!empty($events) && count($events) > 0)
    @foreach( $events as $event)
      <div class="row singleEvent mt-3 mb-3">
        <div class="col-12 col-sm-6 event-map pr-0 pl-0">
          <img src="{{ asset('/public/event_images/'.$event->img) }}" alt="" style="width:100%">
          <!-- <iframe src="https://www.google.com/maps/embed/v1/place?q={{$event->map_lat}},{{$event->map_lng}}&amp;key=AIzaSyDRThsOQmQXD3F7FpoUnTkAWJtFY3gKCNc" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
        </div>
        <div class="col-12 col-sm-6  events-description ">
          <h3>{{$event->event_name}}</h3>
          <p>
            {{$event->event_description}}
          </p>
          <button type="submit" class="becomrental becomrental1" style="margin-top: 20px;"><a href="{{route("event-detail",["id"=>base64_encode($event->id)])}}">view detail</a></button>

        </div>
      </div>
    @endforeach
  @endif
  <div style="color: #e4001b;">
    {{$events->links()}}
  </div>
</div>


@include('frontend.partials.advertisment-footer')




@include('frontend.partials.footer')

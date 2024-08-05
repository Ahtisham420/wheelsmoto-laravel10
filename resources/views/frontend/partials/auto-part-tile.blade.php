                            <div class="container-fluid ml-2">
                            <div id="products" class="row view-group">
                        @if(!empty($misc) && count($misc) > 0)
                        @foreach($misc as $part)
                          @php
                        $image_pic = json_decode($part->pics);
                        $pic = $image_pic[0];
                        @endphp
                      @php $class='grey';
                       @endphp
                       @if(in_array($part->id,$user_s_id))
                          @php $class="save_like00";
                         @endphp
                      @endif
                                
                            <div class="item col-xs-3 col-lg-3 mb-2 p-0">
                            <div class="card" style="border: 1px solid #bfbfbf75;width: 14rem;">
                            <a class="text-center" href="{{route('auto-part-detail',['id'=>base64_encode(base64_encode($part->id))])}}"><img class="card-img-top" src="/../../storage/app/public/{{$pic}}" style="padding:10px;height: 150px;width:200px;object-fit: cover!important;" alt="Card image cap"></a>
                                 <div class="pl-2 pb-2 pr-2 pt-2">
                                   <p class="heart-icon HomeFilterHeart" data-id="{{base64_encode($part->id)}}" data-type="auto-part" style="cursor:pointer;"><i class="fas fa-heart {{$class}}"></i></p>
                                   <p class="productPrice m-0">PKR {{number_format($part->price)}}</p>
                                    <p class="productD f-card-title m-0" data-maxlength="22"> {{$part->car_part}}</p>
                                   <p class="productTime m-0">{{ucfirst($part->part_condition)}}</p>
                               </div>
                            <!--<p class="heart-icon HomeFilterHeart" data-id="{{base64_encode($part->id)}}" data-type="auto-part" style="cursor:pointer;"><i class="fas fa-heart {{$class}}"></i></p>-->
                                <!--<div class="pl-2 pb-2 pr-2 pt-2">-->
                                <!--    <p class="productPrice m-0">₨ {{number_format($part->price)}}</p>-->
                                <!--    <p class="productD f-card-name" data-maxlength='20'>{{$part->car_part}}</p>-->
                                    <!-- <p class="text-center productD">Car</p> -->
                                <!--    <p class="productTime m-0">Auto Part.. {{$part->created_at->diffForHumans()}}</p>-->

                                <!--</div>-->
                            </div>
                        </div>
                       @endforeach
                    @endif
                           </div>
            </div>
            
<script>

    $( document ).ready(function() {
        $(".f-card-name").html(function(index, currentText) {
           

           var maxLength ='20';

            if(currentText.length >= maxLength) {

                return currentText.substr(0, maxLength) + "...";

            } else {

                return currentText

            }

        });
    });
</script>

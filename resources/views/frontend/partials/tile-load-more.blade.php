@if (!empty($result) && count($result) > 0 )
    @foreach($result as $data)
        @php  $pics = json_decode($data->pic_url);
                    $pi = $pics[0];
                    if ($data->car_condition === "New") {
                        $v = "New";
                    }else {
                        $v = "Used";
                    }
        @endphp
        <div class="listing-item" id="listingItemContainer" onclick="window.location='{{route('car-detail',['id'=>$data->slug])}}'">
            <img
                class="listing-image-icon"
                alt=""
                src="{{$pi}}"
            />

            <div class="superhost-tag">
                <img
                    class="superhost-icon"
                    alt=""
                    src="{{ config('app.ui_asset_url').'frontend/img/demoImages/superhost-icon.svg' }}"
                />

                <div class="superhost">Superhost</div>
            </div>
            <img class="heart-icon" alt=""
                 src="{{ config('app.ui_asset_url').'frontend/img/demoImages/hearticon.svg' }}"
            />

            <div class="item-details">
                <div class="listing-info">
                <div class="listing-cont">
                                <div class="listing-title f-card-title m-0">{{$data->title}}</div>
                                <div class="listing-subtitle">{{ucfirst($data->registration_no)}}</div>
                                <div class="listing-desc d-none">{{$data->advert_text}}</div>
                        </div>
                    <div class="rating-cont">
                        <div class="rating">4.9</div>
                        <img class="star-icon" alt=""
                             src="{{ config('app.ui_asset_url').'frontend/img/demoImages/star-icon.svg' }}"
                        />
                    </div>
                </div>
                <div class="bottom-container">
                    <div class="price-per-night">
                        <div class="rating">PKR {{number_format($data->price)}}</div>
                        {{--                                <div class="night">/f</div>--}}
                    </div>
                    
                </div>
            </div>
        </div>
    @endforeach
@endif
<script>
 if ($("#listview").hasClass('active') == true){
        $("#listview").click();
    }else if ($("#gridview").hasClass('active') == true){
        $("#gridview").click();
    }
$( document ).ready(function() {
    $(".f-card-description").html(function(index, currentText) {



        var maxLength = 100;

        if(currentText.length >= maxLength) {

            return currentText.substr(0, maxLength) + "...";

        } else {

            return currentText

        }

    });
    $(".f-card-description").css('display','block');
            $(".f-card-name").html(function(index, currentText) {



                        var maxLength = $(this).attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        } else {

                            return currentText

                        }

                    });
});

</script>

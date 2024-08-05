
        <div class="row m-0" id="appned-remove">
            @if (!empty($user_car) && count($user_car) > 0)
                @foreach ($user_car as $car)
                    @php  $pics = json_decode($car->pic_url);
                    $pic = $pics[0];
                    if ($car->car_condition === "New") {
                        $v = "New";
                    }else{
                        $v = "Used";
                    }
                    @endphp
                    <div class="item col-xs-3 col-lg-3 mb-2 p-0">
                        <div class="card" style="border: 1px solid #bfbfbf75;margin-right:5%">
                            <a class="text-center"  href="{{route('car-detail',['id'=>$car->slug])}}"><img class="card-img-top" src="{{$pic}}" style="padding:10px;height: 150px;object-fit: cover!important;" alt="Card image cap"></a>
                            <div class="pl-2 pb-2 pr-2 pt-2">
                                <div class="dropdown">
                                    <a class="dot-icon dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v dots-icon"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item btn-list-tile"  href="{{ route('sell-your-car', ['id' =>base64_encode(base64_encode($car->id))]) }}"><i class="fa fa-pencil fa-fw mr-2" aria-hidden="true"></i>Edit</a>
                                        <a class="dropdown-item btn-list-tile"  href="{{route('car-detail',['id'=>$car->slug])}}" target="_blank"><i class="fa fa-eye fa-fw mr-2" aria-hidden="true"></i>Preview</a>
                                        <a class="dropdown-item car_del btn-list-tile"  href="javascript:void(0)" data-delete="{{ base64_encode($car->id) }}"><i class="fa fa-trash fa-fw mr-2" aria-hidden="true"></i>Delete</a>
                                    </div>
                                </div>
                                <p class="productPrice m-0">PKR {{number_format($car->price)}}</p>
                                <p class="productD f-card-name m-0" data-maxlength = '22'>{{$car->title}}</p>
                                <!-- <p class="text-center productD">Car</p> -->
                                <p class="productTime m-0">{{ucfirst($car->registration_no)}}</p>

                            </div>
                        </div>
                    </div>
                    <!--<div class="col-12 col-sm-6 col-md-3 cardetail mb-3">-->
                    <!--    <div class="card tile-dash">-->
                    <!--        <img class="card-img-top" @if (!empty($car->pic_url)) @php $pic = json_decode($car->pic_url) @endphp   src='{{ $pic[0] }}'-->
                    <!--             @endif alt="Card image cap" style="height: 120px;object-fit: cover!important;">-->
                    <!--        <div class="card-body">-->
                    <!--            <div class="productPrice ml-0 mb-0">Rs {{ $car->price }}</div>-->
                    <!--            <div class="productD f-card-name m-0" style='display:none'>{{ $car->title }}</div>-->
                    <!--            <div class="editordelete">-->
                    <!--                <div class="edit"><a href="{{ route('sell-your-car', ['id' =>base64_encode(base64_encode($car->id))]) }}">Edit</a>-->
                    <!--                </div>-->
                    <!--                <div class="divider"></div>-->
                    <!--                <div class="delete"><a href="javascript:void(0)"-->
                    <!--                                       class="car_del"-->
                    <!--                                       data-delete="{{ base64_encode($car->id) }}">Delete</a></div>-->
                    <!--                <div class="divider"></div>-->
                    <!--                <div class="delete"><a href="{{route('car-detail',['id'=>$car->slug])}}" target="_blank">Preview</a></div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                @endforeach
            @endif
        </div>
        <div class="col-12 nextbtngrpdiv">
            <div>
            <div class="">
                {{$user_car->links()}}
            </div>
        </div>
        </div>
@push('script')
<script>
    $(".f-card-name").html(function(index, currentText) {

        var maxLength = 15;

        if(currentText.length >= maxLength) {

            return currentText.substr(0, maxLength) + "...";

        } else {

            return currentText

        }

    });
</script>
@endpush

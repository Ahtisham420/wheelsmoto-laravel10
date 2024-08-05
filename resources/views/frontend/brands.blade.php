@include('frontend.partials.header')
<?php
$car_a = App\CarSetting::all();
$car_b = App\Brand::all();
$car_categories = App\Category::all();
$car_user = App\User_car::all();
?>

<div class="Amercancarpagebody">
    <div class="container">
        <div class="row" style="margin: 44px 0;">
            <div class="col-12  col-sm-4  col-md-4 col-lg-12 search-result-heading">
                <div class="pageheading" style="text-align: center;">All Brands</div>
            </div>
            {{--<div class="col-12  col-sm-8 col-md-8 col-lg-6 yearbtngrp new-yearbtngrp">--}}

            {{--<div class="groupbtn">--}}
            {{--<a class="grid" id="gridview" ><i class="fas fa-th "></i></a>--}}
            {{--<a class="list"  id="listview"><i class="fas fa-list"></i></a>--}}
            {{--</div>--}}
            {{--</div>--}}

        </div>

        <div class="container">
            <div class="row d-flex align-items-center justify-content-center" >

                @if(!empty($brands) && count($brands) > 0)
                    @foreach($brands as $brand)
                        <div class="col-12 col-lg-1 col-sm-3 col-md-2 car-brand">
                            <a href="{{route('index-brand',['brand'=> strtr($brand->name,' ','-') ])}}">
                                <img src="/../../public/brand_icon/{{$brand->image}}" alt="">
                                <p class="text-center">{{$brand->name}}</p>

                            </a>
                        </div>
                        @endforeach
                    @endif
                {{--<div class="car-brand ml-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'abarth'])}}" class="d-block">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/abarth.png' }}" alt="">--}}
                        {{--<p class="text-center">Abarth</p>--}}
                        {{--<span>Abarth</span>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'alfa-romeo'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/alfa_romeo.png' }}" alt="">--}}
                        {{--<p class="text-center">Alfa Romeo</p>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'alpine'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/alpine.png' }}" alt="">--}}
                        {{--<p class="text-center">Alpine</p>--}}


                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'aston-martin'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/aston_martin.png' }}" alt="">--}}
                        {{--<p class="text-center">Aston Martin</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'audi'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/audi.png' }}" alt="">--}}
                        {{--<p class="text-center">Audi</p>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'bentley'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/bentley.png' }}" alt="">--}}
                        {{--<p class="text-center">Bentley</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'bmw'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/bmw.png' }}" alt="">--}}
                        {{--<p class="text-center">BMW</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'citroen'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/citroen.png' }}" alt="">--}}
                        {{--<p class="text-center">Citroen</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'dacia'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/dacia.png' }}" alt="">--}}
                        {{--<p class="text-center">Dacia</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'ds'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/ds.png' }}" alt="">--}}
                        {{--<p class="text-center">DS</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'ferrari'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/ferrari.png' }}" alt="">--}}
                        {{--<p class="text-center">Ferrari</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'fiat'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/fiat.png' }}" alt="">--}}
                        {{--<p class="text-center">Fiat</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'ford'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/ford.png' }}" alt="">--}}
                        {{--<p class="text-center">Ford</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'honda'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/honda.png' }}" alt="">--}}
                        {{--<p class="text-center">Honda</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'hyundai'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/hyundai.png' }}" alt="">--}}
                        {{--<p class="text-center">Hyundai</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'isuzu'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/isuzu.png' }}" alt="">--}}
                        {{--<p class="text-center">Isuzu</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'jaguar'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/jaguar.png' }}" alt="">--}}
                        {{--<p class="text-center">Jaguar</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'jeep'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/jeep.png' }}" alt="">--}}
                        {{--<p class="text-center">Jeep</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'kia'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/kia.png' }}" alt="">--}}
                        {{--<p class="text-center">KIA</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'lamborghini'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/lamborghini.png' }}" alt="">--}}
                        {{--<p class="text-center">Lamborghini</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'lexus'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/lexus.png' }}" alt="">--}}
                        {{--<p class="text-center">Lexus</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'lotus'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/lotus.png' }}" alt="">--}}
                        {{--<p class="text-center">Lotus</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'maserati'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/maserati.png' }}" alt="">--}}
                        {{--<p class="text-center">Maserati</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'mazda'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/mazda.png' }}" alt="">--}}
                        {{--<p class="text-center">Mazda</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-3">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'mclaren'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/mclaren.png' }}" alt="">--}}
                        {{--<p class="text-center">Mclaren</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'mercedes_benz'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/mercedes_benz.png' }}" alt="">--}}
                        {{--<p class="text-center">Mercedes-Benz</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'mg-motors-uk'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/mg_motors_uk.png' }}" alt="">--}}
                        {{--<p class="text-center">MG Motor UK</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'mini'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/mini.png' }}" alt="">--}}
                        {{--<p class="text-center">MINI</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'nissan'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/nissan.png' }}" alt="">--}}
                        {{--<p class="text-center">Nissan</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'peugeot'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/peugeot.png' }}" alt="">--}}
                        {{--<p class="text-center">Peugeot</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'land rover'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/land_rover.png' }}" alt="">--}}
                        {{--<p class="text-center">Land Rover</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'porsche'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/porsche.png' }}" alt="">--}}
                        {{--<p class="text-center">Porsche</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'renault'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/renault.png' }}" alt="">--}}
                        {{--<p class="text-center">Renault</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'rollsroyce'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/rollsroyce.png' }}" alt="">--}}
                        {{--<p class="text-center">Rollsroyce</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'seat'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/seat.png' }}" alt="">--}}
                        {{--<p class="text-center">Seat</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'skoda'])}}">--}}
                        {{--<img src="{{ config('app.ui_asset_url').'frontend/img/brand/skoda.png' }}" alt="">--}}
                        {{--<p class="text-center">Skoda</p>--}}


                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'smart'])}}"> <img--}}
                            {{--src="{{ config('app.ui_asset_url').'frontend/img/brand/smart.png' }}" alt="">--}}
                        {{--<p class="text-center">Smart</p>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'ssangyong'])}}"> <img--}}
                            {{--src="{{ config('app.ui_asset_url').'frontend/img/brand/ssangyong.png' }}" alt="">--}}
                        {{--<p class="text-center">Ssangyong</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'subaru'])}}"> <img--}}
                            {{--src="{{ config('app.ui_asset_url').'frontend/img/brand/subaru.png' }}" alt="">--}}
                        {{--<p class="text-center">Subaru</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'suzuki'])}}"> <img--}}
                            {{--src="{{ config('app.ui_asset_url').'frontend/img/brand/suzuki.png' }}" alt="">--}}
                        {{--<p class="text-center">Suzuki</p>--}}
                    {{--</a>--}}
                {{--</div>--}}

                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'tesla'])}}"> <img--}}
                            {{--src="{{ config('app.ui_asset_url').'frontend/img/brand/tesla.png' }}" alt="">--}}
                        {{--<p class="text-center">Tesla</p>--}}
                    {{--</a>--}}
                {{--</div>--}}

                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'toyota'])}}"> <img--}}
                            {{--src="{{ config('app.ui_asset_url').'frontend/img/brand/toyota.png' }}" alt="">--}}
                        {{--<p class="text-center">Toyota</p>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'vauxhall'])}}"> <img--}}
                            {{--src="{{ config('app.ui_asset_url').'frontend/img/brand/vauxhall.png' }}" alt="">--}}
                        {{--<p class="text-center">Vauxhall</p>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'volvo'])}}"> <img--}}
                            {{--src="{{ config('app.ui_asset_url').'frontend/img/brand/volvo.png' }}" alt="">--}}
                        {{--<p class="text-center">Volvo</p>--}}

                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="car-brand ml-5 mt-5">--}}
                    {{--<a href="{{route('index-brand',['brand'=>'vw'])}}"> <img--}}
                            {{--src="{{ config('app.ui_asset_url').'frontend/img/brand/vw.png' }}" alt="">--}}
                        {{--<p class="text-center">VW</p>--}}
                    {{--</a>--}}
                {{--</div>--}}
            </div>

        </div>


    </div>


</div>


{{--@include('frontend.partials.advertisment-footer')--}}

@include('frontend.partials.footer')

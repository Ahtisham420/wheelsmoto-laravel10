    <div class="homes">
    @if(isset($slider) && count($slider) > 0)
        @foreach($slider as $key=> $data)
            @php $p = json_decode($data->pic_url);
                        if (!empty($p)){
                        $pi = $p[0];
                        }
            @endphp
            @php $class='grey';
            @endphp
            @if(in_array($data->id,$user_s_id))
                @php $class="save_like00";
                @endphp
            @endif
            <div class="listing-item" id="listingItemContainer" onclick="window.location='{{ isset($data->slug) ? route('car-detail',['id'=>$data->slug]) : ''}}'">
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
                            <div class="listing-title f-card-title m-0" data-maxlength="22">{{$data->title}}</div>
                            <div class="listing-subtitle">
                                {{ucfirst($data->registration_no)}}
                            </div>
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
    </div>
    <div class="show-more-button m-auto" id="show-more-button{{$key}}">
        <div class="show-more-text"><button class="view-more-btn" onclick="loadMore(this,'{{$slider->nextPageUrl()}}','#show-more-button{{$key}}')"><span>Show more</span> <div class="loader m-auto" id="load-more-tile-loader"></div></button></div>
    </div>

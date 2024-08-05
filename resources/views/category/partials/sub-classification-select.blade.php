<div class="js-sub-classification-select">
    <div class="form-group">
        <label for="name">{{ __('admin/layout.sub_classification') }}</label>
        <select name="sub_classification_id" id="sub_classification_id"
                class="{{ !isset($filters) ? "select2" : "" }}  form-control js-filter-sub-classification">
            {{--@if(isset($filters))--}}
                <option value="false">Select</option>
            {{--@endif--}}
            @foreach($sub_classifications as $subClassification)
                @if(!isset($category))
                    <option value="{{$subClassification->id}}" {{ isset($category) ? ($category->sub_classification_id == $subClassification->id ? "selected" : '') : '' }} >{{$subClassification->name}}</option>
                @else
                    @if($category->classification_id == $subClassification->classification_id)
                        <option value="{{$subClassification->id}}" {{ isset($category) ? ($category->sub_classification_id == $subClassification->id ? "selected" : '') : '' }} >{{$subClassification->name}}</option>
                    @endif
                @endif
            @endforeach
        </select>
    </div>
</div>
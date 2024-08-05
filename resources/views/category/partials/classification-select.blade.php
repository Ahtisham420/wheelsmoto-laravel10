@if(!isset($filters))
    <div class="form-group">
@endif
        <label for="name">{{ __('admin/layout.classification') }}</label>
        <select name="classification_id" id="classification_id"
                class="{{ !isset($filters) ? "select2" : "" }} form-control js-filter-classification">
            @if(isset($filters))
                <option value="false">Select</option>
            @endif
            @foreach($classifications as $classification)
                <option value="{{$classification->id}}" {{ isset($category) ? ($classification->id == $category->classification_id ? "selected" : '') : '' }} >{{$classification->title}}</option>
            @endforeach
        </select>
@if(!isset($filters))
    </div>
@endif
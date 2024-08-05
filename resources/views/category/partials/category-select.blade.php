<div class="js-classification-base-category-select">
    <div class="form-group">
        <label for="name">{{ __('admin/pages/categories_form.parent_category') }}</label>
        <select name="category_id" id="js-classification-based-category-id-select"
                class="select2 form-control">
            <option value="false">Select</option>
            @foreach($categories as $cat)
                <option value="{{$cat->id}}" {{ isset($category) ? ($cat->id == $category->category_id ? "selected" : '') : '' }} >{{$cat->name}}</option>
                @foreach($cat->child_category as $sub)
                    <option value="{{$sub->id}}" {{ isset($category) ? ($sub->id == $category->category_id ? "selected" : '') : ''  }} >
                        -{{$sub->name}}</option>
                    @foreach($sub->categories_1 as $subsub)
                        <option value="{{$subsub->id}}" {{ isset($category) ? ($subsub->id == $category->category_id ? "selected" : '') : '' }}>
                            --{{$subsub->name}}</option>
                    @endforeach @endforeach @endforeach
        </select>
    </div>
</div>
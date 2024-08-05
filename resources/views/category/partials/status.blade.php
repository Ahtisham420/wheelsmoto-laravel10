<label>{{ __('admin/pages/brand_list.status') }}</label>
<select class="form-control js-filter-status">
    <option value="false">{{ __('admin/pages/brand_list.select') }}</option>
    <option value="{{ App\Category::active }}">{{ __('admin/pages/brand_list.active') }}</option>
    <option value="{{ App\Category::inactive }}">{{ __('admin/pages/brand_list.inactive') }}</option>
</select>
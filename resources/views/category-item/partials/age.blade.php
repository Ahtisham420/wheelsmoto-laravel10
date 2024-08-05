<label>{{ __('admin/pages/users_list.age') }}</label>
<select class="form-control js-filter-age">
    <option value="false">{{ __('admin/pages/users_list.select') }}</option>
    @php
    for($i = 1; $i <= 100; $i ++){
        echo "<option value=". $i.">".$i."</option>";
    }
    @endphp
</select>
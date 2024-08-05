<label>{{ __('admin/pages/users_list.status') }}</label>
<select class="form-control js-filter-status">
    <option value="false">{{ __('admin/pages/users_list.select') }}</option>
    <option value="{{ App\User::active }}">{{ __('admin/pages/users_list.active') }}</option>
    <option value="{{ App\User::restricted }}">{{ __('admin/pages/users_list.restricted') }}</option>
</select>
<label>{{ __('admin/pages/users_list.user_types') }}</label>
<select class="form-control js-filter-user-types">
    <option value="-1">{{ __('admin/pages/users_list.select') }}</option>
    <option value="{{ App\User::customer }}">{{ __('admin/pages/users_list.user') }}</option>
    <option value="{{ App\User::provider }}">{{ __('admin/pages/users_list.provider') }}</option>
    <option value="{{ App\User::admin }}">{{ __('admin/pages/users_list.admin') }}</option>
</select>
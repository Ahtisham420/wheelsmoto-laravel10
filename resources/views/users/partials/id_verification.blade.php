<label>{{ __('admin/pages/users_list.id_verification') }}</label>
<select class="form-control js-filter-id-verification">
    <option value="false">{{ __('admin/pages/users_list.select') }}</option>
    <option value="{{ App\User::unverified }}">{{ __('admin/pages/users_list.unverified') }}</option>
    <option value="{{ App\User::verified }}">{{ __('admin/pages/users_list.verified') }}</option>
</select>
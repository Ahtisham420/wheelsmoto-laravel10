<label>{{ __('admin/pages/users_list.status') }}</label>
<select class="form-control js-filter-status">
    <option value="false">{{ __('admin/pages/users_list.select') }}</option>
    <option value="{{ App\User::active }}">{{ __('admin/pages/users_list.active') }}</option>
    <option value="{{ App\User::inactive }}">{{ __('admin/pages/users_list.inactive') }}</option>
    <option value="{{ App\User::pending }}">{{ __('admin/pages/users_list.pending') }}</option>
    <option value="{{ App\User::banned }}">{{ __('admin/pages/users_list.banned') }}</option>
</select>
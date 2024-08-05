<label>{{ __('admin/pages/users_list.gender') }}</label>
<select class="form-control js-filter-gender">
    <option value="false">{{ __('admin/pages/users_list.select') }}</option>
    <option value="{{ App\User::male }}">{{ __('admin/pages/users_list.male') }}</option>
    <option value="{{ App\User::female }}">{{ __('admin/pages/users_list.female') }}</option>
    <option value="{{ App\User::other }}">{{ __('admin/pages/users_list.other') }}</option>
</select>
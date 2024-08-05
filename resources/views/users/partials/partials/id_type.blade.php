<label>{{ __('admin/pages/users_list.id_type') }}</label>
<select class="form-control js-filter-id-type">
    <option value="false">{{ __('admin/pages/users_list.select') }}</option>
    <option value="{{ App\User::identity_card }}">{{ __('admin/pages/users_list.identity_card') }}</option>
    <option value="{{ App\User::bay_form }}">{{ __('admin/pages/users_list.bay_form') }}</option>
    <option value="{{ App\User::passport }}">{{ __('admin/pages/users_list.passport') }}</option>
    <option value="{{ App\User::driving_license }}">{{ __('admin/pages/users_list.driving_license') }}</option>
    <option value="{{ App\User::other_gov_document }}">{{ __('admin/pages/users_list.other_gov_docs') }}</option>
</select>
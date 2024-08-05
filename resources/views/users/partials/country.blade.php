<label>{{ __('admin/pages/users_list.country') }}</label>
<select class="form-control js-filter-country">
    <option value="false">{{ __('admin/pages/users_list.select') }}</option>
    @php
    $settings = App\Settings::where('settings_key','=','country_list')->first();
    $countries = json_decode($settings['value']);
    @endphp
    @foreach($countries as $country)
    <option value="{{ $country->code }}">{{ $country->name }}</option>
    @endforeach
</select>

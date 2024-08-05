<div class="row">
    <div class="col-md-7">
        <input class="form-control js-filter-search" placeholder="{{ __('admin/pages/brand_list.search') }}">
    </div>
    <div class="col-md-3">
        <button class="btn btn-primary fa fa-search js-filter-search-btn" title="{{ __('admin/pages/brand_list.search') }}"></button>
        <button class="btn btn-success fa fa-filter" title="{{ __('admin/pages/brand_list.filter') }}" type="button" data-toggle="collapse"
                data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"></button>
        <button class="btn btn-warning fa fa-download js-filter-export" title="{{ __('admin/pages/brand_list.export') }}"></button>
    </div>
</div>
<br>
<div class="row collapse" id="collapseExample">
    <div class="col-md-12">
        <div class="card card-body">
            <div class="row">

{{--                <div class="col-md-2">--}}
{{--                    @include('covidRole.partials.status')--}}
{{--                </div>--}}
{{--                <div class="col-md-2">--}}
{{--                    @include('covidRole.partials.is_top')--}}
{{--                </div>--}}
                <div class="col-md-3">
                    <label>{{ __('admin/pages/brand_list.from_date') }}</label>
                    <input type="date" class="form-control js-filter-from-date">
                </div>
                <div class="col-md-3">
                    <label>{{ __('admin/pages/brand_list.to_date') }}</label>
                    <input type="date" class="form-control js-filter-to-date">
                </div>
                <div class="col-md-3">
                    <label>{{ __('admin/pages/brand_list.actions') }}</label>
                    <div class="">
                        <button class="btn btn-success js-filter-apply" title="{{ __('admin/pages/brand_list.apply') }}">{{ __('admin/pages/brand_list.apply') }}</button>
                        <button class="btn btn-primary js-filter-reset" title="{{ __('admin/pages/brand_list.reset') }}">{{ __('admin/pages/brand_list.reset') }}</button>
                        <button class="btn btn-warning js-filter-export" title="{{ __('admin/pages/brand_list.export') }}">{{ __('admin/pages/brand_list.export') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

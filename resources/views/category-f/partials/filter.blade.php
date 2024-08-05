<div class="row">
    <div class="col-md-7">
        <input class="form-control js-filter-search" placeholder="{{ __('admin/pages/food_category.search') }} - {{ __('admin/pages/NewsLetters_List.name') }}">
    </div>
    <div class="col-md-3">
        <button class="btn btn-primary fa fa-search js-filter-search-btn" title="{{ __('admin/pages/food_category.search') }}"></button>
        <button class="btn btn-success fa fa-filter" title="{{ __('admin/pages/food_category.filter') }}" type="button" data-toggle="collapse"
                data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"></button>
<!--        <button class="btn btn-warning fa fa-download js-filter-export" title="{{ __('admin/pages/food_category.export') }}"></button>-->
    </div>
</div>
<br>
<div class="row collapse" id="collapseExample">
    <div class="col-md-12">
        <div class="card card-body">
            <div class="row">
                <div class="col-md-3">
                    <label>{{ __('admin/pages/food_category.from_date') }}</label>
                    <input type="date" class="form-control js-filter-from-date">
                </div>
                <div class="col-md-3">
                    <label>{{ __('admin/pages/food_category.to_date') }}</label>
                    <input type="date" class="form-control js-filter-to-date">
                </div>
                <div class="col-md-3">
                    <label>{{ __('admin/pages/food_category.actions') }}</label>
                    <div class="">
                        <button class="btn btn-success js-filter-apply" title="{{ __('admin/pages/food_category.apply') }}">{{ __('admin/pages/food_category.apply') }}</button>
                        <button class="btn btn-primary js-filter-reset" title="{{ __('admin/pages/food_category.reset') }}">{{ __('admin/pages/food_category.reset') }}</button>
                        <button class="btn btn-warning js-filter-export" title="{{ __('admin/pages/food_category.export') }}">{{ __('admin/pages/food_category.export') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

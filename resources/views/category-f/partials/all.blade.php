<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> {{ __('admin/pages/food_category.bread_crumb_2') }}
                <a href="{{route('food-cat.create')}}"
                   class="btn btn-block btn-primary float-right icon-plus add-btn add_cat_m">
                    {{ __('admin/pages/food_category.bread_crumb_3') }}
                </a>
            </div>
            @include('partials.validation')
            <div class="alert alert-danger m-3" id="FailedMessage" style="display:none;">
                <p>{{ __('admin/pages/food_category.something_went_wrong') }}</p>
            </div>
            <div class="alert alert-success m-3" id="SuccessMessage" style="display:none;">
                <p>{{ __('admin/pages/food_category.operation_successfull') }}</p>
            </div>
            <div class="card-body">
                @include('category-f.partials.filter')
                <div class="js-index-table">
                    @include('category-f.partials.table')
                </div>

            </div>
        </div>
    </div>
</div>

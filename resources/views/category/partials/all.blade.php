<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> {{ __('admin/pages/categories_list.card_title') }}
                <a href="{{ route('create-category') }}"
                   class="btn btn-block btn-primary float-right icon-plus add-btn">
                    {{ __('admin/layout.sidebar_add_new_types') }}
                </a>
            </div>

            @include('partials.validation')

            <div class="alert alert-danger m-3" id="FailedMessage" style="display:none;">
                <p>Something went wrong!</p>
            </div>
            <div class="alert alert-success m-3" id="SuccessMessage" style="display:none;">
                <p>Operation Successfull!</p>
            </div>
            <div class="card-body">
                @include('category.partials.filter')
                <div class="js-index-table">
                    @include('category.partials.table',$categories)
                </div>
            </div>
        </div>
    </div>
</div>
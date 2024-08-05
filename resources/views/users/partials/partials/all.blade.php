<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> {{ __('admin/pages/users_list.card_title') }}
                <a href="{{ route('create-users') }}"
                   class="btn btn-block btn-primary float-right icon-user-follow add-btn">
                    {{ __('admin/pages/users_list.add_user') }}
                </a>
            </div>
            @include('partials.validation')
            <div class="card-body" style="overflow: auto;">
                @include('users.partials.filter')
                <div class="js-index-table">
                    @include('users.partials.table',$users)
                </div>
            </div>
        </div>
    </div>
</div>
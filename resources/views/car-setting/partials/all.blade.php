<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> All {{ $key }}
                <a href="{{ route('create-car-settings',["key" => $key]) }}" class="btn btn-block btn-primary float-right icon-user-follow add-btn">
                    Add {{ $key }}
                </a>
            </div>
            <div class="card-body" style="overflow: auto;">
            @include('car-setting.partials.filter')
        </div>
            @include('partials.validation')
            @if(session()->has('success'))
                <div class="alert alert-success m-3" id="SuccessMessage" >
                    <p>{{ session()->get('success') }}</p>
                </div>
            @endif
            @if(session()->has('failure'))
                <div class="alert alert-danger m-3" id="FailedMessage" style="display:none;">
                    <p>{{ session()->get('failure') }}</p>
                </div>
            @endif
            <div class="alert alert-danger m-3" id="FailedMessage" style="display:none;">
                <p>Something went wrong!</p>
            </div>
            <div class="alert alert-success m-3" id="SuccessMessage" style="display:none;">
                <p>Operation Successfull!</p>
            </div>
            <div class="card-body">
                 <div class="js-index-table">
                    @include('car-setting.partials.table')
                </div>
       
            </div>
        </div>
    </div>
</div>

{{--delete modal--}}
<div class="modal fade show" id="deleteConfirmModalCarsetting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Are you sure?</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Once delete! no longer will recover back.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <a  class="btn btn-danger car-btn-confirm-carsetting-admin" data-id="#" data-model="#" type="button">Delete</a>
            </div>
        </div>

    </div>
</div>


@push('scripts')
    <script>
$(document).on("click",".modal-carsetting-btn",function(e){
e.preventDefault();
$("#deleteConfirmModalCarsetting").modal('show');
var route = $(this).attr("data-route");

$('.car-btn-confirm-carsetting-admin').attr('href',route);
});
    </script>
@endpush
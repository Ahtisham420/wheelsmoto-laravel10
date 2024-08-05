<div class="modal fade show" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                <a href="#" class="btn btn-danger del-btn-confirm" data-id="#" data-model="#" type="button">Delete</a>
            </div>
        </div>

    </div>
</div>
<div class="modal fade show" id="cancelJobConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Are you sure?</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>This will cancel the job!.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <a href="#" class="btn btn-danger job-cancel-btn-confirm" data-id="#" data-model="#" type="button">Confirm</a>
            </div>
        </div>

    </div>
</div>
<div class="modal fade show" id="changeDriverModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="country">Radius</label>
                            <small>Check Available driver within Radius</small>
                            <select class="form-control col-sm-12 col-md-12"
                                    id="radius" name="radius">
                                @for($i =1 ; $i<=100 ;$i++)
                                    <option value="{{ $i }}">{{ $i }} {{ $i > 1 ? "Kilometers":"Kilometer" }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 col-md-12" style="overflow: auto;">
                    <table class="table table-responsive-sm js-change-driver-modal-body-table">
                        <thead>
                        <tr>
                            <th>Choose</th>
                            <th>Driver Name</th>
                            <th>Status</th>
                            <th>View Profile</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary js-assign-job-btn" disabled type="button">ASSIGN JOB</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade show" id="addUserPaymentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Payment Method
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                {{--<button class="btn btn-primary js-assign-job-btn" disabled type="button">ASSIGN JOB</button>--}}
            </div>
        </div>
    </div>
</div>
<div class="modal fade show" id="jobFormError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <div class="modal-body">
            </div>
            {{--<div class="modal-footer">--}}
                {{--<button class="btn btn-primary js-assign-job-btn" disabled type="button">ASSIGN JOB</button>--}}
            {{--</div>--}}
        </div>
    </div>
</div>
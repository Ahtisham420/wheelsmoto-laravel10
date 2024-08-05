<div class="row">
    <div class="col-md-3">
        <input class="form-control js-filter-search" placeholder="Search">
    </div>
    <div class="col-md-3">
        <button class="btn btn-primary fa fa-search js-filter-search-btn" title="search"></button>
        <button class="btn btn-success fa fa-filter" title="filter" type="button" data-toggle="collapse"
                data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"></button>
        <button class="btn btn-warning fa fa-download js-filter-export" title="export"></button>
    </div>
</div>
<br>
<div class="row collapse" id="collapseExample">
    <div class="col-md-12">
        <div class="card card-body">
            <div class="row">
                <div class="col-md-3">
                    @include("category.partials.classification-select",["classifications" => App\Classification::active()->get(),"filters" => true])
                </div>
                {{-- <div class="col-md-3">
                    @include("category.partials.sub-classification-select",["sub_classifications" => App\SubClassification::active()->get(),"filters" => true])
                </div> --}}
                <div class="col-md-2">
                    @include('category.partials.status')
                </div>
                <div class="col-md-2">
                    <label>Top List</label>
                    <select class="form-control js-filter-top-list">
                        <option value="false">Select</option>
                        <option value="0">Normal</option>
                        <option value="1">Top</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>From Date</label>
                    <input type="date" class="form-control js-filter-from-date">
                </div>
                <div class="col-md-3">
                    <label>To Date</label>
                    <input type="date" class="form-control js-filter-to-date">
                </div>
                <div class="col-md-3">
                    <label>Actions</label>
                    <div class="">
                        <button class="btn btn-success js-filter-apply" title="Apply">Apply</button>
                        <button class="btn btn-primary js-filter-reset" title="Reset">Reset</button>
                        <button class="btn btn-warning js-filter-export" title="Filter Export">EXPORT</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
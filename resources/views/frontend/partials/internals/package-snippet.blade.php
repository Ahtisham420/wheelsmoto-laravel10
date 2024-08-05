<div class="row packagetile"  style="margin-top: 100px!important;">
    <div class="col-12 selectedpckg p-0"> Your current package <hr></div>
    <div class="col-6 packagename">
        {{ session('package')['title'] }}
    </div>
    <div class="col-6 currentpackage">
        £ {{ session('package')['amount'] }}
    </div>
</div>
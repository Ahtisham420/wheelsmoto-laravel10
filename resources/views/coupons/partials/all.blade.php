<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> All Coupons
                <a href="{{ route('create-discounts') }}"
                   class="btn btn-block btn-primary float-right fa fa-plus add-btn">
                    {{--<i class=""></i>--}}
                    Add Coupon
                </a>
            </div>
            @if($message=Session::get('success'))
                <div class="alert alert-success">
                    <p>{{$message}}</p>
                </div>
            @endif
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Coupon</th>
                        <th>Percentage</th>
                        <th>Description</th>
                        <th>Start</th>
                        <th>End</th>
                        {{--<th>Status</th>--}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($discounts as $discount)
                        <tr>
                            <td>{{ $discount->id }}</td>
                            <td>{{ $discount->title }}</td>
                            <td>{{ $discount->percentage }}</td>
                            <td>{{ $discount->body }}</td>
                            <td>{{ $discount->start }}</td>
                            <td>{{ $discount->end }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{action('DiscountController@edit', $discount['id'])}}" >Edit</a>
                                <a class="btn btn-sm btn-danger" href="{{action('DiscountController@delete', $discount['id'])}}" >Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $discounts->links() }}
            </div>
        </div>
    </div>
</div>
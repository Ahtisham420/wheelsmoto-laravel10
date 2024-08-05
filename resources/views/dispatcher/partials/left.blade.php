<div class="card" style="height: 100%;">
    <div class="card-body">
        <form method="post" action="#" id="job-form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" value="{{ !empty($results) ? $results->id : 0 }}" name="id" id="id">
            <input type="hidden" value="{{ !empty($results) ? $results->lat : 0 }}" name="lat" id="lat">
            <input type="hidden" value="{{ !empty($results) ? $results->lng : 0 }}" name="lng" id="lng">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{--<button class="btn btn-link" type="button" >--}}
                            Services
                            {{--</button>--}}
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label for="cus_email">Search Place</label>
                                            <input class="form-control" id="pac-input" name="pac-input" type="text" placeholder="Enter address here" value="{{ !empty($results) ? $results->location_address : "" }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="service">Service*</label>
                                    <select class="select2 form-control {{ $errors->has('service') ? 'is-invalid' : '' }}" id="service" name="service">
                                        @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ (!empty($results) ? $results->service_id : 0) == $service->id ? 'selected' : "" }}>
                                            {{ $service->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('service'))
                                    <div class="invalid-feedback">{{ $errors->first('service') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="service_price">Service Price*</label>
                                    <input class="form-control {{ $errors->has('service_price') ? 'is-invalid' : '' }}" id="service_price" name="service_price" type="number" placeholder="Enter service price" value="{{ !empty($results) ? $results->service_price : "" }}">
                                    {{--@if ($errors->has('service_price'))--}}
                                    <div class="invalid-feedback service-price-feebdback" style="display: none"></div>
                                    {{--@endif--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            {{--<button class="btn btn-link collapsed" type="button" >--}}
                            Customer
                            {{--</button>--}}
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label for="customer_select">Cutomer Name</label>
                                            <select class="select2 form-control" id="customer_select" name="customer_select" style="width: 100%">
                                                <option value="0">Select Customer</option>
                                                @foreach($customers as $customer)
                                                <option value="{{ $customer->id }}" {{ (!empty($results->customer_id) ? $results->customer_id : 0) == $customer->id ? 'selected' : "" }}>{{ $customer->first_name." ".$customer->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="cus_email">Email</label>
                                    <input class="form-control {{ $errors->has('cus_email') ? 'is-invalid' : '' }}" id="cus_email" name="cus_email" type="text" placeholder="Enter customer email" value="{{ !empty($results['user']) ? $results['user']->email : old('cus_email')}}">
                                    @if ($errors->has('cus_email'))
                                    <div class="invalid-feedback">{{ $errors->first('cus_email') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="cus_phone">Phone</label>
                                    <input class="form-control {{ $errors->has('cus_phone') ? 'is-invalid' : '' }}" id="cus_phone" name="cus_phone" type="text" placeholder="Enter customer phone" value="{{ !empty($results['user']) ? $results['user']->phone : old('cus_phone')}}">
                                    @if ($errors->has('cus_phone'))
                                    <div class="invalid-feedback">{{ $errors->first('cus_phone') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="cus_email">First Name</label>
                                    <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" id="first_name" name="first_name" type="text" placeholder="Enter first name" value="{{ !empty($results['user']) ? $results['user']->first_name : old('first_name')}}">
                                    @if ($errors->has('first_name'))
                                    <div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="cus_email">Last Name</label>
                                    <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" id="last_name" name="last_name" type="text" placeholder="Enter last name" value="{{ !empty($results['user']) ? $results['user']->last_name : old('last_name')}}">
                                    @if ($errors->has('last_name'))
                                    <div class="invalid-feedback">{{ $errors->first('last_name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="cus_adrs">Customer Address</label>
                                    <textarea class="form-control {{ $errors->has('cus_adrs') ? 'is-invalid' : '' }}" id="cus_adrs" name="cus_adrs" type="text" placeholder="Enter customer Address">{{ !empty($results['user']) ? $results['user']->address : old('cus_adrs')}}</textarea>
                                    @if ($errors->has('cus_adrs'))
                                    <div class="invalid-feedback">{{ $errors->first('cus_adrs') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            {{--<button class="btn btn-link collapsed" type="button">--}}
                            Payments
                            {{--</button>--}}
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body" style="padding: 1%;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input class="form-control" id="name" type="text" placeholder="Enter your name">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="ccnumber">Credit Card Number</label>
                                            <input class="form-control" id="ccnumber" type="text" placeholder="0000 0000 0000 0000">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label for="ccmonth">Month</label>
                                        <select class="form-control" id="ccmonth">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="ccyear">Year</label>
                                        <select class="form-control" id="ccyear">
                                            <option>2014</option>
                                            <option>2015</option>
                                            <option>2016</option>
                                            <option>2017</option>
                                            <option>2018</option>
                                            <option>2019</option>
                                            <option>2020</option>
                                            <option>2021</option>
                                            <option>2022</option>
                                            <option>2023</option>
                                            <option>2024</option>
                                            <option>2025</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cvv">CVV/CVC</label>
                                            <input class="form-control" id="cvv" type="text" placeholder="123">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h2 class="mb-0" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            {{--<button class="btn btn-link collapsed" type="button">--}}
                            Checkout
                            {{--</button>--}}
                        </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="card-body" style="padding: 1%;">
                            <div class="card-body">
                                <table>
                                    <tbody>
                                    <tr>
                                        <th>Location</th>
                                        <td><p class="js-order-location">NA</p></td>
                                    </tr>
                                    <tr>
                                        <th>Service</th>
                                        <td><p class="js-order-service-name">NA</p></td>
                                        <td><p class="js-order-service-price">$0</p></td>
                                    </tr>
                                    <tr>
                                        <th>Customer Name</th>
                                        <td><p class="js-order-cust-name">NA</p></td>
                                    </tr>
                                    <tr>
                                        <th>Customer Phone</th>
                                        <td><p class="js-order-cust-phone">NA</p></td>
                                    </tr>
                                    <tr>
                                        <th>Payment</th>
                                        <td><p class="js-order-cust-payment">Card</p></td>
                                    </tr>
                                    <tr>
                                        <th>CheckOut</th>
                                        <td><button class="btn btn-sm btn-primary js-save-action-btn" type="submit" data-action="dispatcher">
                                                <i class="fa fa-bolt"></i> Dispatch
                                            </button></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
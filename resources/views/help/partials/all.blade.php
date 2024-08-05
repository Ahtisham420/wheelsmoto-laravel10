<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> All Issues
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
                        <th>User ID</th>
                        <th>User Type</th>
                        <th>Issue</th>
                        <th>Type Of Issue</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($guides as $guide)
                        <tr>
                            <td>{{ $guide->id }}</td>
                            <td>{{ $guide->user_id }}</td>
                            <td>{{ $guide->user_type }}</td>
                            <td>{{ $guide->issue_name }}</td>
                            <td>{{ $guide->issue_type }}</td>
                            <td>{{ $guide->issue_description }}</td>
                            <td>{{ $guide->status }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{action('GuideController@show', $guide['id'])}}" >Show</a>
                                <a class="btn btn-sm btn-danger" href="{{action('GuideController@delete', $guide['id'])}}" >Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $guides->links() }}
            </div>
        </div>
    </div>
</div>
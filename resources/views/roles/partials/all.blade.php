<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> {{ __('admin/pages/roles_list.card_title') }}
                <a href="{{ route('roles.create') }}" class="btn btn-block btn-primary float-right icon-user-follow add-btn">
                    {{ __('admin/pages/roles_list.add_category') }}
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
                <table class="table table-responsive-sm table-bordered" id="categories-table">
                    <thead>
                        <tr>
                            <th>{{ __('admin/pages/roles_list.id') }}</th>
                            <th>{{ __('admin/pages/roles_list.name') }}</th>
                            <th>{{ __('admin/pages/roles_list.permissions') }}</th>
                            <th>{{ __('admin/pages/roles_list.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if ($category->permissions)
                                <ul>
                                    @foreach ($category->permissions as $item)
                                       <li>{{$item->name}}</li> 
                                    @endforeach
                                </ul>
                                   
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{action('RolesController@show', $category['id'])}}"><i class="fa fa-pencil fa-1x-size"></i></a>
                                <a href="javascript:void(0)" class="btn btn-block btn-danger col action-btn js-del-btn" data-route="roles.index" data-model="Role" data-id="{{$category['id']}}">
                                    <i class="fa fa-trash fa-1x-size"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>

@if (!empty($user->status) )
    @if ($user->status->id != 1)
       <span class="badge badge-danger">{{$user->status->status}}</span>
    @else
    <span class="badge badge-sucess">{{$user->status->status}}</span>
    @endif
@else
    
@endif
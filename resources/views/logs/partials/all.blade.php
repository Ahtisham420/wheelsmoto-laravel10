<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> {{ __('admin/pages/logs_list.card_title') }}
                {{-- <a href="{{ route('logs.create') }}" class="btn btn-block btn-primary float-right icon-user-follow add-btn">
                    {{ __('admin/pages/logs_list.add_log') }}
                </a> --}}
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
                            <th>{{ __('admin/pages/logs_list.id') }}</th>
                            <th>{{ __('admin/pages/logs_list.operation') }}</th>
                            <th>{{ __('admin/pages/logs_list.level') }}</th>
                            <th>{{ __('admin/pages/logs_list.performedby') }}</th>
                            <th>{{ __('admin/pages/logs_list.user_role') }}</th>
                            <th>{{ __('admin/pages/logs_list.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->description }}</td>
                            <td><label class="label label-info">{{ $category->level }}</label></td>
                            <td>
                                @if($category->user)
                                 {{ $category->user->first_name }}
                                @endif
                            </td>
                            <td>
                                @if($category->user && $category->user->roles)
                                    <ul>
                                        @foreach ($category->user->roles as $item)
                                        <li> {{ $item->name }} </li>
                                        @endforeach
                                    </ul>
                                    @endif
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-block btn-danger col action-btn js-del-btn" data-route="logs.index" data-model="Log" data-id="{{$category['id']}}">
                                    <i class="fa fa-trash fa-1x-size"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                {{ $logs->links() }}
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
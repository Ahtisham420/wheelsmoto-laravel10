<table class="table table-responsive-sm table-bordered">
    <thead>
    <tr>
        <th>{{ __('admin/pages/users_list.id') }}</th>
        <th>{{ __('admin/pages/users_list.first_name') }}</th>
        <th>{{ __('admin/pages/users_list.last_name') }}</th>
        <th>{{ __('admin/pages/users_list.gender') }}</th>
        <th>{{ __('admin/pages/users_list.email') }}</th>
        <th>{{ __('admin/pages/users_list.phone') }}</th>
        <th>{{ __('admin/pages/users_list.user_types') }}</th>
        <th>{{ __('admin/pages/users_list.country') }}</th>
        <th>{{ __('admin/pages/users_list.id_verification') }}</th>
        <th>{{ __('admin/pages/users_list.id_type') }}</th>
        <th>{{ __('admin/pages/users_list.created_at') }}</th>
        <th>{{ __('admin/pages/users_list.status') }}</th>
        <th>{{ __('admin/pages/users_list.action') }}</th>
    </tr>
    </thead>
    <tbody id="users-tbody">
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->Gender }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->type !== App\User::admin ? ($user->type == APP\User::vendor ? __('admin/pages/users_list.provider') : __('admin/pages/users_list.user')) : __('admin/pages/users_list.admin') }}</td>
            <td>{{ $user->Country ? $user->Country : __('admin/pages/users_list.not_available') }}</td>
            <td> {{ $user->identity_verification == App\User::verified ? __('admin/pages/users_list.verified') : __('admin/pages/users_list.unverified') }}</td>
            <td>{{ App\User::getIdentityType($user->id_type)  }}</td>
            <td>{{ Carbon\Carbon::createFromTimeString($user->created_at)->format("D d M, Y - g:i A") }}</td>
            <td>
                <div class="btn-group">
                    <div class="dropdown">
                        @if(APP\User::active == $user->status)
                            <button class="btn btn-secondary  badge-success dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('admin/pages/users_list.active') }}
                            </button>
                        @elseif(APP\User::inactive == $user->status)
                            <button class="btn btn-secondary badge-secondary dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('admin/pages/users_list.inactive') }}
                            </button>
                        @elseif(APP\User::banned == $user->status)
                            <button class="btn btn-secondary badge-danger dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('admin/pages/users_list.banned') }}
                            </button>
                        @elseif(APP\User::pending == $user->status)
                            <button class="btn btn-secondary badge-warning dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('admin/pages/users_list.pending') }}
                            </button>
                        @endif
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" data-value="{{ APP\User::active }}" href="{{ route('status-users',['status' => APP\User::active ,'id' => $user->id]) }}">{{ __('admin/pages/users_list.active') }}</a>
                            <a class="dropdown-item" data-value="{{ APP\User::inactive }}" href="{{ route('status-users',['status' => APP\User::inactive ,'id' => $user->id]) }}">{{ __('admin/pages/users_list.inactive') }}</a>
                            <a class="dropdown-item" data-value="{{ APP\User::banned }}" href="{{ route('status-users',['status' => APP\User::banned ,'id' => $user->id]) }}">{{ __('admin/pages/users_list.banned') }}</a>
                            <a class="dropdown-item" data-value="{{ APP\User::pending }}" href="{{ route('status-users',['status' => APP\User::pending ,'id' => $user->id]) }}">{{ __('admin/pages/users_list.pending') }}</a>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <a href="{{ route('edit-users',['id' => $user->id]) }}" class="btn btn-block btn-primary col action-btn">
                    <i class="fa fa-pencil fa-1x-size"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<hr>
{{ $users->appends($_GET)->links() }}
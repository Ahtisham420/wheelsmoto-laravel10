@foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->first_name." ".$user->last_name }}</td>
        <td>{{ $user->phone }}</td>
        <td>
            <div class="btn-group">
                <div class="dropdown">
                    @if(APP\User::active == $user->status)
                        <button class="btn btn-secondary  badge-success dropdown-toggle"
                                id="dropdownMenuButton" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Active
                        </button>
                    @elseif(APP\User::inactive == $user->status)
                        <button class="btn btn-secondary badge-secondary dropdown-toggle"
                                id="dropdownMenuButton" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Inactive
                        </button>
                    @elseif(APP\User::banned == $user->status)
                        <button class="btn btn-secondary badge-danger dropdown-toggle"
                                id="dropdownMenuButton" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Banned
                        </button>
                    @elseif(APP\User::pending == $user->status)
                        <button class="btn btn-secondary badge-warning dropdown-toggle"
                                id="dropdownMenuButton" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Pending
                        </button>
                    @endif
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" data-value="{{ APP\User::active }}" href="{{ route('status-users',['status' => APP\User::active ,'id' => $user->id]) }}">Active</a>
                        <a class="dropdown-item" data-value="{{ APP\User::inactive }}" href="{{ route('status-users',['status' => APP\User::inactive ,'id' => $user->id]) }}">Inactive</a>
                        <a class="dropdown-item" data-value="{{ APP\User::banned }}" href="{{ route('status-users',['status' => APP\User::banned ,'id' => $user->id]) }}">Banned</a>
                        <a class="dropdown-item" data-value="{{ APP\User::pending }}" href="{{ route('status-users',['status' => APP\User::pending ,'id' => $user->id]) }}">Pending</a>
                    </div>
                </div>
            </div>
        </td>
        <td>
            <a href="{{ route('edit-users',['id' => $user->id]) }}" class="btn btn-block btn-primary col action-btn">
                <i class="fa fa-pencil fa-1x-size"></i>
            </a>
            <a href="javascript:void(0)" class="btn btn-block btn-danger col action-btn js-del-btn" data-route="all-users" data-model="user" data-id="{{$user->id}}">
                <i class="fa fa-trash fa-1x-size"></i>
            </a>
        </td>
    </tr>
@endforeach
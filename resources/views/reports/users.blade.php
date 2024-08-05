<html>
<head>
    <title>Users Report</title>
    <style>
    table {
        border-spacing: 0;
        border: 0.3px solid black;
    }
    th,td {
        border: 0.3px solid black;
        text-align: left;
        padding: 5px;
    }
    .pdf-logo {
        float: left;
        width: 50px;
    }
    .pdf-text {
        text-align: center;
        display: inline-block;
    }
    .pdf-small{
        font-size: 16px;
    }
    </style>
</head>
<body>

<img class="pdf-logo" src="{{ config('app.coure_ui_asset_url').'images/defaults/logo.png' }}" alt="instatask Logo">
<h2 class="pdf-text">Users Report<br><span class="pdf-small">From {{ $from }} to {{ $to }}</span></h2>

<table width="100%">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->first_name." ".$user->last_name }}</td>
            <td>{{ $user->phone }}</td>
            <td>
            
                @if(APP\User::active == $user->status)
                    Active
                @elseif(APP\User::inactive == $user->status)
                    Inactive
                @elseif(APP\User::banned == $user->status)
                    Banned
                @elseif(APP\User::pending == $user->status)
                    Pending
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>    
</body>
</html>
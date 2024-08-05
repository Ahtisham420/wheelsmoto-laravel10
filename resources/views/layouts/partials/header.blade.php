<style>
    .dashboard-notification::-webkit-scrollbar { width: 0 !important }
</style>

<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{ config('app.coure_ui_asset_url').'/frontend/img/logo/logo.png' }}" style="width: 100%;" alt="instatask Logo">
        <img class="navbar-brand-minimized" src="{{ config('app.coure_ui_asset_url').'/frontend/img/logo/logo.png' }}" style="width: 30%;" alt="instatask Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown d-md-down-none"><a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-bell"></i><span class="badge badge-pill badge-danger js-dashboard-notification-count"></span></a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                <ul class="js-dashboard-notification dashboard-notification" style="max-height: 50vh;overflow-y: scroll;">

                </ul>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="img-avatar" src="{{ config('app.coure_ui_asset_url').'images/avatars/7.jpg' }}" alt="admin@bootstrapmaster.com">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('profile-admin') }}">
                    <i class="fa fa-lock"></i> Profile</a>
                <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    
    {{--<button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">--}}
    {{--<span class="navbar-toggler-icon"></span>--}}
    {{--</button>--}}
    {{--<button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">--}}
    {{--<span class="navbar-toggler-icon"></span>--}}
    {{--</button>--}}
</header>

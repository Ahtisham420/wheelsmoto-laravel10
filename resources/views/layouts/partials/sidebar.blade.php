
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin') }}">
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                </a>
            </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="nav-icon icon-people"></i> {{ __('admin/layout.sidebar_users') }}</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('all-users') }}" target="_top">
                                <i class="nav-icon icon-list"></i> {{ __('admin/layout.sidebar_users_list') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('roles.index') }}" target="_top">
                                <i class="nav-icon icon-list"></i> {{ __('admin/layout.sidebar_roles_list') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('permissions.create') }}" target="_top">
                                <i class="nav-icon icon-plus"></i> {{ __('admin/layout.sidebar_permission_form') }}</a>
                        </li>
                        @can('subscriber')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('counter-subscribers') }}" target="_top">
                                    <i class="nav-icon icon-list"></i> {{ __('admin/layout.sidebar_subscribers_list') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-bag"></i> Packages</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-packages') }}" target="_top">
                            <i class="nav-icon icon-list"></i> Packages List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create-packages') }}" target="_top">
                            <i class="nav-icon icon-plus"></i> Package Form</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-people"></i> Power Car Settings</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "engine-types"]) }}" target="_top">
                            <i class="nav-icon icon-list"></i> Engin Types</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "colors"]) }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Color </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "matt-paint"]) }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Matt Paint </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "wheel-size"]) }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Wheel Size</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "exhaust"]) }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Exhaust</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "parking-sensor"]) }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Parking Sensor</a>
                    </li>
					  <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "car-type"]) }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Car Type</a>
                    </li>
					  <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "body-type"]) }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Body Type</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "interior"]) }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Interior</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "import"]) }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Import</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "service-history"]) }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Service History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "boot-spoiler"]) }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Boot Spoiler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "model"]) }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Model</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "city"]) }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>City</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "variant"]) }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Variant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "car-make"]) }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Car Make</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "saftey-feature"]) }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Saftey  Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-car-settings',["key" => "entertainment-feature"]) }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Entertainment  Features</a>
                    </li>


                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-people"></i> Power Cars Adverts</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-engin-types') }}" target="_top">
                            <i class="nav-icon icon-list"></i>American Muscle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create-users') }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Auction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create-users') }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Lease cars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create-users') }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Rental</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create-users') }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Classified</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create-users') }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Swaps</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-people"></i> Sell Your Car</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-engin-types') }}" target="_top">
                            <i class="nav-icon icon-list"></i>American Muscle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create-users') }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Auction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create-users') }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Lease cars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create-users') }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Rental</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create-users') }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Classified</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create-users') }}" target="_top">
                            <i class="nav-icon icon-user-follow"></i>Swaps</a>
                    </li>
                </ul>
            </li>


            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-font-awesome"></i> Manufacturers</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-brands') }}" target="_top">
                            <i class="nav-icon icon-list"></i> {{ __('admin/layout.sidebar_brands_list') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create-brand') }}" target="_top">
                            <i class="nav-icon icon-plus"></i> {{ __('admin/layout.sidebar_brands_form') }}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-font-awesome"></i>States</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-state') }}" target="_top">
                            <i class="nav-icon icon-list"></i>State lists</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create-state') }}" target="_top">
                            <i class="nav-icon icon-plus"></i>State Form</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-cogs"></i>
                    {{ __('admin/layout.sidebar_website_settings') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('meta-settings') }}" target="_top">
                            <i class="nav-icon icon-settings"></i>Meta Settings</a>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="nav-icon icon-pencil"></i>
                            {{ __('admin/layout.sidebar_blog') }} </a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('posts.index') }}" target="_top">
                                    <i class="nav-icon icon-list"></i> {{ __('admin/layout.sidebar_all_blog_posts') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('events.index') }}" target="_top">
                                    <i class="nav-icon icon-list"></i>Events</a>
                            </li>
                                <li class="nav-item">
                                <a class="nav-link" href="{{ route('footer.index') }}" target="_top">
                                    <i class="nav-icon icon-list"></i>Footer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contactus.index') }}" target="_top">
                                    <i class="nav-icon icon-list"></i>Contact Us List</a>
                            </li>
                            {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="{{ route('posts.create') }}" target="_top">--}}
                            {{--<i class="fa fa-plus fa-fw"></i> Add Post</a>--}}
                            {{--</li>--}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('comments.index') }}" target="_top">
                                    <i class="fa fa-fw fa-comments"></i> {{ __('admin/layout.sidebar_all_comments') }}</a>
                            </li>
                            <?php $comment_approval_count = App\Comment::withoutGlobalScopes()->where("approved", false)->count(); ?>
                            <li class="nav-item">
                                <a class="nav-link @if($comment_approval_count>0) list-group-item-warning @endif"
                                   href="{{ route('comments.index') }}?waiting_for_approval=true" target="_top">
                                    <i class="fa fa-plus fa-fw"></i>{{ $comment_approval_count }} {{ __('admin/layout.sidebar_waiting_for_approval') }}</a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="nav-icon fa fa-file"></i>{{ __('admin/layout.sidebar_pages') }} </a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="#" target="_top">
                                    <i class="nav-icon fa fa-bars"></i> {{ __('admin/layout.sidebar_all_pages') }}All Pages</a>
                            </li>
                            {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="{{ route('testimonial.create') }}" target="_top">--}}
                            {{--<i class="nav-icon icon-plus"></i> Create Page</a>--}}
                            {{--</li>--}}
                        </ul>
                    </li>
                    {{--<li class="nav-item nav-dropdown">--}}
                        {{--<a class="nav-link nav-dropdown-toggle" href="#">--}}
                            {{--<i class="nav-icon fa fa-feed"></i> Testimonials</a>--}}
                        {{--<ul class="nav-dropdown-items">--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="{{ route('testimonial.index') }}" target="_top">--}}
                                    {{--<i class="nav-icon fa fa-bars"></i> All Testimonial </a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="{{ route('testimonial.create') }}" target="_top">--}}
                                    {{--<i class="nav-icon icon-plus"></i> Create Testimonial</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}


                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-cogs"></i> {{ __('admin/layout.sidebar_system_settings') }} </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('settings.create') }}" target="_top">
                            <i class="nav-icon icon-list"></i>{{ __('admin/layout.sidebar_settings') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logs.index') }}" target="_top">
                            <i class="nav-icon icon-plus"></i> {{ __('admin/layout.sidebar_logs') }} </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-cogs"></i>Terms and Conditions</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('terms.index') }}" target="_top">
                            <i class="nav-icon icon-list"></i>Term and Condition</a>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('logs.index') }}" target="_top">--}}
                            {{--<i class="nav-icon icon-plus"></i>Condition Lists</a>--}}
                    {{--</li>--}}
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link" href="{{ route('all-engin-types') }}" target="_top">
                    <i class="nav-icon fa fa-car"></i>Feature Car</a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link" href="{{ route('all-engin-types') }}" target="_top">
                    <i class="nav-icon icon-list"></i>Paypal Settings</a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link" href="{{ route('all-engin-types') }}" target="_top">
                    <i class="nav-icon icon-list"></i>Payment Settings</a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fa fa-bell"></i> {{ __('admin/layout.sidebar_notification') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('notifications.index') }}" target="_top">
                            <i class="nav-icon icon-list"></i> {{ __('admin/layout.sidebar_notification_list') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('notifications.create') }}" target="_top">
                            <i class="nav-icon icon-plus"></i> {{ __('admin/layout.sidebar_notification_form') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="fa fa-cogs"></i> Settings</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all-settings') }}" target="_top">
                            <i class="nav-icon icon-list"></i>All settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('form-settings') }}" target="_top">
                            <i class="nav-icon icon-plus"></i> Setting Form</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>

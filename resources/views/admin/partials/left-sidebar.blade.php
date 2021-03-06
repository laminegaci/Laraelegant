<aside class="left-sidebar">
    <div class="d-flex no-block nav-text-box align-items-center">
        <span>
            <img src="{{ asset('_admin/images/logo-100.png') }}" alt="homepage" class="dark-logo" style="width:70%;" />
        </span>
        <a class="waves-effect waves-dark ml-auto hidden-sm-down" href="javascript:void(0)"><i class="fas fa-bars"></i></a>
        <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
    </div>
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="waves-effect waves-dark" href="{{ route('dashboard') }}" aria-expanded="false"><i class="fas fa-tachometer-alt"></i><span class="hide-menu">Dashboard</span></a></li>
                <li> <a class="waves-effect waves-dark" href="{{ route('fullCalendar') }}" aria-expanded="false"><i class="fas fa-calendar-alt"></i><span class="hide-menu">fullCalendar</span></a></li>
                @can('access_users')
                    <li> <a class="waves-effect waves-dark" href="{{ route('users.index') }}" aria-expanded="false"><i class="fas fa-users"></i><span class="hide-menu">Users</span></a></li>
                    @else
                    <li> <a class="waves-effect waves-dark prevent_link" href="{{ route('users.index') }}" aria-expanded="false"><i class="fas fa-users"></i><span class="hide-menu">Users</span></a></li>
                @endcan
                @can('access_roles')
                    <li> <a class="waves-effect waves-dark" href="{{ route('roles.index') }}" aria-expanded="false"><i class="fas fa-candy-cane"></i></i><span class="hide-menu">Roles</span></a></li>
                    @else
                    <li> <a class="waves-effect waves-dark prevent_link" href="{{ route('roles.index') }}" aria-expanded="false"><i class="fas fa-candy-cane"></i></i><span class="hide-menu">Roles</span></a></li>
                @endcan

                @can('access_permissions')
                    <li> <a class="waves-effect waves-dark" href="{{ route('permissions.index') }}" aria-expanded="false"><i class="fas fa-hand-sparkles"></i><span class="hide-menu">Permissions</span></a></li>
                    @else
                    <li> <a class="waves-effect waves-dark prevent_link" href="{{ route('permissions.index') }}" aria-expanded="false"><i class="fas fa-hand-sparkles"></i><span class="hide-menu">Permissions</span></a></li>
                @endcan
                
                <!-- <li> <a class="waves-effect waves-dark" href="pages-profile.html" aria-expanded="false"><i class="fa fa-user-circle-o"></i><span class="hide-menu">Profile</span></a></li>
                <li> <a class="waves-effect waves-dark" href="table-basic.html" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu"></span>Tables</a></li>
                <li> <a class="waves-effect waves-dark" href="icon-fontawesome.html" aria-expanded="false"><i class="fa fa-smile-o"></i><span class="hide-menu"></span>Icon</a></li>
                <li> <a class="waves-effect waves-dark" href="map-google.html" aria-expanded="false"><i class="fa fa-globe"></i><span class="hide-menu"></span>Map</a></li>
                <li> <a class="waves-effect waves-dark" href="pages-blank.html" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu"></span>Blank</a></li>
                <li> <a class="waves-effect waves-dark" href="pages-error-404.html" aria-expanded="false"><i class="fa fa-question-circle"></i><span class="hide-menu"></span>404</a></li> -->
                <!-- <div class="text-center m-t-30">
                    <a href="https://wrappixel.com/templates/elegant-admin/" class="btn waves-effect waves-light btn-success hidden-md-down"> Upgrade to Pro</a>
                </div> -->
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
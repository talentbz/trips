<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{route('root')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset ('/images/admin/logo-sm.png') }}" alt="" width="100%">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset ('/images/admin/logo-large.png') }}" alt="" width="100%">
            </span>
        </a>
    </div>
    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{route('root')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.client.index')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Clients</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.driver.index')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Driver</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.bus.index')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Buses</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.trip.index')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Trips</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.trip_bus.index')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Trips Buses</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.daily_trip.index')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Daily Trips</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.maintenance.index')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Maintenace Records</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>App Supervisors</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">Miscellaneous</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{route('admin.miscellaneous.city.index')}}"
                                key="t-light-sidebar">Cities</a></li>
                        <li><a href="{{route('admin.miscellaneous.area.index')}}"
                                key="t-compact-sidebar">Areas</a></li>
                        <li><a href="{{route('admin.miscellaneous.bus_type.index')}}"
                                key="t-icon-sidebar">Bus Types</a></li>
                        <li><a href="{{route('admin.miscellaneous.bus_model.index')}}" key="t-boxed-width">Bus Models</a>
                        </li>
                        <li><a href="{{route('admin.miscellaneous.bus_size.index')}}" key="t-preloader">Bus Sizes</a>
                        </li>
                        <li><a href="layouts-colored-sidebar"
                                key="t-colored-sidebar">Client Types</a></li>
                        <li><a href="layouts-scrollable" key="t-scrollable">Contract Types</a></li>
                        <li><a href="{{route('admin.miscellaneous.bus_maintenance.index')}}" key="t-scrollable">Maintenace Types</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

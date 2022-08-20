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
                        <i class="bx bxs-user-detail"></i>
                        <span>Clients</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.driver.index')}}" class="waves-effect">
                        <i class="bx bxs-ship"></i>
                        <span>Drivers</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.bus.index')}}" class="waves-effect">
                        <i class="bx bxs-bus"></i>
                        <span>Buses</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.trip.index')}}" class="waves-effect">
                        <i class="bx bx-aperture"></i>
                        <span>Trips</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.trip_bus.index')}}" class="waves-effect">
                        <i class="bx bx-briefcase-alt-2"></i>
                        <span>Trips Buses</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.daily_trip.index')}}" class="waves-effect">
                        <i class="bx bxs-eraser"></i>
                        <span>Daily Trips</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.maintenance.index')}}" class="waves-effect">
                        <i class="bx bxs-wrench"></i>
                        <span>Maintenace Records</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>App Supervisors</span>
                    </a>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-tone"></i>
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
                        <li><a href="{{route('admin.miscellaneous.client_type.index')}}"
                                key="t-colored-sidebar">Client Types</a></li>
                        <li><a href="{{route('admin.miscellaneous.contract_type.index')}}" key="t-scrollable">Contract Types</a></li>
                        <li><a href="{{route('admin.miscellaneous.bus_maintenance.index')}}" key="t-scrollable">Maintenace Types</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx bx-file"></i>
                        <span>REPORTS</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">

                        <li><a href="{{route('admin.reports.trips_client.index')}}"
                                key="t-light-sidebar">TRIPS BY CLIENT</a>
                        </li>
                        <li>
                            <a href="{{route('admin.reports.trips_bus.index')}}"
                                key="t-compact-sidebar">TRIPS BY BUS</a>
                        </li>
                        <li>
                            <a href="{{route('admin.reports.trips_type.index')}}"
                                key="t-compact-sidebar">TRIPS BY TYPE</a>
                        </li>
                        <li>
                            <a href="{{route('admin.reports.trips_driver.index')}}"
                                key="t-compact-sidebar">TRIPS BY DRIVER</a>
                        </li>
                        <li>
                            <a href="{{route('admin.reports.trips_bus_size.index')}}"
                                key="t-compact-sidebar">TRIPS BY BUS SIZE</a>
                        </li>
                        <li>
                            <a href="{{route('admin.reports.trips_client_type.index')}}"
                                key="t-compact-sidebar">TRIPS BY CLIENT TYPE</a>
                        </li>
                        <li>
                            <a href="{{route('admin.reports.trips_contract_type.index')}}"
                                key="t-compact-sidebar">TRIPS BY CONTRACT TYPE</a>
                        </li>
                        <li>
                            <a href="{{route('admin.reports.trips_owership.index')}}"
                                key="t-compact-sidebar">TRIPS BY OWNERSHIP TYPE</a>
                        </li>                      
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

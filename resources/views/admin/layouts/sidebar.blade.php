<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

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
                    <a href="{{route('admin.bus.index')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Buses</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Trips</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Trips Buses</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Daily Trips</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
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
                        <li><a href="layouts-compact-sidebar"
                                key="t-compact-sidebar">@lang('translation.Compact_Sidebar')</a></li>
                        <li><a href="layouts-icon-sidebar"
                                key="t-icon-sidebar">@lang('translation.Icon_Sidebar')</a></li>
                        <li><a href="layouts-boxed" key="t-boxed-width">@lang('translation.Boxed_Width')</a>
                        </li>
                        <li><a href="layouts-preloader" key="t-preloader">@lang('translation.Preloader')</a>
                        </li>
                        <li><a href="layouts-colored-sidebar"
                                key="t-colored-sidebar">@lang('translation.Colored_Sidebar')</a></li>
                        <li><a href="layouts-scrollable" key="t-scrollable">@lang('translation.Scrollable')</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

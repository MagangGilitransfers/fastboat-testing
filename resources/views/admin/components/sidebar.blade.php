<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="#" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{asset('assets/images/logo-dark-sm.png')}}" alt="" height="26" style="margin-top: 25px">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="28">
                        </span>
                    </a>

                </div>

    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
        <i class="bx bx-menu align-middle"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu" >
                <li class="menu-title" data-key="t-menu">Dashboard</li>

                <li>
                    <a href="{{url ('/home')}}">
                        <i class="bx bx-home-alt icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li class="menu-title" data-key="t-layouts">Booking Data</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-receipt icon nav-icon"></i>
                        <span class="menu-item" data-key="t-invoices">Booking Data</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" data-key="t-invoice-list">Fast Boat</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-trash  icon nav-icon"></i>
                        <span class="menu-item">Booking Trash</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Fast Boat</a></li>
                    </ul>
                </li>

                <li class="menu-title">Schedule & Data</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-anchor icon nav-icon"></i>
                        <span class="menu-item">Fast Boat</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route ('fastboat.view')}}">Fast Boat</a></li>
                        <li><a href="{{route ('company.view')}}">Company</a></li>
                    </ul>
                </li>

                <li class="menu-title" data-key="t-components">Master Data</li>

                <li>
                    <a href="{{route ('island.view')}}">
                        <i class="bx bx-world icon nav-icon"></i>
                        <span class="menu-item" data-key="t-tables">Island</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{route ('port.view')}}">
                        <i class="bx bx-map-alt icon nav-icon"></i>
                        <span class="menu-item" data-key="t-tables">Port</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<header class="ishorizontal-topbar">

    <div class="topnav">
        
    </div>
</header>
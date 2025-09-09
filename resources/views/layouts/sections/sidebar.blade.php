<div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="//csc.dei.unipd.it" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/Csc_nero.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/Csc_nero.png') }}" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="//csc.dei.unipd.it" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/Csc_bianco_small.png') }}" alt="" height="32">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/Csc_bianco.png') }}" alt="" height="74" style="margin-top: 0.7rem; margin-bottom: 1.5rem;">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">
                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('dashboard') }}" aria-expanded="false">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('artwork') }}" aria-expanded="false">
                            <i class="ri-pencil-ruler-2-line"></i> <span data-key="t-dashboards">ArtWorks</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
            <div class="sidebar-background"></div>
        </div>

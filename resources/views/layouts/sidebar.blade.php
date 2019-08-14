@if(!isset($active))
    @php($active = 'dashboard')
@endif
<!-- Dashboard Sidebar -->
<div class="dashboard-sidebar">
    <div class="dashboard-sidebar-inner" data-simplebar>
        <div class="dashboard-nav-container">

            <!-- Responsive Navigation Trigger -->
            <a href="#" class="dashboard-responsive-nav-trigger">
                <span class="hamburger hamburger--collapse" >
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </span>
                <span class="trigger-title">Dashboard Navigation</span>
            </a>

            <!-- Navigation -->
            <div class="dashboard-nav">
                <div class="dashboard-nav-inner">

                    <ul data-submenu-title="Get Started">
                        <li class="{{ $active == 'dashboard' ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}"><i class="icon-line-awesome-home"></i> Dashboard</a>
                        </li>
                    </ul>

                    <ul data-submenu-title="Configure">
                        <li class="{{ $active == 'setup-domain' ? 'active' : '' }}">
                            <a href="{{ route('setup-domain') }}"><i class="icon-line-awesome-globe"></i> Setup Domains</a>
                        </li>
                        <li class="{{ $active == 'manage-domains' ? 'active' : '' }}">
                            <a href="{{ route('manage-domains') }}"><i class="icon-material-outline-settings-input-component"></i> Manage Domains</a>
                        </li>
                        <li class="{{ $active == 'email-settings' ? 'active' : '' }}">
                            <a href="#"><i class="icon-line-awesome-gear"></i> Email Settings</a>
                        </li>
                    </ul>

                </div>
            </div>
            <!-- Navigation / End -->
        </div>
    </div>
</div>
<!-- Dashboard Sidebar / End -->

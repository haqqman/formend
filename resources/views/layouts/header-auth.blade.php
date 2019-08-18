<!-- Header Container -->
<header id="header-container" class="fullwidth transparent">
    <!-- Header -->
    <div id="header">
        <div class="container">
            <!-- Left Side Content -->
            <div class="left-side">
                <!-- Logo -->
                <div id="logo">
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('images/logo.svg') }}" alt=""></a>
                </div>
            </div>
            <!-- Left Side Content / End -->

            <!-- Right Side Content / Start -->
            <div class="right-side">
                <!--  User Notifications -->
                <div class="header-widget">
                    <!-- Messages -->
                    <div class="header-notifications">
                        <div class="header-notifications-trigger">
                            <a href="#"><i class="icon-feather-bell"></i><span>3</span></a>
                        </div>
                        <!-- Dropdown -->
                        <div class="header-notifications-dropdown">
                            <div class="header-notifications-headline">
                                <h4>Notifications & Updates</h4>
                                <button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">
                                    <i class="icon-feather-check-square"></i>
                                </button>
                            </div>

                            <div class="header-notifications-content">
                                <div class="header-notifications-scroll" data-simplebar>
                                    <ul>
                                        <!-- Notification -->
                                        <li class="notifications-not-read">
                                            <a href="#">
                                                <span class="notification-avatar status-online"><img src="{{ asset('images/formend-avatar.svg') }}" alt=""></span>
                                                <div class="notification-text">
                                                    <strong>Formend Support</strong> &mdash; <span class="color">4 hours ago</span>
                                                    <p class="notification-msg-text">No information available yet!</p>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- Notification -->
                                        <li class="notifications-not-read">
                                            <a href="d#">
                                                <span class="notification-avatar status-online"><img src="{{ asset('images/formend-avatar.svg') }}" alt=""></span>
                                                <div class="notification-text">
                                                    <strong>Formend Update</strong>  &mdash; <span class="color">Yesterday</span>
                                                    <p class="notification-msg-text">No information available yet!</p>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- Notification -->
                                        <li class="notifications-not-read">
                                            <a href="#">
                                                <span class="notification-avatar status-online"><img src="{{ asset('images/formend-avatar.svg') }}" alt=""></span>
                                                <div class="notification-text">
                                                    <strong>Formend Support</strong>  &mdash; <span class="color">Yesterday</span>
                                                    <p class="notification-msg-text">No information available yet!</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <a href="#" class="header-notifications-button ripple-effect button-sliding-icon">View All<i class="icon-material-outline-arrow-right-alt"></i></a>
                        </div>
                    </div>

                </div>
                <!--  User Notifications / End -->

                <!-- User Menu -->
                <div class="header-widget">
                    <!-- Messages -->
                    <div class="header-notifications user-menu">
                        <div class="header-notifications-trigger">
                            <a href="#">
                                <div class="user-avatar status-online">
                                    <img src="{{ asset('images/haqqman-avatar.jpg') }}" alt="">
                                </div>
                            </a>
                        </div>
                        <!-- Dropdown -->
                        <div class="header-notifications-dropdown">
                            <!-- User Status -->
                            <div class="user-status">
                                <!-- User Name / Avatar -->
                                <div class="user-details">
                                    <div class="user-avatar status-online">
                                        <img src="{{ asset('images/haqqman-avatar.jpg') }}" alt="">
                                    </div>
                                    <div class="user-name">
                                        Formend Manager <span>Haqqman Webmaster</span>
                                    </div>
                                </div>
                                <!-- User Status Switcher -->
                                <div class="status-switch" id="snackbar-user-status">
                                    <label class="user-online {{ $user->endpoint->is_active ? 'current-status' : '' }}"
                                           data-url="{{ route('enable-endpoint') }}">
                                        Active
                                    </label>
                                    <label class="user-invisible {{ !$user->endpoint->is_active ? 'current-status' : '' }}"
                                           data-url="{{ route('disable-endpoint') }}">
                                        Inactive
                                    </label>
                                    <!-- Status Indicator -->
                                    <span class="status-indicator" aria-hidden="true"></span>
                                </div>
                            </div>
                            <ul class="user-menu-small-nav">
                                <li><a href="{{ route('settings') }}"><i class="icon-material-outline-settings"></i> Settings</a></li>
                                <li><a href="{{ route('logout') }}"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- User Menu / End -->
            </div>
            <!-- Right Side Content / End -->
        </div>
    </div>
    <!-- Header / End -->
</header>
<div class="clearfix"></div>

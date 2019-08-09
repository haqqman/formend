@extends('layouts.master')
@section('content')
    <!-- Dashboard Container -->
    <div class="dashboard-container">
        @include('layouts.sidebar')
        <!-- Dashboard Content
        ================================================== -->
        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner" >

                <!-- Dashboard Headline -->
                @yield('dashboard-title')

                <!-- Row -->
                @yield('dashboard-content')
                <!-- Row / End -->

                <!-- Footer -->
                <div class="dashboard-footer-spacer"></div>
                <div class="small-footer margin-top-15">
                    <div class="small-footer-copyrights">
                        &copy; <script>document.write(new Date().getFullYear());</script> Formend by Haqqman
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- Footer / End -->
            </div>
        </div>
        <!-- Dashboard Content / End -->
    </div>
    <!-- Dashboard Container / End -->
@endsection

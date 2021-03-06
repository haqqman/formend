@extends('layouts.dashboard-master')

@section('title')
    Formend Dashboard &mdash; Haqqman Form Endpoints.
@endsection

@section('dashboard-title')
    <!-- Dashboard Headline -->
    <div class="dashboard-headline">
        <h3>URL Form Endpoint</h3>
        <span id="endpoint-text">
            https://formend.haqqman.com/s/{{ $user->endpoint->key }}
            <a href="#" id="endpoint-btn" data-clipboard-target="#endpoint-text">
                <i class="icon-material-outline-file-copy"></i>
            </a>
        </span>

        <!-- Breadcrumbs -->
        <nav id="breadcrumbs" class="white">
            <ul>
                <li><a href="#">Formend</a></li>
                <li>Dashboard</li>
            </ul>
        </nav>
    </div>
@endsection

@section('dashboard-content')
    <!-- Fun Facts Container -->
    <div class="fun-facts-container">
        <div class="fun-fact" data-fun-fact-color="#F2AE23">
            <div class="fun-fact-text">
                <span>Active Domains</span>
                <h4>{{ number_format($statistic['active_domain']) }}</h4>
            </div>
            <div class="fun-fact-icon"><i class="icon-feather-globe"></i></div>
        </div>
        <div class="fun-fact" data-fun-fact-color="#0675B6">
            <div class="fun-fact-text">
                <span>Inactive Domains</span>
                <h4>{{ number_format($statistic['inactive_domain']) }}</h4>
            </div>
            <div class="fun-fact-icon"><i class="icon-feather-link"></i></div>
        </div>
        <div class="fun-fact" data-fun-fact-color="#36bd78">
            <div class="fun-fact-text">
                <span>Submissions</span>
                <h4>{{ number_format($statistic['submissions']) }}</h4>
            </div>
            <div class="fun-fact-icon"><i class="icon-feather-trending-up"></i></div>
        </div>

        <div>
    </div>

    </div>
    <!-- Dashboard Content / End -->
@endsection
@section('after_script')
    <script>
        new ClipboardJS('#endpoint-btn')
    </script>
@endsection

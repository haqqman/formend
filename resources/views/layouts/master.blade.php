<!--
Organization: Haqqman
Author URL: https://haqqman.com
-->
<!doctype html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Deploy, configure and manage form endpoints." />
    <meta name='X-CSRF' content="{{ csrf_token() }}">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/green.css') }}">

    <!-- CSS
    ================================================== -->
    <link href="//fonts.googleapis.com/css?family=Oxygen:300,400,500,600,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    @yield('headers')
    @yield('after_style')
</head>
<body>
<div id="wrapper">
    @if(auth()->check())
        @include('layouts.header-auth')
    @else
        @include('layouts.header')
    @endif
    @yield('content')
</div>
@yield('after_content')
<!-- Scripts -->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.0.min.js') }}"></script>
<script src="{{ asset('js/mmenu.min.js') }}"></script>
<script src="{{ asset('js/tippy.all.min.js') }}"></script>
<script src="{{ asset('js/simplebar.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/snackbar.js') }}"></script>
<script src="{{ asset('js/clipboard.min.js') }}"></script>
<script src="{{ asset('js/counterup.min.js') }}"></script>
<script src="{{ asset('js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<!-- this would be removed later @TODO -->
<script>
    function flashMessage(message, duration = 3000) {
        Snackbar ? Snackbar.show({
            text: message,
            pos: 'bottom-center',
            showAction: false,
            actionText: "Dismiss",
            duration: duration,
            textColor: '#fff',
            backgroundColor: '#e74c3c'
        }) : ''
    }
    function flashErrorRight(message, duration = 3000) {
        Snackbar ? Snackbar.show({
            text: message,
            pos: 'bottom-right',
            showAction: false,
            actionText: "Dismiss",
            duration: duration,
            textColor: '#fff',
            backgroundColor: '#e74c3c'
        }) : ''
    }
</script>
<script src="{{ asset('js/custom.js') }}"></script>
@yield('after_script')
</body>
</html>

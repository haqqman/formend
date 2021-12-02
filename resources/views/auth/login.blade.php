@extends('layouts.master')
@section('title')
    Formend &mdash; Haqqman
@endsection
@section('content')
    <!-- Content -->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Formend</h2>
                    <span>Deploy and manage form endpoints.</span>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="white">
                        <ul>
                            <li><a href="#">Formend</a></li>
                            <li>Login</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-xl-5 offset-xl-3">


                <div class="login-register-page">
                    <!-- Header -->
                    <div class="welcome-text">
                        @if(session()->has('loggedOut'))
                            <h4>Hurray! You've been successfully logged out.</h4>
                        @endif
                        <h3>Login to manage formend</h3>
                    </div>

                    <!-- Form -->
                    <form method="post" id="login-form" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="input-with-icon-left">
                            <i class="icon-feather-user"></i>
                            <input type="text" class="input-text with-border" name="email" id="username" placeholder="Username"/>
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" required/>
                        </div>
                        <a href="#" class="forgot-password"><center>Recover Access</center></a>
                    </form>

                    <!-- Button -->
                    <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="login-form">Continue <i class="icon-material-outline-arrow-right-alt"></i></button>

                    <!-- Copyright -->
                    <div class="social-login-separator"></div>
                    <center>&copy; <script>document.write(new Date().getFullYear());</script> Formend by Haqqman</center>
                </div>

            </div>
        </div>
    </div>
    <!-- Spacer -->
    <div class="margin-top-70"></div>
    <!-- Spacer / End-->
@endsection
@section('after_script')
    <script>
        @if($errors->has('authFailed'))
            flashErrorRight('Username or password is invalid');
        @elseif($errors->has('tooManyLoginAttempts'))
            flashErrorRight('You have too many login attempt.');
        @endif
    </script>
@endsection

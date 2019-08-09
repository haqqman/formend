@extends('layouts.master')
@section('title')
    Formend &mdash; Haqqman Form Endpoints.
@endsection
@section('content')
    <!-- Content
    ================================================== -->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Formend</h2>
                    <span>Deploy, configure and manage form endpoints.</span>

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


    <!-- Page Content
    ================================================== -->
    <div class="container">
        <div class="row">
            <div class="col-xl-5 offset-xl-3">


                <div class="login-register-page">
                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3>Login to manage form endpoints!</h3>
                    </div>

                    <!-- Form -->
                    <form method="post" id="login-form">
                        <div class="input-with-icon-left">
                            <i class="icon-feather-user"></i>
                            <input type="text" class="input-text with-border" name="username" id="username" placeholder="Username" required/>
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" required/>
                        </div>
                        <a href="#" class="forgot-password">Recover Password</a>
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
@section('after_content')
    <!-- Sign In Popup
================================================== -->
    <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

        <!--Tabs -->
        <div class="sign-in-form">

            <ul class="popup-tabs-nav">
                <li><a href="#login">Manage Links</a></li>
                <li><a href="#register">Create Account</a></li>
            </ul>

            <div class="popup-tabs-container">

                <!-- Login -->
                <div class="popup-tab-content" id="login">

                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3>We're glad to see you again!</h3>
                        <span>Don't have an account? <a href="#" class="register-tab">Create One!</a></span>
                    </div>

                    <!-- Form -->
                    <form method="post" id="login-form">
                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input type="text" class="input-text with-border" name="emailaddress" id="emailaddress" placeholder="Email Address" required/>
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" required/>
                        </div>
                        <a href="#" class="forgot-password">Forgot Password?</a>
                    </form>

                    <!-- Button -->
                    <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="login-form">Continue <i class="icon-material-outline-arrow-right-alt"></i></button>

                </div>

                <!-- Register -->
                <div class="popup-tab-content" id="register">

                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3>Let's create your account!</h3>
                    </div>

                    <!-- Form -->
                    <form method="post" id="register-account-form">
                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input type="text" class="input-text with-border" name="emailaddress-register" id="emailaddress-register" placeholder="Email Address" required/>
                        </div>

                        <div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border" name="password-register" id="password-register" placeholder="Password" required/>
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border" name="password-repeat-register" id="password-repeat-register" placeholder="Repeat Password" required/>
                        </div>
                    </form>

                    <!-- Account Type -->
                    <div class="account-type">
                        <div>
                            <input type="radio" name="account-type-radio" id="freelancer-radio" class="account-type-radio" checked/>
                            <label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Personal</label>
                        </div>

                        <div>
                            <input type="radio" name="account-type-radio" id="employer-radio" class="account-type-radio"/>
                            <label for="employer-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Business</label>
                        </div>
                    </div>

                    <!-- Button -->
                    <button class="margin-top-10 button full-width button-sliding-icon ripple-effect" type="submit" form="register-account-form">Continue <i class="icon-material-outline-arrow-right-alt"></i></button>

                </div>

            </div>
        </div>
    </div>
    <!-- Sign In Popup / End -->
@endsection

@extends('layouts.master')
@section('title')
    Formend &mdash; Confirm Identity.
@endsection

@section('content')
    <!-- Content
================================================== -->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Verify Login</h2>
                    <span>Enter PIN to verify identity.</span>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="white">
                        <ul>
                            <li><a href="#">Formend</a></li>
                            <li>Verify</li>
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
                        <h3>Enter PIN</h3>
                    </div>

                    <!-- Form -->
                    <form method="post" id="login-form" action="{{ route('pin-verification') }}">
                        {{ csrf_field() }}
                        <div class="input-with-icon-left">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border" name="pin" id="PIN"
                                   placeholder="123456" maxlength="8" required/>
                        </div>
                        <a href="#" class="forgot-pin">Recover PIN</a>
                    </form>

                    <!-- Button -->
                    <button class="button full-width button-sliding-icon ripple-effect margin-top-10"
                            type="submit"
                            form="login-form">
                        Continue <i class="icon-material-outline-arrow-right-alt"></i>
                    </button>
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
            flashErrorRight('You entered an incorrect PIN.');
        @endif
    </script>
@endsection

@extends('layouts.dashboard-master')
@php($active = 'settings')

@section('title')
    Console Settings &mdash; Haqqman Form Endpoints.
@endsection

@section('dashboard-title')
    <div class="dashboard-headline">
        <h3>Console Settings</h3>
        <!-- Breadcrumbs -->
        <nav id="breadcrumbs" class="white">
            <ul>
                <li><a href="{{ route('dashboard') }}">Formend</a></li>
                <li>Console Settings</li>
            </ul>
        </nav>
    </div>
@endsection
@section('dashboard-content')
    <!-- password settings -->
    <div class="row">
        <!-- Dashboard Box -->
        <div class="col-xl-12">
            <div id="test1" class="dashboard-box">
                <!-- Headline -->
                <div class="headline">
                    <h3><i class="icon-material-outline-lock"></i> Security</h3>
                </div>
                <div class="content with-padding">
                    <form action="{{ route('settings.password') }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="submit-field">
                                    <h5>New Password</h5>
                                    <input type="password" class="with-border" name="password" required>
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="submit-field">
                                    <h5>Confirm Password</h5>
                                    <input type="password" class="with-border" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <button type="submit" class="button ripple-effect big margin-top-30">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- password settings ends -->

    <!-- pin update settings -->
    <div class="row">
        <!-- Dashboard Box -->
        <div class="col-xl-12">
            <div id="test1" class="dashboard-box">
                <!-- Headline -->
                <div class="headline">
                    <h3><i class="icon-material-outline-lock"></i> PIN</h3>
                </div>
                <div class="content with-padding">
                    <form action="{{ route('settings.pin') }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="submit-field">
                                    <h5>New PIN</h5>
                                    <input type="password" class="with-border" name="pin">
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="submit-field">
                                    <h5>Confirm PIN</h5>
                                    <input type="password" class="with-border" name="pin_confirmation">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="checkbox">
                                    <input type="checkbox" id="two-step" {{ $user->options->enable_pin ? 'checked' : '' }} name="enable_pin">
                                    <label for="two-step"><span class="checkbox-icon"></span> Enable Two-Step Verification via PIN</label>
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="col-xl-12">
                                <button type="submit" class="button ripple-effect big margin-top-30">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- PIN settings and update ends -->
@endsection
@section('after_script')
    <script>
        @if($errors->any())
            flashError('{{ $errors->first() }}')
        @endif
        @if(session()->has('settings.updated'))
            flashSuccess('{{ session()->get('settings.updated', 'Action was successful') }}')
        @endif
    </script>
@endsection

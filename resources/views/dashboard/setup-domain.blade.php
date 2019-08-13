@extends('layouts.dashboard-master')
@php($active = 'setup-domain')

@section('title')
    Setup Domains &mdash; Haqqman Form Endpoints.
@endsection

@section('dashboard-title')
    <div class="dashboard-headline">
        <h3>Setup Domains</h3>
        <!-- Breadcrumbs -->
        <nav id="breadcrumbs" class="white">
            <ul>
                <li><a href="{{ route('dashboard') }}">Formend</a></li>
                <li><a href="#">Configure</a></li>
                <li>Setup Domains</li>
            </ul>
        </nav>
    </div>
@endsection

@section('dashboard-content')
    <form method="post" action="{{ route('setup-domain') }}">
    <div class="row">
        <!-- Dashboard Box -->
        <div class="col-xl-12">
            <div class="dashboard-box margin-top-0">
                <!-- Headline -->
                <div class="headline">
                    <h3><i class="icon-line-awesome-globe"></i> Deploy a new form end point.</h3>
                </div>
                {{ csrf_field() }}
                <div class="content with-padding padding-bottom-10">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>Domain Name</h5>
                                <input type="text" class="with-border" placeholder="https://domain.com"
                                       name="name" value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>From Name <i class="help-icon" data-tippy-placement="right" title="This also serves as the form name."></i></h5>
                                <input type="text" class="with-border" placeholder="e.g. Formend Contact Form"
                                       name="email_from" value="{{ old('email_from') }}" required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>Email Subject</h5>
                                <input type="text" class="with-border" placeholder="e.g. You've received a submission!)"
                                       name="email_subject" value="{{ old('email_subject') }}" required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>Email - Primary<i class="help-icon" data-tippy-placement="right" title="Successful submissions will be sent to this email."></i></h5>
                                <input type="email" class="with-border" placeholder="e.g. formend@haqqman.com"
                                       name="email_primary" value="{{ old('email_primary') }}" required>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>Email - Secondary<i class="help-icon" data-tippy-placement="right" title="Carbon copy of successful submission emails (Cc)"></i></h5>
                                <input type="email" class="with-border" placeholder="e.g. formend2@haqqman.com"
                                       name="email_secondary">
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="submit-field">
                                <h5>Status</h5>
                                <select class="selectpicker with-border" data-size="7" title="Select Status" name="is_active" required>
                                    <option value="1">Enabled</option>
                                    <option value="0">Disabled</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($errors->any())
            <!-- display any form field error -->
            <div class="col-xl-12">
                <div class="dashboard-box margin-top-10">
                    <div class="headline">
                        <h3>You have some Errors in your form field.</h3>
                    </div>
                    <div class="content with-padding padding-bottom-10">
                        <div class="row">
                            <div class="col-xl-12">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-xl-12">
            <button type="submit" class="button ripple-effect big margin-top-30">
                <i class="icon-feather-plus"></i> Deploy Domain
            </button>
        </div>
    </div>
    </form>
@endsection

@section('after_script')
    <script>
        @if($errors->any())
            flashError('An error occurred creating the domain. Check your form fields')
        @endif
        @if(session()->has('domain-created') && session()->get('domain-created'))
            flashSuccess('Domain successfully added!')
        @ENDIF
    </script>
@endsection

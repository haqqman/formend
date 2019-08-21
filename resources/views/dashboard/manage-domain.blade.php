@extends('layouts.dashboard-master')
@php($active = 'manage-domains')
@section('title')
    Formend Dashboard &mdash; Haqqman Form Endpoints.
@endsection

@section('dashboard-title')
    <div class="dashboard-headline">
        <h3>Manage Domains</h3>

        <!-- Breadcrumbs -->
        <nav id="breadcrumbs" class="white">
            <ul>
                <li><a href="{{ route('dashboard') }}">Formend</a></li>
                <li><a href="#">Configure</a></li>
                <li>Manage Domains</li>
            </ul>
        </nav>
    </div>
@endsection
@section('dashboard-content')
    <div class="row">

        <!-- Dashboard Box -->
        <div class="col-xl-12">
            <div class="dashboard-box margin-top-0">

                <!-- Headline -->
                <div class="headline">
                    <h3><i class="icon-material-outline-settings-input-component"></i> Modify or revoke existing domains.</h3>
                </div>

                <div class="content">
                    @if(!count($domains))
                        <div class="margin-bottom-90 margin-left-30 margin-top-30 padding-bottom-30">
                            <h4>You have no domain associated with your endpoint.</h4>
                        </div>
                    @else
                        <ul class="dashboard-box-list">
                            @foreach($domains as $domain)
                                <li>
                                    <!-- Domain List -->
                                    <div class="job-listing">
                                        <!-- Domain List Details -->
                                        <div>
                                            <!-- Details -->
                                            <div>
                                                <h3>
                                                    {{ $domain->email_from }}
                                                    <span class="dashboard-status-button {{ $domain->is_active ? 'green' : 'red' }}">
                                                        {{ $domain->is_active ? 'Active' : 'Inactive' }}
                                                    </span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Buttons -->
                                    <div class="buttons-to-right always-visible">
                                        <a href="{{ $domain->name }}" class="button ripple-effect" target="_blank">
                                            <i class="icon-line-awesome-globe"></i> {{ $domain->name }}
                                        </a>
                                        <a href="{{ route('update-domain', ['id' => $domain->id]) }}" class="button gray ripple-effect ico" title="Edit" data-tippy-placement="top">
                                            <i class="icon-feather-edit"></i>
                                        </a>
                                        <form action="{{ route('update-domain', ['id' => $domain->id]) }}" class="d-inline" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" role="button" class="button d-inline-block gray ripple-effect ico"
                                                    title="Remove" data-tippy-placement="top" style="position: relative; top: -10px">
                                                <i class="icon-feather-trash-2"></i>
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after_script')
    <script>
        @if(session()->has('domain-deleted') && session()->get('domain-deleted'))
            flashMessage('Domain successfully deleted!')
        @endif
        @if(session()->has('domain-updated') && session()->get('domain-updated'))
            flashMessage('Domain successfully updated!')
        @endif
    </script>
@endsection

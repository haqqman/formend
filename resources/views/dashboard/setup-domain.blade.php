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
    @isset($endpoint)
        @component('components.domain-form', ['action' => route('setup-domain'), 'endpoint' => $endpoint])
        @endcomponent
    @endisset
    @empty($endpoint)
        @component('components.domain-form', ['action' => route('setup-domain'), 'endpoint' => null])
        @endcomponent
    @endempty
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

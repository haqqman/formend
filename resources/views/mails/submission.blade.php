@extends('mails.master')
@section('after_style')
    <style>
        .report-table {
            width: 100%;
            margin: 10px 0;
            font-size: .9rem;
        }
        .report-table thead {
            font-weight: bold;
            background-color: #3fb660;
            color: #fff;
        }
        .report-table thead td {
            padding: 10px;
        }
        .report-table__body {
            border-bottom: 1px solid #8d8d8d;
            border-right: 1px solid #8d8d8d;
            border-left: 1px solid #8d8d8d;
        }
        .row-even {
            background-color: #ecf0f1;
        }
        .row-title {
            padding: 10px;
            width: 35%;
            font-weight: bold;
            border-right: 1px solid #8d8d8d;
            text-transform: capitalize;
        }
        .row-value {
            padding: 10px;
            width: 65%;
        }
    </style>
@endsection
@section('header')
    You have new submission
@endsection
@section('content')
    <p>
        You have a new submission submitted to your endpoint from the associated domain
        <b><a href="{{ $domain->name }}">{{ $domain->name }}</a></b> on {{ $domain->created_at->format('d M Y:H:m') }}.
    </p>
    <table class="report-table">
        <thead style="font-weight: bold">
            <tr>
                <td colspan="2">
                    Submission details
                </td>
            </tr>
        </thead>
        <tbody class="report-table__body">
            @foreach($form as $key => $value)
                <tr class="{{ $loop->even ? 'row-even' : '' }}">
                    <td class="row-title">{{ $key }}</td>
                    <td class="row-value">{{ $value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>
        You are not required to respond to this email.
    </p>
@endsection

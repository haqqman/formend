@extends('mails.master')
@section('after_style')
    <style>
        .report-table {
            width: 100%;
            margin: 0;
            color: #8B8B8B;
        }
        .row-even {
            background-color: #ecf0f1;
        }
        .row-title {
            width: 100%;
            text-transform: capitalize;
            font-family: "Roboto", "Helvetica Neue", "Segoe UI", Segoe, Helvetica, Arial, "Lucida Grande", sans-serif;
        }
        .row-value {
            width: 100%;
            padding-bottom: 10px;
            color: #34495e;
            font-family: "Roboto", "Helvetica Neue", "Segoe UI", Segoe, Helvetica, Arial, "Lucida Grande", sans-serif;
        }
        .submission-info {
            color: #8B8B8B;
            text-align: center;
            font-size: 12px;
            padding-bottom: 5px;
            margin-bottom: 0;
        }
    </style>
@endsection
@section('header')
    You have new submission
@endsection
@section('content')
    <p style="margin-bottom: 4px;">
        <b>Hey there!</b>
    </p>
    <p class="border-bottom">
        You just received a new submission to your <b>{{ $domain->email_from }}</b>.
        Here is the data that was collected.
    </p>
    <table class="report-table font-secondary">
        <tbody class="report-table__body">
            @foreach($form as $key => $value)
                <tr>
                    <td class="row-title">{{ str_replace('_', ' ', $key) }}</td>
                </tr>
                <tr>
                    <td class="row-value">{{ $value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p class="submission-info border-top">
        Associated Domain <br>
        {{ $domain->name }} <br>
        Submission received at {{ now()->format('H:i T - M d, Y') }}
    </p>
@endsection

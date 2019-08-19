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
        }
        .row-value {
            width: 100%;
            padding-bottom: 10px;
            color: #000;
        }
        .submission-info {
            color: #8B8B8B;
            text-align: center;
            font-size: 12px;
        }
    </style>
@endsection
@section('header')
    You have new submission
@endsection
@section('content')
    <p>
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
                    <td class="row-title">{{ $key }}</td>
                </tr>
                <tr>
                    <td class="row-value">{{ $value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p class="submission-info border-top">
        Associated Domain <br>
        {{ $domain->name }}. <br>
        Submission received at {{ now()->format('H:i T M dS, Y') }}
    </p>
@endsection

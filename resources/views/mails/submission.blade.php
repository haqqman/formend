@extends('mails.master')
@section('after_style')
    <style>
        .report-table {
            width: 100%;
            margin: 0;
        }
        .report-table thead {
            font-weight: bold;
            background-color: #3fb660;
            color: #fff;
        }
        .report-table thead td {
            padding: 0;
        }
        .row-even {
            background-color: #ecf0f1;
        }
        .row-title {
            width: 100%;
            text-transform: capitalize;
            color: #95a5a6;
        }
        .row-value {
            width: 100%;
            font-weight: bold;
            padding-bottom: 10px;
            color: #384041;
            font-family: 'Cormorant Garamond', serif !important;;
        }
        .submission-info {
            color: #95a5a6;
            text-align: center;
            font-size: 1.1em;
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
        You have just received a new submission to your <b>{{ $domain->email_from }}</b> form.
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
    <p class="submission-info border-top font-secondary">
        Associated domain <br>
        {{ $domain->name }}. <br>
        Submission received at {{ now()->format('H:i T M dS, Y') }}
    </p>
@endsection

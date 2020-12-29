@extends('layouts.layout')
@section('pageCss')
<link rel="stylesheet" href="css/calendar.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="title-area">
                <a class="btn btn-outline-secondary prev-btn"
                    href="{{ url('calendar?date=' . $calendar->getPreviousMonth()) }}">前の月</a>
                <div class="calendar-title">{{ $calendar->getTitle() }}</div>
                <a class="btn btn-outline-secondary next-btn"
                    href="{{ url('calendar?date=' . $calendar->getNextMonth()) }}">次の月</a>
            </div>
            <div class="">
                {!! $calendar->render() !!}
            </div>
        </div>
    </div>
    <div class="sintyaku">
        <h3>新着日記一覧</h3>
        @include('commons.diaries')
    </div>
</div>
@endsection
@extends('layouts.layout')
@section('pageCss')
<link rel="stylesheet" href="css/calendar.css">
<link rel="stylesheet" href="css/mycalendar.css">
@endsection

@section('content')
<div class="container">
    <div class="">
        <div class="mycalendar">
            <h2>あなたのカレンダー</h2>
            <div class="title-area">
                <a class="btn btn-outline-secondary prev-btn"
                    href="{{ url('mycalendar?date=' . $calendar->getPreviousMonth()) }}">前の月</a>
                <div class="calendar-title">{{ $calendar->getTitle() }}</div>
                <a class="btn btn-outline-secondary next-btn"
                    href="{{ url('mycalendar?date=' . $calendar->getNextMonth()) }}">次の月</a>
            </div>
            <div class="">
                {!! $calendar->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
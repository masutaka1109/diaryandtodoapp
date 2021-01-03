@extends('layouts.layout')
@section('pageCss')
<link rel="stylesheet" href="css/calendar.css">
@endsection

@section('content')
<div class="container mb-4">
    <div class="row justify-content-center mb-4">
        <div class="col-md-12">
            <div class="title-area mb-3">
                <a class="btn btn-outline-secondary prev-btn"
                    href="{{ url('calendar?date=' . $calendar->getPreviousMonth()) }}">前の月</a>
                <h2 class="calendar-title">{{ $calendar->getTitle() }}</h2>
                <a class="btn btn-outline-secondary next-btn"
                    href="{{ url('calendar?date=' . $calendar->getNextMonth()) }}">次の月</a>
            </div>
            <div class="">
                {!! $calendar->render() !!}
            </div>
        </div>
    </div>
    <div class="sintyaku">
        <h3 class="mb-3">新着日記一覧</h3>
        @include('commons.diaries')
    </div>
</div>
@endsection
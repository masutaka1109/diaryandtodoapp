@extends('layouts.layout')
@section('pageCss')
<link rel="stylesheet" href="{{asset('css/calendar.css')}}">
<link rel="stylesheet" href="{{asset('css/mycalendar.css')}}">
@section('content')
@include('users.navtabs')
<div class="container">
    <div class="">
        <div class="mycalendar">
            <h2>{{$user->name}}さんのカレンダー</h2>
            <div class="title-area">
                <a class="btn btn-outline-secondary prev-btn"
                    href="{{ url('users/' . $user->id . '/mycalendar?date=' . $calendar->getPreviousMonth()) }}">前の月</a>
                <div class="calendar-title">{{ $calendar->getTitle() }}</div>
                <a class="btn btn-outline-secondary next-btn"
                    href="{{ url('users/' . $user->id . '/mycalendar?date=' . $calendar->getNextMonth()) }}">次の月</a>
            </div>
            <div class="">
                {!! $calendar->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
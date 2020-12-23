@extends('layouts.layout')
@section('pageCss')
<link rel="stylesheet" href="{{asset('css/diary_index.css')}}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('css/search.css')}}">
@endsection
@section('content')
@include('commons.kensaku')
<h3>最新の10件</h3>
@include('commons.diaries')
@endsection
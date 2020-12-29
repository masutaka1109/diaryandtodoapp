@extends('layouts.layout')
@section('pageCss')
<link rel="stylesheet" href="{{asset('css/editpage.css')}}">
@endsection

@section('content')
@include('users.navtabs')
<div class="intro-wrapper">
    <div class="image-area">
        @if(!($user->image_url))
        <img src="{{asset('images/unknown.jpg')}}" class="icon">
        @else
        @endif
    </div>
    <div class="intro-area">
        <div class="user_name">
            {{$user->name}}さんのプロフィール
        </div>
        <div class="self_introduction">
            {!! Form::model($user,['route' => ['users.update',$user->id],'method' => 'put','enctype' =>
            'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::textarea('self_introduction',$user->self_introduction,['class' => 'form-control','value' =>
                $user->self_introduction]) !!}
            </div>
            {!! Form::file('image') !!}
            <div class="buttton-area">
                {!! Form::submit('編集する', ['class' => 'btn btn-primary toukou']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
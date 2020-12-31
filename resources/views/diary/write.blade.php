@extends('layouts.layout')
@section('pageCss')
    <link rel="stylesheet" href="{{asset('css/writepage.css')}}">
@endsection('pageCss')

@section('content')
    <div class="title">{{$date}}の日記</div>
    <div class="form-area">
        {!! Form::model($diary,['route' => 'diary.store']) !!} 
        {{ Form::hidden('date',$date) }} 
        <?php $name = Auth::user()->name;?>
        {{ Form::hidden('name',$name) }} 
        <!-- 日付を隠して送信する　-->
        <div class="form-group">
            {!! Form::label('title','タイトル',['class' => 'title-label']) !!}<br>
            {!! Form::text('title','',['class' => 'title-form','placeholder' => 'タイトル']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content','本文',['class' => 'content-label']) !!}<br>
            {!! Form::textarea('content','',['class' => 'content-form','placeholder' => '本文']) !!}
        </div>
        <div class="form-group">
            {!! Form::checkbox('is_todo','1',false,['class' => 'is_todo_checkbox','id' => 'check_box1']) !!}
            {{Form::label('check_box1','ToDoとして登録')}}
        </div>
        <div class="btn-area">
            {!! Form::submit('投稿', ['class' => 'btn btn-primary toukou']) !!}
        </div>
    {!! Form::close() !!}
    </div>
@endsection
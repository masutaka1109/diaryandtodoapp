<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Diary</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/writepage.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
    @include('commons.navbar')
    <div class="title">日記を編集する</div>
    <div class="form-area">
        {!! Form::model($diary,['route' => ['diary.update',$diary->id],'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('title','タイトル',['class' => 'title-label']) !!}<br>
                {!! Form::text('title',$diary->title,['class' => 'title-form',]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('content','本文',['class' => 'content-label']) !!}<br>
                {!! Form::textarea('content',$diary->content,['class' => 'content-form','value' => $diary->content]) !!}
            </div>
            <div class="btn-area">
                {!! Form::submit('編集する', ['class' => 'btn btn-primary toukou']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</body>
</html>
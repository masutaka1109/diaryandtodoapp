<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Diary</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/userpage.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
    @include('commons.navbar')
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
                {!! Form::model($user,['route' => ['users.update',$user->id],'method' => 'put','enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {!! Form::textarea('self_introduction',$user->self_introduction,['class' => 'content-form','value' => $user->self_introduction]) !!}
                    </div>
                        {!! Form::file('image') !!}
                    <div class="buttton-area">
                        {!! Form::submit('編集する', ['class' => 'btn btn-primary toukou']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</body>
</html>
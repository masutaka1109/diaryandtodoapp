<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Diary</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/userpage.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <style>
    </style>
</head>
<body>
    @include('commons.navbar')
    @include('users.navtabs')
    <div class="intro-wrapper">
        <div class="image-area">
            @if(!($user->image_url))
                <img src="{{asset('images/unknown.jpg')}}" class="icon">
            @else
                <img src="{{ asset('storage/' . $user->image_url) }}" class="icon">
            @endif
        </div>
        <div class="intro-area">
            <div class="user_name">
                {{$user->name}}さんのプロフィール
            </div>
            <div class="self_introduction" style="white-space:pre-wrap;">@if(!($user->self_introduction))この人はまだ自己紹介を書いていません。@else{{ $user->self_introduction }}@endif</div>
        </div>
    </div>
    <div class="button-area">
        @if(Auth::id() == $user->id)
            {!! link_to_route('users.edit','プロフィールを編集する',['user' => Auth::id()],['class' => 'btn btn-secondary']) !!}
        @endif
    </div>
</body>
</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Diary</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/userpage.css')}}">
    <link rel="stylesheet" href="{{asset('css/diary_index.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>

<body>
    @include('commons.navbar')
    @include('users.navtabs')
    <h3 class-"title" style="margin-top:10px;">{{$user->name}}さんが書いた日記一覧</h3>
    <div class="diary-area">
        @include('commons.diaries')
        {{ $diaries->links() }}
    </div>
</body>

</html>
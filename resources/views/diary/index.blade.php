<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Diary</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/readpage.css">
    <link rel="stylesheet" href="{{asset('css/diary_index.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>

<body>
    @include('commons.navbar')
    <div class="title" sytle="margin-top:10px;margin-bottom:10px;">
        {{ $date }}に書かれた日記一覧
    </div>
    <div class="diary-area">
        @include('commons.diaries')
        <div class="diaries-link">
            {{ $diaries->links() }}
        </div>
    </div>
</body>

</html>
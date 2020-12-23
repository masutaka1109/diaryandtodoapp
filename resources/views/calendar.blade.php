<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Diary</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/calendar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>

<body>
    <!-- ナビバー -->
    @include('commons.navbar')
    <!-- カレンダー -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="title-area">
                    <a class="btn btn-outline-secondary prev-btn"
                        href="{{ url('calendar?date=' . $calendar->getPreviousMonth()) }}">前の月</a>
                    <div class="calendar-title">{{ $calendar->getTitle() }}</div>
                    <a class="btn btn-outline-secondary next-btn"
                        href="{{ url('calendar?date=' . $calendar->getNextMonth()) }}">次の月</a>
                </div>
                <div class="">
                    {!! $calendar->render() !!}
                </div>
            </div>
        </div>
        <div class="sintyaku">
            <h3>新着日記一覧</h3>
            @include('commons.diaries')
        </div>
    </div>
    <div class="new-diaries">

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/calendar.js"></script>
</body>

</html>
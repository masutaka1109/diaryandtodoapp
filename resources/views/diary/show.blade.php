<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Diary</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/readpage.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <style>
        .diary-area {
            padding: 10px;
        }

        .title-area {
            font-size: 25px;
            font-weight: bold;
        }

        .content-area {
            padding: 10px 20px 10px 20px;
            border: 1px solid #dcdcdc;
        }

        .favorite {
            text-align: center;
            margin-top: 10px;
        }

        .edit {
            margin-bottom: 5px;
        }

        .info-area {
            text-align: right;
            font-size: 17px;
            opacity: 0.6;
        }
    </style>
</head>

<body>
    @include('commons.navbar')
    <div class="diary-area">
        <div class="title-area">
            {{ $diary->title }}
        </div>
        <div class="content-area" style="white-space:pre-wrap;">{{ $diary->content }}</div>
        <div class="info-area">
            {!! link_to_route('users.show',$diary->author . "さんの投稿",['user' => $diary->user_id],[]) !!}
            {{ $diary->created_at }}
        </div>
        @if(Auth::check())
        <div class="favorite">
            @if(Auth::id() == $diary->user_id)
            <div class="edit-btn">
                {{ link_to_route('diary.edit','編集する',['id' => $diary->id],['class'=>'btn btn-primary edit']) }}
            </div>
            @if($diary->is_todo and !$diary->is_completed)
            {!! Form::open(['route' => ['diary.completed',$diary->id]]) !!}
            {!! Form::submit('達成にする',['class'=>"btn btn-primary edit"]) !!}
            {!! Form::close() !!}
            @endif
            @endif
            @if(Auth::id() == $diary->user_id)
            <div class="delete-btn">
                <form action="/diary/{{$diary->id}}" method='post' name="deleteform">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" name="delete" value="削除する" onClick="delete_alert(event);return false;"
                        class="btn btn-danger edit">
                </form>
            </div>
            @endif
            @if(Auth::user()->is_favorite($diary->id))
            {!! Form::open(['route' => ['favorites.unfavorite',$diary->id],'metod'=>'delete']) !!}
            {!! Form::submit('お気に入りから外す',['class'=>"btn btn-danger"]) !!}
            {!! Form::close() !!}
            @else
            {!! Form::open(['route' => ['favorites.favorite',$diary->id]]) !!}
            {!! Form::submit('お気に入りする',['class' => "btn btn-secondary"]) !!}
            {!! Form::close() !!}
            @endif
        </div>
        @endif
    </div>
    <script src="{{asset('js/alert.js')}}"></script>
</body>

</html>
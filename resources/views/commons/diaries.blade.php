<link rel="stylesheet" href="{{asset('css/diary_index.css')}}">

@if(count($diaries) > 0)
    @foreach($diaries as $diary)
    <div class="diary-info">
        <div class="diary-title-area">
            {!! link_to_route('diary.show',$diary->title,['id'=>$diary->id]) !!} {!! link_to_route('users.show',$diary->author . "さんが書いた日記",['user'=>$diary->user_id],['class' => 'author']) !!}
        </div>
        <div class="diary-content-area">
            <?php
                echo mb_strimwidth($diary->content, 0, 400, "..........", 'UTF-8');
            ?>
        </div>
        <div class="diary-link">
            {{ $diary->created_at }}
        </div>
    </div>
    @endforeach
@endif
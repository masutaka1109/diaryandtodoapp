<style>
    .logo {
        color: #1a1a1a;
        font-weight: bold;
        font-family: sans-serif;
        font-size: 22px;
        margin-left: 10px;
    }

    .logo:hover {
        text-decoration: none;
        opacity: 0.7;
    }
</style>

<nav class="navbar navbar-expand navbar-light bg-light">
    {!! link_to_route('calendar','Diary',[],['class' => 'logo']) !!}
    <div class="navbar-nav mr-auto"></div>
    <ul class="nav navbar-nav">
        <li class="nav-item">
            {!! link_to_route('search.show','日記検索',[],['class' => 'nav-link']); !!}
        </li>
        @if(Auth::check())
        <li class="nav-item">
            {!! link_to_route('users.show','マイページ',['user'=>Auth::id()],['class' => 'nav-link']); !!}
        </li>
        <li class="nav-item">
            {!! link_to_route('logout.get','ログアウト',[],['class' => 'nav-link']); !!}
        </li>
        @else
        <li class="nav-item">
            {!! link_to_route('login','ログイン',[],['class' => 'nav-link']); !!}
        </li>
        @endif
    </ul>
</nav>